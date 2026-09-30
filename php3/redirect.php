<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "myfirstdb";

$conn = new mysqli($servername, $username, $password, $db);

if($conn->connect_error) {
    die("Connection Failed: ". $conn->connect_error);
}


if(isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $sql = "INSERT INTO persons(person_fname,person_mname,person_lname,person_age,person_gender,person_email,person_address,person_contact) VALUES('$fname', '$mname', '$lname', '$age', '$gender', '$email', '$address', '$contact')";

    if($conn->query($sql) === TRUE) {
        $isSuccess = true;
    } else {
        echo $sql." ".$conn->error;
    }

}

?>

<?php include './layout/head.php'; ?>
    
    <?php if($isSuccess ): ?>
        <h3>Record Successfully Inserted to Database</h3>
    <?php endif; ?>
    
    <a href="./">Back to Main Form</a>
<?php include './layout/foot.php'; ?>