<?php
class TourModel {
    protected $_table = [];

    public function getList() {
        $data = [
            'Item1',
            'Item2',
            'Item3',
            'Item4',
        ];
        return $data;
    }

    public function getDetail($id) {
        $data = [
            ' Item 1',
            ' Item 2',
            ' Item 3',
            ' Item 4',
        ];
        return $data[$id];
    }
}