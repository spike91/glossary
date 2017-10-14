<?php

interface IServiceDB
{
    public function connect();
    public function getAllWords();
    public function getWordByID($id);
    public function getWordsByPartName($name);
    public function getAllCategories();
    public function getCategoryByID($id);
    public function getAllUsers();
    public function getUserByID($id);
    public function getUserWordByUserID($id);

}