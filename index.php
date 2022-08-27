<?php 
require_once './App/views/includes/header.php';
require_once './autoload.php';
require_once './App/controllers/HomeController.php';

$home = new HomeController();

$pages = ['blog','details','addArticle'];

// if(isset($_SESSION['logged']) && $_SESSION['logged'] === true){

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


require_once './App/views/includes/footer.php';


// }else if(isset($_GET['page']) && $_GET['page'] === 'register'){
// 	$home->index('register');
// }else{
// 	$home->index('login');
// }



?>