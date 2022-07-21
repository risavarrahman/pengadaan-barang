<?php 
	require('config/config.php');

	session_start();
	ob_start();

	if( !isset($_SESSION["login"]) ) {
		header("location: login/login.php");
		exit;
	}

	if( isset($_SESSION['login']) ) {
    header("location: index/index.php");
    exit;
  }
