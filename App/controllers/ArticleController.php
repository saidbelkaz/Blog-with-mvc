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

}
?>