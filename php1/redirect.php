<?php
    
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $req_type = '$_GET';
        $data = $_GET;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $req_type = '$_POST';
        $data = $_POST;
    }

    $fname = htmlspecialchars($data['fname']);
    $mname = htmlspecialchars($data['mname']);
    $lname = htmlspecialchars($data['lname']);
    $age = htmlspecialchars($data['age']);
    $gender = htmlspecialchars($data['gender']);
    $email = htmlspecialchars($data['email']);
    $address = htmlspecialchars($data['address']);
    $contact = htmlspecialchars($data['contact']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Output No. 1</title>
    <style>
        body {
            font-family: "Arial";
        }

        table {
            border-collapse: collapse;
        }

        td {
            padding: 5px;
        }
    </style>
</head>
<body>
    <h2>Data is sent here, and it is store at <?php echo $req_type; ?> variable</h2>
    <table>
        <tr>
            <td width="120">First Name:</td>
            <td style="text-decoration: underline">
                <?php echo $fname; ?>
            </td>
        </tr>
        <tr>
            <td>Middle Name:</td>
            <td style="text-decoration: underline">
                <?php echo $mname; ?>
            </td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td style="text-decoration: underline">
                <?php echo $lname; ?>
            </td>
        </tr>
        <tr>
            <td>Age:</td>
            <td style="text-decoration: underline">
                <?php echo $age; ?>
            </td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td style="text-decoration: underline">
                <?php echo $gender; ?>
            </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td style="text-decoration: underline">
                <?php echo $email; ?>
            </td>
        </tr>
        <tr>
            <td>Address:</td>
            <td style="text-decoration: underline">
                <?php echo $address; ?>
            </td>
        </tr>
        <tr>
            <td>Contact Number:</td>
            <td style="text-decoration: underline">
                <?php echo $contact; ?>
            </td>
        </tr>
    </table>
    <br><br>
    <a href="./">Return to Main Form</a>
</body>
</html>