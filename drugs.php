<?php
    include_once('includes/head.php');

    // add drug if it isn't already in the database
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["addMed"]) && $_POST["addMed"] != "") {     
            $addMed = $_POST["addMed"];

            $sql = "SELECT * FROM Medications WHERE Name = '$addMed'";

            if(mysqli_num_rows(mysqli_query($dbc, $sql)) == 0) {

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

            else {
                echo "This drug already exists.";
            }
        }
    }

    // print out medications
    $sql = "SELECT * FROM Medications";
    $results = mysqli_query($dbc, $sql);

    while($row = mysqli_fetch_assoc($results)) {
        echo "<li>".$row["Name"]."</li>";
    }


?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    Add Drug: <input type="text" id="addMed" name="addMed">
    <input type="submit">
</form>