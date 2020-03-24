<?php

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
        
        $urlregx = '/^(ftp|http(s)?):\/\/([A-Za-z0-9]+\.)?([A-Za-z0-9-_]{2,63})?\.([A-Za-z0-9-_]{2,63})(:[0-9]{2,})?(\/.*)?$/i';
        
        if (preg_match($urlregx,$url))
            return true;
        
        return false;
    }
    
    function validateAlias($alias)
    {
        $aliasregx = '/^([A-Za-z0-9]{6,10})$/i';
        
        if (preg_match($aliasregx,$alias)) return true;
        
        return false;
        
    }

    function short($longurl,$alias=NULL)
    {    
        global $db;

        if(!validateurl($longurl))
            return ['status'=>0,'msg'=>'invalid long url'];
            
        $usealias = FALSE;
        
        if($alias!=='' && $alias!==NULL)
        {
            if(!validateAlias($alias))
                return ['status'=>0,'msg'=>'alias must be alpha-numeric and of size min 6 and max 10.'];
            
            $usealias = TRUE;
        }

        $longurl = trim($longurl,'/');

        /* check if destination link exists */

        $st = $db->prepare("SELECT linkid FROM links WHERE destination=?");
        $st->execute([$longurl]);
        $newlinkid = $st->fetch(PDO::FETCH_COLUMN);

        if($newlinkid!==FALSE && (!$usealias || $alias==$newlinkid))
        {
            return ['status'=>1,'shorturlid'=>$newlinkid];
        }

        /* check end */
        
        if(!$usealias)
        {
            $linkids = $db->query("SELECT linkid FROM links")->fetchAll(PDO::FETCH_COLUMN);
            
            do{
               $newlinkid = randomStr(6);
            }while(array_search($newlinkid,$linkids) !== FALSE);
        }
        else
        {
            $newlinkid = $alias;
        }
        
        $q = "INSERT INTO links(linkid,destination,created_at) VALUES (?,?,?)";
        $ok = $db->prepare($q)->execute([$newlinkid, $longurl,date('Y-m-d H:i:s')]);
        
        if($ok)
            return ['status'=>1,'shorturlid'=>$newlinkid];
        else
            return ['status'=>0,'msg'=>'error, please try again.'];
    }

?>