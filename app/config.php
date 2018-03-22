<?php header('Access-Control-Allow-Origin: *'); ?>
<?php header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept'); ?>
<?php header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT'); ?>
<?php
$SERVER='localhost';
$USERNAME='root';
$PASSWORD='';
$DB='schoolling';

$con=mysqli_connect($SERVER,$USERNAME,$PASSWORD,$DB) or die ("could not connect to mysql");;

