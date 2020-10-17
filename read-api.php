<html>
    <head>
        <title>Student Table</title>
    </head>
    <body>
        <?php
            echo "<script type=\"text\javascript\">
                    document.body.innerHTML = \"\";
                </script>";
            echo "<table >
                    <tr>
                        <th>SID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                    </tr>
            ";
            
            $url = "https://personal-sites.deakin.edu.au/~edwinj/780/assignment1/api/read.php";
            $ch = curl_init();
            //Sets an option on the given cURL session handle.
            curl_setopt($ch, CURLOPT_URL, $url);
            // Set so curl_exec returns the result instead of outputting it.
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // Get the response and close the channel.
            $response = curl_exec($ch);
            curl_close($ch);
            $table = json_decode($response,true);
            $r=count($table);
            $c=count($table[0]);
            for($n=0;$n<$r;$n++){
                echo "<tr>";
                    echo "<td>".$table[$n]["sid"]."</td>";
                    echo "<td>".$table[$n]["firstname"]."</td>";
                    echo "<td>".$table[$n]["surname"]."</td>";
                    echo "<td>".$table[$n]["email"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<a href='index.html'>go back</a>"
        ?>
    </body>
</html>