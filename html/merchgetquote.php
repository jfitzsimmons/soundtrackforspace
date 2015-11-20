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
        function array_divide($array, $segmentCount) {
            $dataCount = count($array);
            if ($dataCount == 0) return false;
            $segmentLimit = ceil($dataCount / $segmentCount);
            $outputArray = array_chunk($array, $segmentLimit);
            
            return $outputArray;
        }
        $PDO = new PDO($database_info, $database_username, $database_password);
        
        #getorders
        $getorderitemid = "SELECT DISTINCTROW meta_key,meta_value FROM `wp_sfswoocommerce_order_itemmeta` WHERE ((exported <> 'exportquote') AND (exported <> 'exportorder')) AND (`meta_key` = '_product_id' ) OR (`meta_key` = '_variation_id' ) OR (`meta_key` = '_qty' )";
        $getorderid = "SELECT DISTINCTROW order_id FROM `wp_sfswoocommerce_order_items` ";


        $statement1 = $PDO->prepare($getorderitemid);

        $getids1 = $PDO->query($getorderitemid);
        $statementx = $PDO->prepare($getorderid);
        
        $getidsx = $PDO->query($getorderid);
        $getship = $PDO->query($queryshipping);
        $f1 = $getids1->fetchAll();

        $shipping = array();
        $productlist = array();
        $shirtnames = array();
        $designids = array();
        $colors = array();
        $sizes = array();
        $scalable = array();
        $qty = array();
        $varis = array();
        $pids = array();
        $params = array();
        $paramkey='';
        $paramval='';
        
        $queryprodvari = "SELECT `meta_value`, `meta_key`, `post_id` FROM `wp_sfspostmeta` WHERE ((`meta_key` = 'attribute_pa_color') OR (`meta_key` = 'attribute_pa_size') OR (`meta_key` = 'scalable') OR (`meta_key` = 'shirtname') OR (`meta_key` = 'designid') OR (`meta_key` LIKE '_shipping%')) ORDER BY `wp_sfspostmeta`.`meta_key` ASC";
        
        $statement2 = $PDO->prepare($queryprodvari);
        $parodvari = $PDO->query($queryprodvari);
        $f2 = $parodvari->fetchAll();
        

        
        foreach ($f1 as $key=>$value) {
            if ($value[meta_key] === '_qty') {
                array_push($qty, $value[meta_value]);
            }
            if ($value[meta_key] === '_variation_id') {
                array_push($varis, $value[meta_value]);

            }
            if ($value[meta_key] === '_product_id') {
                array_push($pids, $value[meta_value]);
                
            }
            
            
        }


$maxiterations = count($qty);
        $key4 = 0;
        $i = 0;
        $i2 = 0;
        $i3 = 0;


$firephp->log($maxiterations, ‘Object‘);

    
    foreach ($varis as $key2=>$value2) {
        
        
        
        foreach ($f2 as $key3=>$value3) {
            
            $keystr = $value3[meta_key];

            if (($value2 === $f2[$key3][post_id])){
                
                
                if ($keystr === 'attribute_pa_color') {
                      
                    if ($i < $maxiterations) {
                        
                        $type = "items[". $key4 ."][type]";
                        $params[$type] = 'dtg';
                        array_push($colors, $value3[meta_value]);
                        $paramkey="items[".$key4."][products][". $i ."][color]";
                        $params[$paramkey] = (string)$value3[meta_value];
                        $paramkey="items[".$key4."][products][". $i ."][quantity]";
                        $params[$paramkey] = $qty[$i];
                        $paramkey="items[".$key4."][products][". $i ."][id]";
                        $params[$paramkey] = "canvas-v-neck-t-shirt";
                        $i++;
                    }
                }
                else if ($keystr === 'attribute_pa_size') {
                    if ($i2 < $maxiterations) {
                        echo "size </br></br>";
                        array_push($sizes, $value3[meta_value]);
                        $paramkey="items[".$key4."][products][". $i2 ."][size]";
                        $params[$paramkey] = (string)$value3[meta_value];
                        $i2++;
                    }
                }
                echo "after ifs</br>";
            }
        }
        foreach ($getidsx as $key4=>$value4) {
            
        foreach ($f2 as $key5=>$value5) {
            $keystr2 = $value5[meta_key];
            
            if ($keystr2 === 'designid') {
                
                array_push($designids, $value5[meta_value]);
                $paramkey="items[".$key4."][designId]";
                $params[$paramkey] = (string)$value5[meta_value];
                
                
            }
            
            if ($keystr2 === 'scalable') {
                array_push($scalable, $value5[meta_value]);
            }
            
            if ($keystr2 === '_shipping_address_1') {
                $paramkey="items[".$key4."][address][address1]";
                $params[$paramkey] = (string)$value5[meta_value];
            }
            if ($keystr2 === '_shipping_address_2') {
                $paramkey="items[".$key4."][address][address1]";
                $params[$paramkey] = (string)$value5[meta_value];
            }
            if ($keystr2 === '_shipping_city') {
                $paramkey="items[".$key4."][address][city]";
                $params[$paramkey] = (string)$value5[meta_value];
            }
            if ($keystr2 === '_shipping_company') {
                $paramkey="items[".$key4."][address][company]";
                $params[$paramkey] = (string)$value5[meta_value];
            }
            if ($keystr2 === '_shipping_country') {
                $paramkey="items[".$key4."][address][country]";
                $params[$paramkey] = (string)$value5[meta_value];
            }
            if ($keystr2 === '_shipping_first_name') {
                $fname=$value5[meta_value];
            }
            if ($keystr2 === '_shipping_last_name') {
                $paramkey="items[".$key4."][address][name]";
                $params[$paramkey] = (string)$fname ." ".(string)$value5[meta_value];
            }
            if ($keystr2 === '_shipping_postcode') {
                $paramkey="items[".$key4."][address][zip]";
                $params[$paramkey] = (string)$value5[meta_value];
            }
            if ($keystr2 === '_shipping_state') {
                $paramkey="items[".$key4."][address][state]";
                $params[$paramkey] = (string)$value5[meta_value];
            }
        }
    }
}
       
    $firephp->log($params, ‘Object‘);

    $curl = curl_init();
    // Set some options - we are passing in a useragent too here

    curl_setopt_array($curl, array(
       CURLOPT_RETURNTRANSFER => 1,
       CURLOPT_URL => 'https://api.scalablepress.com/v2/quote/bulk',
       CURLOPT_USERPWD => ':test_cZDtREd-ZdCqU7S8NsmBFw',
       CURLOPT_POST => true,
       CURLOPT_POSTFIELDS => http_build_query($params)
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

    ?>
<script>
console.log(new Error().stack);
</script>
