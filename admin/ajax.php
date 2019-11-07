<?php

    if(!isset($_REQUEST['op']))
        exit;
    else
        $op = $_REQUEST['op'];
        
    header('Content-Type: application/json');
        
    include('dbcon.php');

    include('functions.php');
    

    if($op=='short')
    {
        $result = short($_POST['longurl'],$_POST['alias']);
        echo json_encode($result);
    }

    if($op=='fetchvisits')
    {
        $linkid = $_POST['linkid'];

        $q = "SELECT visits FROM links WHERE linkid='$linkid'";

        $visits = $db->query($q)->fetch(PDO::FETCH_ASSOC)['visits'];

        echo $visits;   //here visits are already as json string
    }
