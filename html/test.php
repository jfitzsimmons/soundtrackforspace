<!DOCTYPE HTML PUBLIC “-//W3C//DTD HTML 4.01 Transitional//EN” “http://www.w3.org/TR/html4/loose.dtd”>
<meta http-equiv=”content-type” content=”text/html; charset=utf-8″ />
<?php
    
    $str = 'firephp-core-master/lib/FirePHPCore/FirePHP.class.php';
    
    #Include the FirePHP class
    include_once($str);
    #Start buffering the output. Not required if output_buffering is set on in php.ini file
    
    #get a firePHP variable reference
    $firephp = FirePHP::getInstance(true);
    # we log today’s date as an example. you could log whatever variable you want to
    $todays_date = 'today';




    
    $database_username = "db125045";
    $database_password = "1qaSW@3ed";
    $database_info = "mysql:dbname=db125045_wp;host=internal-db.s125045.gridserver.com";
    try
    {
        
        $PDO = new PDO($database_info, $database_username, $database_password);
        
        
        #new big query
        $queryattr = "SELECT * FROM `wp_sfswoocommerce_order_itemmeta` WHERE (meta_key = '_qty' AND order_item_id = 3) OR (meta_key = 'pa_color' AND order_item_id = 3) OR (meta_key = 'pa_size' AND order_item_id = 3)";
        
        #shipping addy
        $queryshipping = "SELECT meta_value FROM `wp_sfspostmeta` WHERE meta_key LIKE '_shipping%' AND post_id = 235";
        


        $statement1 = $PDO->prepare($queryqty);
        $statement2 = $PDO->prepare($queryshipping);
        $statement3 = $PDO->prepare($queryattr);
        
        if (!$statement1 | !$statement2 | !$statement3 ) {
            echo "\nPDO::errorInfo():\n";
            print_r($PDO->errorInfo());
        }
        

        $shipping = $PDO->query($queryshipping);
        $attrs = $PDO->query($queryattr);

        $f2 = $shipping->fetchAll();
        $f3 = $attrs->fetchAll();

        $firephp->log($f3, ‘Object‘);
        $quantity = (int)$f3[0][meta_value];
        
        
        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
                                       CURLOPT_RETURNTRANSFER => 1,
                                       CURLOPT_URL => 'https://api.scalablepress.com/v2/quote',
                                       CURLOPT_USERPWD => ':test_cZDtREd-ZdCqU7S8NsmBFw',
                                       CURLOPT_POST => 1,
                                       CURLOPT_POSTFIELDS => array(
                                                                   'type' => 'dtg',
                                                                   'products[0][id]' => 'canvas-v-neck-t-shirt',
                                                                   'products[0][quantity]'=>$quantity,
                                                                   'products[0][color]'=>'Deep Heather',
                                                                   'products[0][size]'=>'lrg',
                                                                   'address[name]'=>$f2[0][meta_value] . " " . $f2[1][meta_value],
                                                                   'address[address1]'=>$f2[4][meta_value],
                                                                   'address[city]'=>$f2[6][meta_value],
                                                                   'address[state]'=>$f2[7][meta_value],
                                                                   'address[zip]'=>$f2[8][meta_value],
                                                                   'designId'=>'55de065bbf460dac2d91ecbf'
                                                                   )
                                       ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);
        
        
        $json = json_decode($resp, true);
        print_r($json);

    }
    catch(Exception $e) {
        echo 'Exception -> ';
        var_dump($e->getMessage());
    }
    
    #USE THESE get
    #get scalable and designid:
    
    ?>

