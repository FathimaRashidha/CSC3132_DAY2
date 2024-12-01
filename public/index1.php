<?php

require_once 'dbconf.php';

function PrintTable(tableName,$connect)
{

try {

	//Query
	$sql = "SELECT * FROM $tableName";

	//excute the quey
	$result = mysqli_query($connect,$sql);
	//check if data exists in the table
	if (mysqli_num_rows($result)>0) {
		// fetch the data from rows
		echo "<table border='1'>";
		$col = mysqli_fetch_fields($result);
		//print the colums
		echo "<tr>";
		foreach ($col as $value) {
			//return an object
			//print_r($value);
			echo "<td>$value->name</td>";
		}
		echo "</tr>";
		
		while ($row = mysqli_fetch_assoc($result)) {
			//print the data in a table format
			echo "<tr>";
			foreach ($row as $key => $value) {
				echo "<td>$value</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "No results";
	}
	
} catch (Exception $e) {
	die($e->getMessage());
}
}


PrintTable("student",$connect);
