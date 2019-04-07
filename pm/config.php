<?php
//We start sessions
session_start();

/******************************************************
------------------Required Configuration---------------
Please edit the following variables so the members area
can work correctly.
******************************************************/

//We log to the DataBase
mysql_connect('localhost', 'u0563804_rhimoni', 'G;]y-~5Zv^SK');
mysql_select_db('u0563804_portal');

//Webmaster Email
$mail_webmaster = 'example@example.com';

//Top site root URL
$url_root = 'www.rhimoniacademy.com/';

/******************************************************
-----------------Optional Configuration----------------
******************************************************/

//Home page file name
$url_home = '../index.php';

//Design Name
$design = 'default';
?>