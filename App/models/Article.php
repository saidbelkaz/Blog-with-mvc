<?php 

class Article {

	static public function getAllArticle(){
		$stmt = DB::connect()->prepare('SELECT * FROM article');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}
    
	static public function getDetails($data){
		$id = $data;
		$stmt = DB::connect()->prepare("SELECT * FROM article WHERE id_article=$id");
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
		$stmt->close();
		$stmt = null;
	}

}
?>