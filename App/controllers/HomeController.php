<?php 


class HomeController{

	public function index($page){
		include('App/views/'.$page.'.php');
	}

}

?>