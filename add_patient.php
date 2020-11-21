<?php include_once('includes/head.php');

	if($_SERVER["REQUEST_METHOD"] == "POST") {

	    if($_POST["firstName"] != "" && $_POST["lastName"] != "") {

	    	$firstName = $_POST["firstName"];
	    	$lastName = $_POST["lastName"];

	    	$sql = "INSERT INTO patients (First_Name, Last_Name) VALUES ('$firstName', '$lastName')";

            // error messasge
            if(!mysqli_query($dbc, $sql)) {
                echo "Something went wrong.<br>";
            }
            
            // success message
            else {
                echo "$firstName $lastName successfully added as a patient.<br>";
            }

	    }

	    else {
	    	echo "All forms are required.";
	    }

	}

?>

<h1>Add A New Patient</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
First Name: <input type="text" id="firstName" name="firstName">
<br><br>
Last Name: <input type="text" id="lastName" name="lastName">
<br><br>

<input type="submit">
</form>

<?php include_once('includes/footer.php');?>