<?php 

class ArticleController{

	public function getAllArticle(){
		$Article = Article::getAllArticle();
		return $Article;
	}

    public function getDetails(){
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
				'name' => $_POST['name'],
				'content' => $_POST['content'],
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
		if(isset($_POST['submit'])){
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

}
?>