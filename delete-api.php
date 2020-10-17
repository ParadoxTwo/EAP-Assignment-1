<?php
    $sid = $_GET['sid'];
    //api url for delete operation
    $url = "https://personal-sites.deakin.edu.au/~edwinj/780/assignment1/api/delete.php?sid=$sid";
    //initialize curl
    $ch = curl_init();
    //Sets an option on the given cURL session handle.
    curl_setopt($ch, CURLOPT_URL, $url);
    // Set so curl_exec returns the result instead of outputting it.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Get the response and close the channel.
    $response = curl_exec($ch);
    curl_close($ch);
    echo "Row deleted... ";
    echo "<a href='index.html'>go back</a>";
?>