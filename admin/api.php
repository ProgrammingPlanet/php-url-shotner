<?php
	
	header('Content-Type: application/json');

	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		die(json_encode(['status'=>0,'msg'=>'Only Post Method Allowed.']));
	}

	if(!isset($_REQUEST['op']))
	{
		die(json_encode(['status'=>0,'msg'=>'Error Occured.']));
	}

    $op = $_REQUEST['op'];

    include('dbcon.php');

    include('functions.php');

    if($op=='short')
    {
    	$result = short($_REQUEST['longurl']);
        echo json_encode($result);
    }

