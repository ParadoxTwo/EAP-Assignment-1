<?php
    $updatesid = $_GET['updatesid'];
    $sid = $_GET['sid'];
    $fname = $_GET['fname'];
    $sname = $_GET['sname'];
    $email = $_GET['email'];
    //api url for update operation
    $url = "https://personal-sites.deakin.edu.au/~edwinj/780/asssignment1/api/update.php?updatesid=$updatesid&sid=$sid&fname=$fname&sname=$sname&email=$email";
    //initialize curl
    $ch = curl_init();
    //Sets an option on the given cURL session handle.
    curl_setopt($ch, CURLOPT_URL, $url);
    // Set so curl_exec returns the result instead of outputting it.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Get the response and close the channel.
    $response = curl_exec($ch);
    curl_close($ch);
    echo "Row updated... ";
    echo "<a href='index.html'>go back</a>";
?>