<?php

	$DbHost = "localhost";
	$DbUser = "sysadmin";
	$DbPass = "07860";
	$DbName = "zlink";

    try {
        $db = new PDO("mysql:host=$DbHost;dbname=$DbName", $DbUser, $DbPass);
    }
    catch(PDOException $e){
        die ("DataBase Connection failed: " . $e->getMessage());
    }

