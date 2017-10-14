<?php
class UserGlossary {
    private $word=array();
    private $user;
    
    function __construct($description, $user) {
        $this->description = $description;
        $this->user = $user;
    }
 
    function getDescription() {
        return $this->description;
    }
 
    function getUser() {
        return $this->user;
    }
 
    function setDescription($description) {
        $this->description = $description;
    }
 
    function setUser($user) {
        $this->user = $user;
    }
    
 }
?>