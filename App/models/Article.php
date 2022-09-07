<?php 
// session_start();

class Article {

	static public function addUser($data){
		$fname=$data['fname'];
		$lname=$data['lname'];
		$email=$data['email'];
		$profile=$data['profile'];
		$password=$data['password'];
		$test = DB::connect()->prepare("SELECT * FROM `users` WHERE `email_users`='$email'");
		$test->execute();
		
		if ($test->rowCount() > 0) {
			return "email deja exec";
		}else{
			$stmt = DB::connect()->prepare("INSERT INTO `users`(`id_users`, `fname`, `lname`, `email_users`, `profile`, `password_users`) VALUES ('','$fname','$lname','$email','$profile','$password')");
			if ($stmt->execute()) {

				return Redirect::to('login');
				$stmt->close();
				$stmt = null;
			}else{
				return 'not work';
				$stmt->close();
				$stmt = null;
			}
		}
	}
	
	static public function addUserDash($data){
		$fname=$data['fname'];
		$lname=$data['lname'];
		$email=$data['email'];
		$profile=$data['profile'];
		$password=$data['password'];
		$rights=$data['rights'];
		$test = DB::connect()->prepare("SELECT * FROM `users` WHERE `email_users`='$email'");
		$test->execute();
		
		if ($test->rowCount() > 0) {
			return "email deja exec";
		}else{
			$stmt = DB::connect()->prepare("INSERT INTO `users`(`id_users`, `fname`, `lname`, `email_users`, `profile`, `password_users`,`actions`) VALUES ('','$fname','$lname','$email','$profile','$password','$rights')");
			if ($stmt->execute()) {

				return header("Refresh:0");
				$stmt->close();
				$stmt = null;
			}else{
				return 'not work';
				$stmt->close();
				$stmt = null;
			}
		}
	}

	static public function UpdateUsers($data){
		$fname=$data['fname'];
		$lname=$data['lname'];
		$email=$data['email'];
		$id=$_SESSION['id'];

		$stmt = DB::connect()->prepare("UPDATE `users` SET `fname`= '$fname' ,`lname`= '$lname' ,`email_users`= '$email' WHERE `users`.`id_users` = $id ");
		$stmt->execute();
		return header("Refresh:0");
		$stmt->close();
		$stmt = null;
	
	}
	static public function EditePic($data){
		$profile=$data['profile'];
		$id=$_SESSION['id'];

		$stmt = DB::connect()->prepare("UPDATE `users` SET `profile`= '$profile' WHERE `users`.`id_users` = $id ");
		$stmt->execute();
		return header("Refresh:0");
		$stmt->close();
		$stmt = null;
	
	}


	static public function getInfoUser(){ 
		$id=$_SESSION['id'];
		$stmt = DB::connect()->prepare("SELECT * FROM `users` WHERE id_users='$id'");
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
		$stmt = null;
	}

	static public function getMyArticles(){ 
		$id=$_SESSION['id'];
		$stmt = DB::connect()->prepare("SELECT id_article,titles,Situation FROM`users`INNER JOIN `article` ON users.id_users=article.id_users WHERE users.id_users = $id");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function login($data){ 
		$email=$data['email'];
		$password=$data['password'];
		
		$stmt = DB::connect()->prepare("SELECT * FROM `users` WHERE email_users='$email' AND password_users='$password'");
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			$rep=$stmt->fetch();
			$_SESSION['id']=$rep['id_users'];
			return Redirect::to('blog');
			$stmt->close();
			$stmt = null;
		}else if ($stmt->rowCount() == 0){
			return Redirect::to('signup');
			$stmt->close();
			$stmt = null;
		}

	}

	static public function getAllArticle(){ //salat
		$stmt = DB::connect()->prepare('SELECT * FROM article WHERE Situation="accepted"');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}
	static public function getAllusers(){ //salat
		$stmt = DB::connect()->prepare('SELECT id_users,fname,lname,actions FROM `users`');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}
	static public function getLastArticle(){ 
		$stmt = DB::connect()->prepare('SELECT * FROM article WHERE Situation="accepted" ORDER BY id_article DESC LIMIT 5  ;');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}
	static public function getArticleRefu(){ 
		$stmt = DB::connect()->prepare('SELECT * FROM article WHERE Situation="did not accept" ORDER BY id_article DESC LIMIT 5 ;');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}
	static public function getAllorders(){ 
		$stmt = DB::connect()->prepare('SELECT fname,lname,titles,id_article FROM `article` INNER JOIN users ON article.id_users=users.id_users WHERE Situation ="Wait for acceptance";');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function getDetails($data){ // salat
		$id = $data;
		$stmt = DB::connect()->prepare("SELECT * FROM article WHERE id_article=$id");
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
		$stmt->close();
		$stmt = null;
	}
	
	static public function getAllComment($data){ //salat
		$id = $data;
		$stmt = DB::connect()->prepare("SELECT fname,lname,date_comment,content FROM comment INNER JOIN users ON comment.id_users=users.id_users WHERE id_article=$id ORDER BY id_article DESC");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function delete_article($data){ // salat
		$id = $data;
		$stmt = DB::connect()->prepare("DELETE FROM article WHERE id_article = $id");
		if ($stmt->execute()) {
			return header("Refresh:0");
			$stmt->close();
			$stmt = null;
			
		}
	}
	static public function delete_user($data){ // salat
		$id = $data;
		$stmt = DB::connect()->prepare("DELETE FROM users WHERE id_users = $id");
		if ($stmt->execute()) {
			return header("Refresh:0");
			$stmt->close();
			$stmt = null;
			
		}
	}

	static public function AccepteArticle($data){ 
		$id = $data;
		$stmt = DB::connect()->prepare("UPDATE `article` SET `Situation`='accepted' WHERE id_article = $id");
		if ($stmt->execute()) {
			return header("Refresh:0");
			$stmt->close();
			$stmt = null;
			
		}
	}

	static public function RefuseArticle($data){ 
		$id = $data;
		$stmt = DB::connect()->prepare("UPDATE `article` SET `Situation`='did not accept' WHERE id_article = $id");
		if ($stmt->execute()) {
			return header("Refresh:0");
			$stmt->close();
			$stmt = null;
			
		}
	}

	static public function addComment($data){ //salat
		$stmt = DB::connect()->prepare("INSERT INTO `comment`(`id_article`, `id_users`, `content`, `date_comment`) 
			VALUES (:id,:id_user,:content,current_timestamp())");
		$stmt->bindParam(':id',$data['id']);
		$stmt->bindParam(':id_user',$_SESSION['id']);
		$stmt->bindParam(':content',$data['content']);
		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}

		$stmt->close();
		$stmt = null;
	}

	static public function addArticle($data){ //sakat
		$stmt = DB::connect()->prepare("INSERT INTO `article`(`id_users`,`titles`, `details`, `images`) 
			VALUES (:id,:title,:Content,:imgs)");
		$stmt->bindParam(':id',$_SESSION['id']);
		$stmt->bindParam(':title',$data['title']);
		$stmt->bindParam(':Content',$data['Content']);
		$stmt->bindParam(':imgs',$data['imgs']);
		if($stmt->execute()){
			header('location: blog');
		}

	}
	static public function logout(){
		session_destroy();
		return Redirect::to('login');
	}

}

?>