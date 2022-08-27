<?php 

class ArticleController{

	public function getAllArticle(){
		$Article = Article::getAllArticle();
		return $Article;
	}

}
?>