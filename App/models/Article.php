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
    
	static public function getAllComment($data){
		$id = $data;
		$stmt = DB::connect()->prepare("SELECT * FROM comment WHERE id_article=$id ORDER BY id_article DESC");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function addComment($data){
		$stmt = DB::connect()->prepare("INSERT INTO `comment`(`id_article`, `full_name`, `content`, `date_comment`) 
			VALUES (:id,:full_name,:content,current_timestamp())");
		$stmt->bindParam(':id',$data['id']);
		$stmt->bindParam(':full_name',$data['name']);
		$stmt->bindParam(':content',$data['content']);
		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}

		$stmt->close();
		$stmt = null;
	}

}
?>