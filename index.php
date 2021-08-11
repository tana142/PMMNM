<?php 
	//start session
	session_start();
	//---
	$page = isset($_GET["page"]) ? $_GET["page"] : "";
	if($page!="")
		$fileController = $page.".php";
    if(!isset($_SESSION["username"])){
        include "Views/DangKy.php";
    }else{
        include "Views/Home.php";
    }
 ?>