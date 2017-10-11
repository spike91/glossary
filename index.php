<?php
require_once "autoloader.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
			///$db=new MySQLiService();
			$db=new PDOService();
			
			echo "<pre>";
			//$words=$db->getAllWords();
			//$words=$db->getWordsByPartName("rob");
			//$words=$db->getDescriptionByWordId(1);
			$words=$db->getUserWordByUserID(1);
			foreach ($words as $word) {
				var_dump($word);
			}
			echo "</pre>";
        ?>
    </body>
</html>
