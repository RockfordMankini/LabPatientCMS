<?php include_once("includes/head.php");

	$id = $_GET["id"];

    if(isset($_POST["medication"])) {
        $med = $_POST["medication"];

        $sql = "SELECT
        m.Name
        FROM patients as p
        left join patient_meds as pm
        on pm.PatientID = p.PatientID
        left join medications as m
        on pm.MedID = m.MedID
        WHERE p.PatientID = $id
        AND m.MedID = '$med'";

        $result = mysqli_query($dbc, $sql);

        if(mysqli_num_rows($result) == 0) {

        	$sql = "INSERT INTO patient_meds (PatientID, MedID)
            VALUES ($id, $med)";

            // error messasge
            if(!mysqli_query($dbc, $sql)) {
                echo "Something went wrong.<br>";
            }
            
            // success message
            else {
                echo "New drug successfully added.<br>";
            }

        }
    }

	$sql = "SELECT First_Name, Last_Name FROM patients WHERE PatientID = $id";
	$access_result = mysqli_query($dbc, $sql);
	$row = mysqli_fetch_assoc($access_result);
	$firstName = $row["First_Name"];
	$lastName = $row["Last_Name"];

	echo "<h2>$firstName $lastName</h2>";

?>

Medications:

<?php
$sql = "SELECT
        m.Name
        FROM patients as p
        left join patient_meds as pm
        on pm.PatientID = p.PatientID
        left join medications as m
        on pm.MedID = m.MedID
        WHERE p.PatientID = $id";

    $access_result = mysqli_query($dbc, $sql);

    $rowNum = mysqli_num_rows($access_result);
    $counter = 1;

    while($row = mysqli_fetch_assoc($access_result)) {

    	$med = $row["Name"];
        if($counter != $rowNum) {
        	echo "$med, ";
        }

        elseif($med == NULL) {

        	echo " None.";

        }

        else {
        	echo "$med.";
        }
        $counter++;

    }
?>
<br><br>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?id='.$id; ?>" method="post">
Add Medication: <select id = "medication" name="medication">

<?php

    $sql = "SELECT * FROM medications";
    $access_result = mysqli_query($dbc, $sql);

    while($row = mysqli_fetch_assoc($access_result)) {
        $medName = $row["Name"];
        $medID = $row["MedID"];
        echo "<option value='$medID'>$medName</option>";
    }

?>
<input type="submit">
</form>

<?php include_once('includes/footer.php');?>