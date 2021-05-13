<?php

session_start();

//Configuring variables for DB
$servername = "localhost";
$username = "vas";
$password = "vas@2021";
$db = "vasys";

//creating connection
$conn = new mysqli($servername,$username,$password,$db);

//checking connection
if($conn->connect_error){
	die("connection Failed: ".$conn->connect_error);
}
