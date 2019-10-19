<?php

    if(!isset($_REQUEST['op']))
        exit;
    else
        $op = $_REQUEST['op'];
        
    header('Content-Type: application/json');
        
    include('dbcon.php');
    
    function randomStr($n)
    {
        $charset = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str = '';
        while($n--)
        {
            $str .= $charset[rand(0,strlen($charset)-1)];
        }
        return $str;
    }
    
    function validateurl($url)
    {
        // Remove all illegal characters from a url
        $url = filter_var($url, FILTER_SANITIZE_URL);
        
        $urlregx = '/^(http(s)?):\/\/([A-Za-z0-9]+\.)?([A-Za-z0-9-_]{2,})(\.[A-Za-z0-9-_]{2,3})?\.([A-Za-z0-9-_]{2,3})(:[0-9]{2,})?(\/.*)?$/i';
        
        if (preg_match($urlregx,$url))
            return true;
        
        return false;
    }
        
        
    if($op=='short')
    {
        $longurl = $_POST['longurl'];
        
        if(!validateurl($longurl))
            die(json_encode(['status'=>0,'msg'=>'invalid long url']));
        
        $linkids = $db->query("SELECT linkid FROM zlinks")->fetchAll(PDO::FETCH_COLUMN);
        
        
        do{
           $newlinkid = randomStr(6);
        }while(array_search($newlinkid,$linkids) !== FALSE);
        
        
        $q = "INSERT INTO zlinks (linkid, destination, created_at) VALUES (?,?,?)";
        $ok = $db->prepare($q)->execute([$newlinkid, $longurl, date('Y-m-d H:i:s')]);
        
        if($ok)
            echo json_encode(['status'=>1,'shorturlid'=>$newlinkid]);
        else
            echo json_encode(['status'=>0,'msg'=>'error, please try again.']);
    }
