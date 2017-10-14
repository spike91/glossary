<?php
class Category {
private $id;
    private $category_rus;
    private $category_eng;
    private $category_est;
    
    function __construct($id, $category_rus, $category_eng, $category_est) {
        $this->id = $id;
        $this->category_rus = $category_rus;
        $this->category_eng = $category_eng;
        $this->category_est = $category_est;
    }
    function getId() {
        return $this->id;
    }

    function getCategory_rus() {
        return $this->category_rus;
    }

    function getCategory_eng() {
        return $this->category_eng;
    }

    function getCategory_est() {
        return $this->category_est;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCategory_rus($category_rus) {
        $this->category_rus = $category_rus;
    }

    function setCategory_eng($category_eng) {
        $this->category_eng = $category_eng;
    }

    function setCategory_est($category_est) {
        $this->category_est = $category_est;
    }

}
?>