<?php

	/*$DbHost = "localhost";
	$DbUser = "id11209361_zlink";
	$DbPass = "07860";
	$DbName = "id11209361_zlink";*/

    $DbHost = "localhost";
    $DbUser = "root";
    $DbPass = "07860";
    $DbName = "xlink";

    try {
        $db = new PDO("mysql:host=$DbHost;dbname=$DbName", $DbUser, $DbPass);
    }
    catch(PDOException $e){
        die ("DataBase Connection failed: " . $e->getMessage());
    }
    
    date_default_timezone_set("Asia/Kolkata");

