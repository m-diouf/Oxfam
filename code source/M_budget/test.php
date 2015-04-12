<?php
 require_once("ConnectionBDD.php");
 	$cbdd  = new ConnectionBDD('hr', 'passer', 'localhost/XE');
 	echo "affichage!!!";
 	echo "<table border='1'>\n";

 	$stid = $cbdd -> script_select("select * from employees");
	while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    	echo "<tr>\n";
    	foreach ($row as $item) {
        	echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "</td>\n";
    	}
    	echo "</tr>\n";
	}
	echo "</table>\n";
?>