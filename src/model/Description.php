<?php

class Description
{
    private $description_id;
    private $descrition_est;
    private $descrition_rus;
    private $descrition_eng;
    private $image;
    private $date_adding;
    private $category;

    function __construct($description_id, $descrition_est, $descrition_rus, $descrition_eng, $image, $date_adding, $category) {
        $this->description_id = $description_id;
        $this->descrition_est = $descrition_est;
        $this->descrition_rus = $descrition_rus;
        $this->descrition_eng = $descrition_eng;
        $this->image = $image;
        $this->date_adding = $date_adding;
        $this->category = $category;
    }

    public function getDescriptionId(){
         return $this->description_id;
    }

    public function getDescriptionEst(){
        return $this->description_est;
    }

    public function getDescriptionRus(){
        return $this->description_rus;
    }

    public function getDescriptionEng(){
        return $this->description_eng;
    }

    public function getImage(){
        return $this->image;
    }

    public function getDateAdding(){
        return $this->description_id;
    }

    public function getCategory(){
        return $this->category;
    }

    public function setDescriptionId($description_id){
        $this->description_id = $description_id;
    }

    public function setDescriptionEst($description_est){
        $this->description_est = $description_est;
    }

    public function setDescriptionRus($description_rus){
        $this->description_rus = $description_rus;
    }

    public function setDescriptionEng($description_eng){
        $this->description_eng = $description_eng;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function setDateAdding($date_adding){
        $this->date_adding = $date_adding;
    }

    public function setCategory($category){
        $this->category = $category;
    }




}