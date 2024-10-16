<?php 
ob_start();
include_once './includes/dbconn.php';
include_once './autherization/auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">

	<title>Yellow Pages</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="AxilBoard Bootstrap 4 Admin Template">
	<meta name="author" content="CodePassenger">

	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=css?family=Poppins%7cMaterial+Icons" rel="stylesheet"
		type='text/css'>

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-toggle.min.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/bootstrap-formhelpers.min.css">
	<link rel="stylesheet" href="assets/css/jquery-ui.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/bootstrap-slider.min.css">
	<link rel="stylesheet" href="assets/css/uploadfile.css">
	<link rel="stylesheet" href="assets/css/emoji.css">
	<link rel="stylesheet" href="assets/css/fullcalendar.min.css">
	<link rel="stylesheet" href="assets/css/lobipanel.min.css">

	<!-- Material Design CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-material-design.min.css">
	<link rel="stylesheet" href="assets/css/ripples.min.css">
	<link rel="stylesheet" href="assets/css/mdb.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

	<!-- Responsive Mobile Menu -->
	<link rel="stylesheet" href="assets/css/responsive-menu/jquery.accordion.css">
	<link rel="stylesheet" href="css/vertical-menu.css">

	<!-- Data Table CSS -->
	<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="assets/css/select.dataTables.min.css">

	<!-- Vector-ammap CSS -->
	<link rel="stylesheet" href="assets/css/ammap.css">
	<link rel="stylesheet" href="css/app.css">
	<link rel="stylesheet" href="css/responsive.css">

	<!-- CKEDITOR -->
	<script src="includes/ckeditor/ckeditor.js"></script>
</head>

<body class="menu-collapsed">
	<?php
	include_once './includes/code.php';
	include_once './includes/topNav.php';
	include_once './includes/sideNav.php';
	?>
	<div class="apps-container-wrap page-container">
		<div class="page-content">
			<div class="container-fluid">