<?php include_once('includes/head.php');?>

<h1>Christopher Pleman and Rockford Mankini Web Project</h1>
<p>This is a website that will manage the information of our lab's patients.</p>

<?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST["addMed"])) {     
            $addMed = $_POST["addMed"];

            $sql = "INSERT INTO Medications (Name)
            VALUES ('$addMed')";

            // error messasge
            if(!mysqli_query($dbc, $sql)) {
                echo "Something went wrong.<br>";
            }
            
            // success message
            else {
                echo "$addMed successfully added.<br>";
            }
        }

    }

    if(isset($_POST["medication"])) {
        $med = $_POST["medication"];
    }
    else {
        $med = "";
    }

        $sql = "SELECT * FROM patients
        WHERE Medications LIKE '%$med%'";
        $access_result = mysqli_query($dbc, $sql);

        echo "<table>";

        while($row = mysqli_fetch_assoc($access_result)) {
            $firstName = $row["First_Name"];
            $lastName = $row["Last_Name"];
            $medications = $row["Medications"];
            $allergies = $row["Allergies"];
            $id = $row["ID"];

            echo "<tr>";
            echo "
            <td><a href=patient.php?id=$id>$firstName $lastName</a></td>
            <td>$medications</td>
            <td>$allergies</td>
            </tr>";
        }

        echo "</table><br>";


?>

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

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    Add Drug: <input type="text" id="addMed" name="addMed">
    <input type="submit">
</form>