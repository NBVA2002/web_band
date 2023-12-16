
const validateEmail = (email) => {
    return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};
const validate = () => {
    const correct = $('.correct')
    const error = $('.error')
    const email = $('#email').val();
    if (validateEmail(email)) {
        correct.show();
        error.hide();
    } else {
        error.show();
        correct.hide();
    }
    if (email == "") {
        error.hide();
    }
    return false;
}
