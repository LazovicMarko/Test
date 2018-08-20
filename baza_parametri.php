<?php
$server = 'localhost';
$user   = 'root';
$pass   = '';
$db     = 'testweb';

$bp = mysqli_connect($server,$user,$pass,$db);
if(!$bp){
    die('Greska pri povezivanju sa bazaom podataka');
}