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

    public function getWordsByPartName($name){
		$words=array();
		if ($this->connect()) {
			if ($result = $this->connectDB->prepare('SELECT * FROM glossary.tword WHERE estonian~*:name OR russian~*:name OR english~*:name')) {
				$result->execute(array('name'=>$name));
				//$result->execute(['id'=>$id]);
                // $result->bindValue(':id', $id, PDO::PARAM_INT);
                // $result->execute();
			
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){
					$words[]=new Word($row['id_word'], $row['estonian'], $row['russian'], $row['english'], null);
                 }
			}
		}
        $this->connectDB=null;
	    return $words;
	}

	public function getDescriptionByWordId($id){
		$descriptions=array();
		if ($this->connect()) {
			if ($result = $this->connectDB->prepare('SELECT description.*, category.* 
			FROM glossary.tdescription description 
			JOIN glossary.tcategory category ON description.category_fk=category.category_id
			WHERE word_fk=:id')) {
				$result->execute(array('id'=>$id));
				//$result->execute(['id'=>$id]);
                // $result->bindValue(':id', $id, PDO::PARAM_INT);
                // $result->execute();
			
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){
					$descriptions[]=new Description($row['id_description_pk'], $row['description_est'], $row['description_rus'], 
					$row['description_eng'], $row['image'], $row['date_adding'], new Category($row['id_category'],
					$row['category_rus'],$row['category_est'],$row['category_eng']));
                 }
			}
		}
        $this->connectDB=null;
	    return $descriptions;
	}

    public function getAllCategories(){
		$categories=array();
		if ($this->connect()) {
			if ($result = $this->connectDB->query('SELECT * FROM glossary.tcategory')) {
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){
					$categories[]=new Category($row['id_category'], $row['category_rus'], 
					$row['category_est'], $row['category_eng']);
                 } 
			}
		}
        $this->connectDB=null;
		return $categories;
	}
    public function getCategoryByID($id){
		$category=null;
		if ($this->connect()) {
			if ($result = $this->connectDB->prepare('SELECT * FROM glossary.tcategory WHERE id_category=:id')) {
				$result->execute(array('id'=>$id));
				//$result->execute(['id'=>$id]);
                // $result->bindValue(':id', $id, PDO::PARAM_INT);
                // $result->execute();
				
				$numRows = $result->rowCount();
				if ($numRows==1) {
					$row=$result->fetch();
					$category=new Category($row[0], $row[1], $row[2], $row[3]);
				}
			}
		}
        $this->connectDB=null;
	    return $category;	
	}
    public function getAllUsers(){
		$users=array();
		if ($this->connect()) {
			if ($result = $this->connectDB->query('SELECT * FROM glossary.tuser')) {
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){
					$users[]=new User($row['id_user'], $row['firstname'], 
					$row['lastname'], $row['nickname'], $row['email'], 
					$row['user_roles'],$row['date_registration'],$row['user_password']);
                 } 
			}
		}
        $this->connectDB=null;
		return $users;
	}
    public function getUserByID($id){
		$user=null;
		if ($this->connect()) {
			if ($result = $this->connectDB->prepare('SELECT * FROM glossary.tuser WHERE id_user=:id')) {
				$result->execute(array('id'=>$id));
				//$result->execute(['id'=>$id]);
                // $result->bindValue(':id', $id, PDO::PARAM_INT);
                // $result->execute();
				
				$numRows = $result->rowCount();
				if ($numRows==1) {
					$row=$result->fetch();
					$user=new User($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
				}
			}
		}
        $this->connectDB=null;
	    return $user;
	}
    public function getUserWordByUserID($id){
		$words=array();
		if ($this->connect()) {
			if ($result = $this->connectDB->prepare('SELECT word.*, description.*, category.* 
			FROM glossary.tdescription description 
			JOIN glossary.tcategory category ON description.category_fk=category.id_category
			JOIN glossary.tuser_glossary dict ON dict.user_fk=:id 
			AND description.id_description_pk=dict.description_fk
			JOIN glossary.tword word ON word.id_word=description.word_fk')) {
				$result->execute(array('id'=>$id));			
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){					
					$word=null;
					$description=null;
					$description=new Description($row['id_description_pk'], $row['description_est'], $row['description_rus'], 
					$row['description_eng'], $row['image'], $row['date_adding'], new Category($row['id_category'],
					$row['category_rus'],$row['category_est'],$row['category_eng']));

					if(isExistWordIdInArray($row['id_word'])){
						end($word[])->getDescriptions()[]=$description;
					}else{
						$word=new Word($row['id_word'], $row['estonian'], $row['russian'], 
						$row['english'], $description);
						$words[] = $word;
					}
                 }
			}
		}
        $this->connectDB=null;
	    return $words;
	}

	private function isExistWordIdInArray($words,$wordId){
		foreach($words as $word){
			if($wordId==$word->id) return true;
		 }
		 return false;
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

