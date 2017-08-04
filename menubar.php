<?php
error_reporting(E_ALL);
error_reporting(E_ERROR);
ini_set('display_errors', '1');
include_once('connectlibraryusraschlkdin.php');
session_start();

$usernamein = $_SESSION['adminlibusralogincheck'];


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Usra Library</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <link rel="icon" type="image/ico" href="images/logo.png" />
	<script type="text/javascript" src="../js/datepicker.js"></script>
        <link href="../css/datepicker.css" rel="stylesheet" type="text/css" />
	<style>
		.bookmenu{background-color:#FFF; padding:1px 6px 1px 6px;  border-radius:3px;}
		.bookmenu:hover{color:#F00;}
		body{
		background:url(images/backgroundimg.png)  repeat-y;
		}
		body{
		background:url(images/backgroundimg.png);
		}
		#page-wrapper{
		background:url(images/backgroundimg.png) repeat-x; repeat-y;
		}
		#wrapper{
		background:url(images/backgroundimg.png) repeat-x; repeat-y;
		}
		.container{
		background:url(images/backgroundimg.png) repeat-x; repeat-y;
		}
		.row{
		background:url(images/backgroundimg.png) repeat-x; repeat-y;
		}
	</style>
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Usra Academy Library</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-right navbar-user">
           
			 <li class="dropdown user-dropdown">
              <a href="../usralibrary" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-home"></i> Home</a>
            </li>
			 <li>
              <a href="books"><i class="fa fa-book"></i> Books</a>
            </li>
			<li>
              <a href="borrow"><i class="fa fa-edit"></i> Borrow</a>
            </li>
			<li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-power-off"></i> Log out</a>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>