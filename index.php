<?php include_once('includes/head.php');?>

<h1>Christopher Pleman and Rockford Mankini Web Project</h1>
<p>This is a website that will manage the information of our lab's patients.</p>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
Medication: <input type="text" name="medication">

<?php
$med = $_POST["medication"];
?>

<input type="submit">
</form>
<br>

<?php

	$sql = "SELECT * FROM patients
	WHERE Medications LIKE '%$med%'";
    $access_result = mysqli_query($dbc, $sql);

    echo "<table>";

    while($row = mysqli_fetch_assoc($access_result)) {
    	$firstName = $row["First_Name"];
    	$lastName = $row["Last_Name"];
    	$medications = $row["Medications"];
    	$allergies = $row["Allergies"];

    	echo "<tr>";
    	echo "
    	<td>$firstName</td>
    	<td>$lastName</td>
    	<td>$medications</td>
    	<td>$allergies</td>
    	</tr>";

    }

?>

</table>