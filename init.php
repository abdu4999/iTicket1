<?php

	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include 'connect.php';

	$sessionUser = '';
	if (isset($_SESSION['User'])) {
		$sessionUser = $_SESSION['User'];
	}

	// Routes
	$tpl = 'include/templates/'; // Templates Directory
	$lang = 'include/languages/'; // Language Directory
	$func = 'include/functions/'; // Fucntions Directory
	$css = 'layout/css/'; // Css Directory
	$js = 'layout/js/'; // Js Directory

	// Include The Important Files
	include $func.'function.php';
	include $lang.'english.php';
	include $tpl . 'header.php';
	if(!isset($nonavbar)) {  include $tpl . 'navbar.php'; }
