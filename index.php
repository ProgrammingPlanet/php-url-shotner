<?php

    $linkid = explode('/',$_SERVER['REQUEST_URI'])[1];

    if($linkid==''){
        header('location: /admin'); //or header("HTTP/1.1 400 bad request");
        exit;
    }

    include('admin/dbcon.php');
    
    $st = $db->prepare("SELECT destination,visits FROM links WHERE linkid=?");
    $st->execute([$linkid]);
    
	if($st->rowCount() < 1){
		$error = "link does't exist.";
        include('errorpages/error.php');
        exit;
	}

    $row = $st->fetch(PDO::FETCH_ASSOC);

    header('Location: '.$row['destination']);

	try{
		
		$visits = json_decode($row['visits'],true);

		array_push($visits,[
				"ip"	=>	$_SERVER['REMOTE_ADDR'],
				"time"	=>	date('d-M-Y g:i A')
		]);

		$q = "UPDATE links SET visits='".json_encode($visits)."' WHERE linkid='".$linkid."'";

		$db->query($q);
		
	}catch(Exception $e){
		// print_r($e);
	}

?>

	
