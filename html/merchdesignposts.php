<?php
    
    // Get cURL resource
    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
                                   CURLOPT_RETURNTRANSFER => 1,
                                   CURLOPT_URL => 'https://api.scalablepress.com/v2/design',
                                   CURLOPT_USERPWD => ':test_cZDtREd-ZdCqU7S8NsmBFw',
                                   CURLOPT_POST => 1,
                                   CURLOPT_POSTFIELDS => array(
                                                               'type' => 'dtg',
                                                               'sides[front][artwork]' => 'http://soundtrackforspace.org/merchdesigns/tFlowingColorsF02.png',
                                                               'sides[front][dimensions][width]'=>'13',
                                                               'sides[front][position][horizontal]'=>'C',
                                                               'sides[front][position][offset][top]'=>'2.5'
                                                               )
                                   ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    // Close request to clear up some resources
    curl_close($curl);
    

    $json = json_decode($resp, true);
    print_r($json);
  
    ?>



