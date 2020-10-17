

<?php
//tbl_students
//SID FNAME SNAME EMAIL

$dbuser="edwinj";	//Deakin username
$dbpass="Winbro2@";	//Deakin password  
$db="SSID";         //the Deakin database is by default SSID

$connection=ocilogon($dbuser, $dbpass, $db);
if(!$connection)
{
    echo("An error occurred connecting to the database");
    exit;
}
function read(){
    //query code
    $query="SELECT * FROM tbl_students";
	$stmt=ociparse($GLOBALS['connection'], $query);
	if(!$stmt)
	{
		echo("An error occurred in parsing the SQL string. \n");
		exit;
    }
    ociexecute($stmt);
    //query code ends
    $table=array();
    //fetching code
    while(ocifetch($stmt)){  //fetches a row of data... and the data is in stmt
        $row = array();
        $fg1=ociresult($stmt,"SID");
        $fg2=ociresult($stmt,"FNAME");
        $fg3=ociresult($stmt,"SNAME");
        $fg4=ociresult($stmt,"EMAIL");
        $row=array($fg1,$fg2,$fg3,$fg4);
        array_push($table,$row);
    }
    return $table;
}

$table = read();

//traversing and rendering(plain):
$r=count($table);
$c=count($table[0]);
echo "[";
for($n=0;$n<$r;$n++){
    echo "{";
    for($m=0;$m<$c;$m++){
        if($m%4==0)
            echo "\"sid\" : ". "\"".$table[$n][$m]."\", ";
        else if($m%4==1)
            echo "\"firstname\" : ". "\"".$table[$n][$m]."\", ";
        else if($m%4==2)
            echo "\"surname\" : ". "\"".$table[$n][$m]."\", ";
        else if($m%4==3)
            echo "\"email\" : ". "\"".$table[$n][$m]."\"";
    }
    if($n==$r-1)
        echo "}";
    else
        echo "}, ";
}
echo "]";

?>