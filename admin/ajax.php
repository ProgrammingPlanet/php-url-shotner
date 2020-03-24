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

        $q = "SELECT ip,visited_at FROM visits WHERE linkid='$linkid'";

        $visits = $db->query($q)->fetchall(PDO::FETCH_ASSOC);

        echo json_encode($visits);   //here visits are already as json string
    }
    
    if($op=='fetch-graph-data')
    {
        $datemonth = date("Y-m");
        $q = "SELECT created_at from links where created_at LIKE '$datemonth%'"; //record from current month
        
        $rows = $db->query($q)->fetchall();
        
        $creates = $visits = array_fill(0,date('d'),0); //array of size upto today's date
        foreach($rows as $row)
        {
            $date = (int)substr($row['created_at'],8,2);
            $creates[$date-1]++;
        }

        $q = "SELECT visited_at from visits where visited_at LIKE '$datemonth%'"; //record from current month
        
        $rows = $db->query($q)->fetchall();

        foreach($rows as $row)
        {
            $date = (int)substr($row['visited_at'],8,2);
            $visits[$date-1]++;
        }

        echo json_encode(['status'=>1,'data'=>['creats'=>$creates,'visits'=>$visits]]);
        
    }
