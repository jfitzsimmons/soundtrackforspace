<?php
    
    $ch = curl_init("https://api.scalablepress.com/v2/design");
    $fp = fopen("example_homepage.txt", "w");
    
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
    ?>


$resp = wp_remote_post( 'https://api.scalablepress.com/v2/design', $args );
