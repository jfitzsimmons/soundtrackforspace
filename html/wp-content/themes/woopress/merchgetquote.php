<?php
    $database_username = "db125045";
    $database_password = "1qaSW@3ed";
    $database_info = "mysql:host=localhost;dbname=YOUR_DATABASE_NAME";
    try
    {
        
        $PDO = new PDO($database_info, $database_username, $database_password);
        $q = $db->prepare("SELECT meta_value FROM wp_sfswoocommerce_order_itemmeta WHERE meta_key = :_qty and order_item_id = :3 LIMIT 1");
        
        $q->execute();
        
        if ($q->rowCount() > 0){
            $check = $q->fetch(PDO::FETCH_ASSOC);
            $row_id = $check['meta_value'];
            print_r($singleValue);
        }
    }
    catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    
    
    
    
    
    
    
    
    //USE THESE get
    //get scalable and designid:

    
       ?>








