<?php 
class User {
    private $id;
    private $firstname;
    private $lastname;
    private $nickname;
    private $email;
    private $user_roles;
    private $date_registration;
    private $user_password;
    private $user_glossary;
    
    function __construct($id, $firstname, $lastname, $nickname, $email, $user_roles, $date_registration, $user_password, $user_glossary) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->nickname = $nickname;
        $this->email = $email;
        $this->user_roles = $user_roles;
        $this->date_registration = $date_registration;
        $this->user_password = $user_password;
        $this->user_glossary = $user_glossary;
    }

    function getId() {
        return $this->id;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getNickname() {
        return $this->nickname;
    }

    function getEmail() {
        return $this->email;
    }

    function getUser_roles() {
        return $this->user_roles;
    }

    function getDate_registration() {
        return $this->date_registration;
    }

    function getUser_password() {
        return $this->user_password;
    }

    function getUser_glossary() {
        return $this->user_glossary;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    function setNickname($nickname) {
        $this->nickname = $nickname;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setUser_roles($user_roles) {
        $this->user_roles = $user_roles;
    }

    function setDate_registration($date_registration) {
        $this->date_registration = $date_registration;
    }

    function setUser_password($user_password) {
        $this->user_password = $user_password;
    }

    function setUser_glossary($user_glossary) {
        $this->user_glossary = $user_glossary;
    }

}
?>