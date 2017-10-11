<?php

class Word
{
    public $id;
    public $name_ru;
    public $name_en;
    public $name_ee;
    public $descriptions = array();



     public function __construct($id, $name_ee, $name_ru, $name_en, $descriptions)
     {
         $this->id=$id;
         $this->name_ru=$name_ru;
         $this->name_en=$name_en;
         $this->name_ee=$name_ee;
         $this->descriptions=$descriptions;
     }
     
     function getId() {
         return $this->id;
     }

     function getNameRu() {
         return $this->name_ru;
     }

     function getNameEn() {
         return $this->name_en;
     }

     function getNameEe() {
         return $this->name_ee;
     }

     function getDescriptions() {
         return $this->descriptions;
     }

     function setId($id) {
         $this->id = $id;
     }

     function setNameRu($name_ru) {
         $this->name_ru = $name_ru;
     }

     function setNameEn($name_en) {
         $this->name_en = $name_en;
     }

     function setNameEe($name_ee) {
         $this->name_ee = $name_ee;
     }

     function setDescriptions($descriptions) {
         $this->descriptions = $descriptions;
     }


}