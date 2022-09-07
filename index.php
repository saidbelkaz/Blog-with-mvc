<?php 
require_once './App/views/includes/header.php';
require_once './autoload.php';
require_once './App/controllers/HomeController.php';

$home = new HomeController();

$pages = ['blog','details',"administrator-users","dashboard","login","signup"];

if(isset($_SESSION['id'])){
	// $home->index('blog');
	if(isset($_GET['page'])){
		if(in_array($_GET['page'],$pages)){
			$page = $_GET['page'];
			$home->index($page);
		}else{
			include('App/views/includes/404.php');
		}
	}else{
		$home->index('blog');
	}

	
}else if(isset($_GET['page']) && $_GET['page']==="signup"){
	$home->index('signup');
}else if(isset($_GET['page']) && $_GET['page']==="dashboard"){
	$home->index('dashboard');
}else{
	$home->index('login');
}
require_once './App/views/includes/footer.php';