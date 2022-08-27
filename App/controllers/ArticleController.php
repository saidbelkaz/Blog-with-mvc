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

}
?>