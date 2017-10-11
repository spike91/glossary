<?php

class PDOService implements IServiceDB
{	
	private $connectDB;
	
	public function connect() {	
        try {
            $this->connectDB = new PDO("pgsql:host=".DB_HOST.";dbname=".DB_DATABASE.";user=".DB_USERNAME.";password=".DB_PASSWORD);
        }		
		catch (PDOException $ex) {
			printf("Connection failed: %s", $ex->getMessage());
			exit();
		}
		return true;
	}
	
	public function getAllWords()
	{	
		$words=array();
		if ($this->connect()) {
			if ($result = $this->connectDB->query('SELECT * FROM glossary.tword')) {
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){
					$words[]=new Word($row['id_word'], $row['estonian'], $row['russian'], $row['english'], null);
                 } 
			}
		}
        $this->connectDB=null;
		return $words;
	}

    public function getWordByID($id){
		$word=null;
		if ($this->connect()) {
			if ($result = $this->connectDB->prepare('SELECT * FROM glossary.word WHERE id_word=:id')) {
				$result->execute(array('id'=>$id));
				//$result->execute(['id'=>$id]);
                // $result->bindValue(':id', $id, PDO::PARAM_INT);
                // $result->execute();
				
				$numRows = $result->rowCount();
				if ($numRows==1) {
					$row=$result->fetch();
					$word=new Word($row[0], $row[1], $row[2], $row[3]);
				}
			}
		}
        $this->connectDB=null;
	    return $word;	
	}

    public function getWordByName($name){

	}
	public function getDescriptionByWordId($id){}
    public function getAllCategories(){}
    public function getCategoryByID($id){}
    public function getAllUsers(){}
    public function getUserByID($id){}
    public function getUserWordByUserID($id){}

	
	public function getFilmByID($id)
	{	
		$film=null;
		if ($this->connect()) {
			if ($result = $this->connectDB->prepare('SELECT * FROM film WHERE film_id=:id')) {
				$result->execute(array('id'=>$id));
				//$result->execute(['id'=>$id]);
                // $result->bindValue(':id', $id, PDO::PARAM_INT);
                // $result->execute();
				
				$numRows = $result->rowCount();
				if ($numRows==1) {
					$row=$result->fetch();
					$film=new Film($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
				}
			}
		}
        $this->connectDB=null;
	    return $film;	
	}

    public function getAllFilmsInfo()
	{
		$films=array();
		if ($this->connect()) {
			if ($result = $this->connectDB->query('SELECT * FROM film_info')) {
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){
					$actors=array();
					foreach (explode(";",$row['actors']) as $item) {
					   $actor=explode(",",$item);
					   $actors[]=new Actor($actor[0], $actor[1],$actor[2]);
					}
					$categories=array();
					foreach (explode(";",$row['categories']) as $item) {
					   $category=explode(",",$item);
					   $categories[]=new Category($category[0], $category[1]);
					}
					$item=explode(',',$row['language']);
					$language=new Language($item[0], $item[1]);
					$films[]=new FilmInfo($row['id'], $row['title'], $row['description'], 
										$row['year'],  $row=['length'], $actors, $categories, $language);					
                 } 				
			}
		    $this->connectDB=null;
		}
		return $films;
	}

}

