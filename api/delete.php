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
function delete($SID){  //receive input as SID 
    //query code
    $query = "DELETE FROM tbl_students where SID=$SID"; //changed query to delete based on SID
	$stmt=ociparse($GLOBALS['connection'], $query);
	if(!$stmt)
	{
		echo("An error occurred in parsing the SQL string. \n");
		exit;
    }
    ociexecute($stmt);
}
$SID = $_GET['sid'];
delete($SID);

?>