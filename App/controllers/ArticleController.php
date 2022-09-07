<?php 

class ArticleController{

	public function logout(){  
		$res = Article::logout();
		return $res;
	}
	public function getAllArticle(){  // salat
		$Article = Article::getAllArticle();
		return $Article;
	}
	public function getAllusers(){  
		$Article = Article::getAllusers();
		return $Article;
	}


	public function getLastArticle(){  
		$Article = Article::getLastArticle();
		return $Article;
	}
	public function getArticleRefu(){  
		$Article = Article::getArticleRefu();
		return $Article;
	}

	public function getAllorders(){ 
		$Article = Article::getAllorders();
		return $Article;
	}

	public function getDetails(){ //salat
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if(isset($_POST['id'])){
				$data =$_POST['id'];
				$Article = Article::getDetails($data);
				return $Article;
			}else{
				return 'ERORR';
			}
		}else{
			return 'error server';
		}
	}

	public function delete_article(){ //salat
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if(isset($_POST['id_article'])){
				$data =$_POST['id_article'];
				$Article_deleted = Article::delete_article($data);
				return $Article_deleted;
			}else{
				return 'ERORR';
			}
		}else{
			return 'error server';
		}
	}
	public function delete_user(){ //salat
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if(isset($_POST['id_users'])){
				$data =$_POST['id_users'];
				$deleted = Article::delete_user($data);
				return $deleted;
			}else{
				return 'ERORR';
			}
		}else{
			return 'error server';
		}
	}

	public function AccepteArticle(){ 
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if(isset($_POST['accepte'])){
				$data =$_POST['id_article'];
				$Article_deleted = Article::AccepteArticle($data);
				return $Article_deleted;
			}else{
				return 'ERORR';
			}
		}else{
			return 'error server';
		}
	}
	public function RefuseArticle(){ 
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if(isset($_POST['refuse'])){
				$data =$_POST['id_article'];
				$Article_deleted = Article::RefuseArticle($data);
				return $Article_deleted;
			}else{
				return 'ERORR';
			}
		}else{
			return 'error server';
		}
	}

	public function getAllComment(){
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if(isset($_POST['id'])){
				$data =$_POST['id'];
				$Article = Article::getAllComment($data);
				return $Article;
			}else{
				return 'ERORR';
			}
		}else{
			return 'error server';
		}
	}


	public function addComment(){
		if(isset($_POST['submit'])){
			$data = array(
				'id' => $_POST['idd'],
				'content' => $_POST['content']
			);
			$result = Article::addComment($data);

			// if($result === 'ok'){
			// 	Session::set('success','Employé Ajouté');
			// 	Redirect::to('home');
			// }else{
			// 	echo $result;
			// }
		}
	}
	
	public function addArticle(){
		if(isset($_POST['addArticle'])){
			if (!empty($_FILES['imgs'])) {

            
            $fileName=$_FILES['imgs']['name'];
            $fileTmpname=$_FILES['imgs']['tmp_name'];
            $fileError=$_FILES['imgs']['error'];

            $fileExt=explode('.',$fileName);
            $fileActualExt=strtolower(end($fileExt));
            $allowed=array('jpg','jpeg','png');
            	if(in_array($fileActualExt,$allowed)){            
            	    if($fileError === 0){
            	        $fileNameNew=uniqid('',true).".".$fileActualExt;
            	        $fileDestintion="App/views/images/". $fileNameNew;
            	        move_uploaded_file($fileTmpname,$fileDestintion);
						$data = array(
							'title' => $_POST['title'],
							'Content' => $_POST['Content'],
							'imgs' => $fileNameNew
						);
						$result = Article::addArticle($data);

            	    }else{
            	        return "on a une erreur de chargement de votre image !!";
            	    }
            	}
        
    		}else{
				return "empty imgs";
			}

		}else{
			return "error POST";
		}
	}
	
	public function UpdateUsers(){
		if(isset($_POST['upd'])){

				$data = array(
						'fname' => $_POST['Fname'],
						'lname' => $_POST['Lname'],
						'email' => $_POST['email']
				);
				$result = Article::UpdateUsers($data);
		}
		
	}
	

	public function addUser(){
		if(isset($_POST['sub'])){
			if (!empty($_FILES['image'])) {

            
            $fileName=$_FILES['image']['name'];
            $fileTmpname=$_FILES['image']['tmp_name'];
            $fileError=$_FILES['image']['error'];

            $fileExt=explode('.',$fileName);
            $fileActualExt=strtolower(end($fileExt));
            $allowed=array('jpg','jpeg','png');
            	if(in_array($fileActualExt,$allowed)){            
            	    if($fileError === 0){
            	        $fileNameNew=uniqid('',true).".".$fileActualExt;
            	        $fileDestintion="App/controllers/images/". $fileNameNew;
            	        move_uploaded_file($fileTmpname,$fileDestintion);
						$data = array(
							'fname' => $_POST['Fname'],
							'lname' => $_POST['Lname'],
							'email' => $_POST['signup-email'],
							'password' => $_POST['signup-password'],
							'profile' => $fileNameNew
						);
						$result = Article::addUser($data);

            	    }else{
            	        return "on a une erreur de chargement de votre image !!";
            	    }
            	}
        
    		}else{
				return "empty imgs";
			}

		}else{
			return "error POST";
		}
	}
	public function EditePic(){
		if(isset($_FILES['image'])){
			
			$fileName=$_FILES['image']['name'];
            $fileTmpname=$_FILES['image']['tmp_name'];
            $fileError=$_FILES['image']['error'];
			
            $fileExt=explode('.',$fileName);
            $fileActualExt=strtolower(end($fileExt));
            $allowed=array('jpg','jpeg','png');
			// Redirect::to('blog');
            	if(in_array($fileActualExt,$allowed)){            
            	    if($fileError === 0){
            	        $fileNameNew=uniqid('',true).".".$fileActualExt;
            	        $fileDestintion="App/controllers/images/". $fileNameNew;
            	        move_uploaded_file($fileTmpname,$fileDestintion);
						$data = array(
							'profile' => $fileNameNew
						);
						$result = Article::EditePic($data);

            	    }else{
            	        return "on a une erreur de chargement de votre image !!";
            	    }
            	}

		}else{
			return "error POST";
		}
	}
	public function addUserDash(){
		if(isset($_POST['ajouter'])){
			if (!empty($_FILES['image'])) {

            
            $fileName=$_FILES['image']['name'];
            $fileTmpname=$_FILES['image']['tmp_name'];
            $fileError=$_FILES['image']['error'];

            $fileExt=explode('.',$fileName);
            $fileActualExt=strtolower(end($fileExt));
            $allowed=array('jpg','jpeg','png');
            	if(in_array($fileActualExt,$allowed)){            
            	    if($fileError === 0){
            	        $fileNameNew=uniqid('',true).".".$fileActualExt;
            	        $fileDestintion="App/controllers/images/". $fileNameNew;
            	        move_uploaded_file($fileTmpname,$fileDestintion);
						$data = array(
							'fname' => $_POST['Fname'],
							'lname' => $_POST['Lname'],
							'email' => $_POST['signup-email'],
							'password' => $_POST['signup-password'],
							'rights' => $_POST['rights'],
							'profile' => $fileNameNew
						);
						$result = Article::addUserDash($data);

            	    }else{
            	        return "on a une erreur de chargement de votre image !!";
            	    }
            	}
        
    		}else{
				return "empty imgs";
			}

		}else{
			return "error POST";
		}
	}

	public function login(){

		if(isset($_POST['submit'])){
			$data = array(
							'email' => $_POST['login-email'],
							'password' => $_POST['login-password']
						);
			$result = Article::login($data);
    	}
	}

	public function getInfoUser(){  // salat
		$info = Article::getInfoUser();
		return $info;
	}

	public function getMyArticles(){  // salat
		$info = Article::getMyArticles();
		return $info;
	}


}



?>