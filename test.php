eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJaTW90UElVekhNaTl2ejY4Z01Jc1d5SWNPQzJ0b3BwRWd5S3l1bEc2NUpFIn0.eyJleHAiOjE3MjM1NTUyNzYsImlhdCI6MTcyMzUxOTI3NiwianRpIjoiYzg4ZDEyNDAtMTg0My00ZjBmLWEwYzMtMjMyNDVjYjhmNWNkIiwiaXNzIjoiaHR0cDovLzEwLjYwLjE1OC4yMzA6ODAwMi9yZWFsbXMvSENNIiwiYXVkIjoiYWNjb3VudCIsInN1YiI6Ijc5MDhjYTIzLTJlNmUtNDM2MS1iZjVmLWZjYTYzNGYxYWQwYiIsInR5cCI6IkJlYXJlciIsImF6cCI6ImQyIiwic2lkIjoiZDFjNzI3ZjEtMTI5MS00ZmU2LWFmMzQtNjI3OTY2ZDViMTc5IiwiYWNyIjoiMSIsImFsbG93ZWQtb3JpZ2lucyI6WyIqIl0sInJlYWxtX2FjY2VzcyI6eyJyb2xlcyI6WyJvZmZsaW5lX2FjY2VzcyIsInVtYV9hdXRob3JpemF0aW9uIiwiZGVmYXVsdC1yb2xlcy1oY20iXX0sInJlc291cmNlX2FjY2VzcyI6eyJhY2NvdW50Ijp7InJvbGVzIjpbIm1hbmFnZS1hY2NvdW50IiwibWFuYWdlLWFjY291bnQtbGlua3MiLCJ2aWV3LXByb2ZpbGUiXX19LCJzY29wZSI6Im9wZW5pZCBwcm9maWxlIGVtYWlsIiwiZW1haWxfdmVyaWZpZWQiOnRydWUsInByZWZlcnJlZF91c2VybmFtZSI6ImhjbV90aWVwbmhhbiIsImxvY2FsZSI6InZpIn0.d8X3BXV9Nu5PNmWBkxDWXpn-X4mKPZWO7D4Vb9nE_eYwio13zhwrbtooybUwIEyxlgitBnNysT0GMGNJVi4rnW88KslN2vuwchVZ2O7Hn_C3FuoFvsUx4gkvDYx67Z_Ee9S8F3MkgSHIdwYmwieGCaj1gMot73mBQGVlXh1DeTm6tt9n6zILXixBM6lkBf0wmXkVm8WclF9QvPCUNmPTBUK9b_MZxaFsNmp52oBvbqYokJgGcUxgOpPGxaheEguhg0zEEFCisPjcJ8JtsKgpgGcMq2Mj_Dnh_nMOFDxpCOTs33XqhubfJuite9Rwikqp__njPJgaXCc9H1qpBDNwTw
create or replace PROCEDURE GET_PAGE_NHOMQUYTRINH (
    p_page_number IN OUT NUMBER,
    p_page_size IN OUT NUMBER,
    p_totalElements OUT NUMBER,
    p_totalPages OUT NUMBER,
    p_cursor OUT SYS_REFCURSOR
)
IS
BEGIN
    SELECT COUNT(*)
    INTO p_totalElements
    FROM "NhomQuyTrinh";
    
     p_totalPages := CEIL(p_totalElements / p_page_size);
    
    OPEN p_cursor FOR
    SELECT * 
    FROM "NhomQuyTrinh"
    OFFSET (p_page_number - 1) * p_page_size ROWS FETCH NEXT p_page_size ROWS ONLY
    ;
END GET_PAGE_NHOMQUYTRINH;

Springboot jpa cách gọi procedure này và trả về kết quả dạng PageResponse(page, size, getTotalPages, getTotalElements, listData)
<?php
// public function fileUpload($uploadFile, $name_file)
// {
//     $target_dir = "upload/".$uploadFile;
//     $target_file = $target_dir . basename($_FILES["$name_file"]["name"]);
//     $uploadOk = 1;
//     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//     $image_unique = uniqid().'.'.$imageFileType;
//     $target_file = $target_dir.$image_unique;

//     // Check if image file is a actual image or fake image
//     if (isset($_POST["submit"])) {
//         $check = getimagesize($_FILES["$name_file"]["tmp_name"]);
//         if ($check !== false) {
//             $uploadOk = 1;
//         } else {
//             return "File is not an image.";
//             $uploadOk = 0;
//         }
//     }
//     // Check file size
//     if ($_FILES["$name_file"]["size"] > 500000) {
//         return "Sorry, your file is too large.";
//         $uploadOk = 0;
//     }

//     // Allow certain file formats
//     if (
//         $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//         && $imageFileType != "gif"
//     ) {
//         return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//         $uploadOk = 0;
//     }

//     // Check if $uploadOk is set to 0 by an error
//     if ($uploadOk == 0) {
//         return "Sorry, your file was not uploaded.";
//         // if everything is ok, try to upload file
//     } else {
//         if (move_uploaded_file($_FILES["$name_file"]["tmp_name"], $target_file)) {
//             return "The file " . htmlspecialchars(basename($_FILES["$name_file"]["name"])) . " has been uploaded.";
//         } else {
//             return "Sorry, there was an error uploading your file.";
//         }
//     }
?>
