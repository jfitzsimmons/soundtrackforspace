<?php
    
    // Get cURL resource
    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
                                   CURLOPT_RETURNTRANSFER => 1,
                                   CURLOPT_URL => 'https://api.scalablepress.com/v2/order',
                                   CURLOPT_USERPWD => ':test_cZDtREd-ZdCqU7S8NsmBFw',
                                   CURLOPT_POST => 1,
                                   CURLOPT_POSTFIELDS => array(
                                                               'orderToken' => 'order_gyDz10teLD1xO775fXC9yg',
                                                               )
                                   ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    // Close request to clear up some resources
    curl_close($curl);
    
    
    $json = json_decode($resp, true);
    print_r($json);
    
    ?>

