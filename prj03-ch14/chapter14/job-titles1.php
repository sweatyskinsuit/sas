<!DOCTYPE html>
<!--	Author: Hanna Lesky
		Date:	3/17/25
		File:	job-titles1.php
		Purpose:MySQL Exercise
-->

<html>
<head>
	<title>MySQL Query</title>
	<link rel ="stylesheet" type="text/css" href="sample.css">
</head>

<body>

<?php

$server = "localhost";
$user = "wbip";
$pw = "wbip123";
$db = "test";

$connect=mysqli_connect($server, $user, $pw, $db);

if( !$connect) 
{
	die("ERROR: Cannot connect to database $db on server $server 
	using user name $user (".mysqli_connect_errno().
	", ".mysqli_connect_error().")");
}

$id = $_POST['id'];

$userQuery = "SELECT empID, jobTitle, hourlyWage
FROM personnel
WHERE empID = '$id'"; // COMPLETE THE QUERY

$result = mysqli_query($connect, $userQuery);

if (!$result) 
{
	die("Could not successfully run query ($userQuery) from $db: " .	
		mysqli_error($connect) );
}

if (mysqli_num_rows($result) == 0) 
{
	print("No records found with query $userQuery");
}
else 
{ 
	print("<h1>RESULTS</h1>");
	print("<table>");
	print("<tr><th>EMP ID</th><th>Job Title</th>
		 <th>Hourly Wage</th></tr>");
		 
	// ADD CODE HERE
	 while ($row = mysqli_fetch_assoc($result)) {
		print("<tr><td>{$row['empID']}</td>
			   <td>{$row['jobTitle']}</td>
			   <td>{$row['hourlyWage']}</td></tr>");
	}

	print ("</table>");
}

mysqli_close($connect);   // close the connection
 
?>
</body>
</html>
