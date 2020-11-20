<?php
include_once("includes/head.php");

$id = $_GET["id"];

$sql = "
	SELECT * FROM patients
	WHERE ID = $id";

    $access_result = mysqli_query($dbc, $sql);

    while($row = mysqli_fetch_assoc($access_result)) {

        $firstName = $row["First_Name"];
        $lastName = $row["Last_Name"];
        $medications = $row["Medications"];
        $allergies = $row["Allergies"];
        $id = $row["ID"];

        echo "<h1>$firstName $lastName</h1>";
        echo "Medications: $medications<br>";
        echo "Allergies: $allergies";

    }
?>