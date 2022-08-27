<?php 

class Article {

	static public function getAllArticle(){
		$stmt = DB::connect()->prepare('SELECT * FROM article');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}
    
}
?>