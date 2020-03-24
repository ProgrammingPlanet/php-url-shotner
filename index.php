<?php

    $linkid = explode('/',$_SERVER['REQUEST_URI'])[1];

    if($linkid==''){
        header('location: /admin'); //or header("HTTP/1.1 400 bad request");
        exit;
    }

    include('admin/dbcon.php');
    
    $st = $db->prepare("SELECT destination FROM links WHERE linkid=?");
    $st->execute([$linkid]);
    $rowcount = $st->rowCount();

	if($rowcount < 1){
		$error = "link does't exist.";
        include('errorpages/error.php');
        exit;
	}

	$destination = $st->fetch(PDO::FETCH_ASSOC)['destination'];

    header('Location: '.$destination);

	try{

		$ip = $_SERVER['REMOTE_ADDR'];
		$time = date('Y-m-d H:i:s');

		$q = "INSERT INTO visits(linkid,ip,visited_at) VALUES ('$linkid','$ip','$time')";

		$db->query($q);
		
	}catch(Exception $e){
		// print_r($e);
	}

?>

	
