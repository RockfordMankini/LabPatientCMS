<?php include_once('includes/head.php');?>

<h1>Christopher Pleman and Rockford Mankini Web Project</h1>
<p>This is a website that will manage the information of our lab's patients.</p>

<?php
    
    // print out the patients and the links to their pages
    $sql = "SELECT * FROM patients";
    $access_result = mysqli_query($dbc, $sql);

    echo "<table>";
    while($row = mysqli_fetch_assoc($access_result)) {
        $firstName = $row["First_Name"];
        $lastName = $row["Last_Name"];
        $id = $row["PatientID"];

        echo "<tr>";
        echo "
        <td><a href=patient.php?id=$id>$firstName $lastName</a></td>
        </tr>";
    }
    echo "</table><br>";
    
?>

<!-- THIS WILL BE USED TO FILTER WHO DOES WHAT DRUGS AT SOME POINT
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
Medication: <select id = "medication" name="medication">
<option value="">None</option>
<?php

    $sql = "SELECT * FROM medications";
    $access_result = mysqli_query($dbc, $sql);

    while($row = mysqli_fetch_assoc($access_result)) {
        $medName = $row["Name"];
        echo "<option value='$medName'>$medName</option>";
    }

?>
<input type="submit">
</form>
-->

<a href="add_patient.php">Add a Patient</a><br>
<a href="drugs.php">Add Drugs</a>