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
function update($updateSID, $SID, $FNAME, $SNAME, $EMAIL){  //receive values as input
    //query code
    $EMAIL = (string) $EMAIL;
    $query = "UPDATE tbl_students SET SID=$SID, FNAME='$FNAME', SNAME='$SNAME', EMAIL='$EMAIL' WHERE SID=$updateSID"; //changed query to insert and provided values
	$stmt=ociparse($GLOBALS['connection'], $query);
	if(!$stmt)
	{
		echo("An error occurred in parsing the SQL string. \n");
		exit;
    }
    ociexecute($stmt);
}

$updateSID = $_GET['updatesid'];
$SID = $_GET['sid'];
$FNAME = $_GET['fname'];
$SNAME = $_GET['sname'];
$EMAIL = $_GET['email'];
update($updateSID, $SID, $FNAME, $SNAME, $EMAIL);

?>