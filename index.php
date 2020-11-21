<?php include_once('includes/head.php');?>

<h1 class="display-4">Patients</h1>

<?php
    
    // print out the patients and the links to their pages
    $sql = "SELECT * FROM patients";
    $access_result = mysqli_query($dbc, $sql);

    echo "<ul>";

    while($row = mysqli_fetch_assoc($access_result)) {
        $firstName = $row["First_Name"];
        $lastName = $row["Last_Name"];
        $id = $row["PatientID"];

        echo "<li><a href=patient.php?id=$id>$firstName $lastName</a></li>";
    }
    
    echo "</ul>";

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

<?php include_once('includes/footer.php');?>