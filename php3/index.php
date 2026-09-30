<?php include './layout/head.php'; ?>
<h1>PHP Output 3</h1>
    <p>This output connects to the database and allows the user to save records into it.</p>
    <form action="redirect.php" method="POST">
        <h2>Register Person</h2>
        <table>
            
            <tr>
                <td>
                    <label for="fname">First Name</label>
                </td>
                <td>
                    <input type="text" name="fname" id="fname" placeholder="Enter First Name">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="mname">Middle Name</label>
                </td>
                <td>
                    <input type="text" name="mname" id="mname" placeholder="Enter Middle Name">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="lname">Last Name</label>
                </td>
                <td>
                    <input type="text" name="lname" id="lname" placeholder="Enter Last Name">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="age">Age</label>
                </td>
                <td>
                    <input type="number" name="age" id="age" placeholder="Enter Age">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="gender">Gender</label>
                </td>
                <td>
                    <select name="gender" id="gender">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="email">Email</label>
                </td>
                <td>
                    <input type="email" name="email" id="email" placeholder="Enter Email">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="address">Address</label>
                </td>
                <td>
                    <input type="text" name="address" id="address" placeholder="Enter Address">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="contact">Contact Number</label>
                </td>
                <td>
                    <input type="number" name="contact" id="contact" placeholder="Enter Contact Number">
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" name="cancel" value="Cancel">
                </td>
            </tr>
        </table>
    </form>
<?php include './layout/foot.php'; ?>

<?php
require_once 'dbcontroller.php';
$dbhandler = new DBController();

if(isset($_GET["submit"])) {
    $where = array();
    $query = "SELECT * FROM persons WHERE ";

    if($_GET["person_id"]) {$where[] = "person_id LIKE '{$_GET["person_id"]}%'"; }
    if($_GET["person_fname"]) {$where[] = "person_fname LIKE '{$_GET["person_fname"]}%'"; }
    if($_GET["person_mname"]) {$where[] = "person_mname LIKE '{$_GET["person_mname"]}%'"; }
    if($_GET["person_lname"]) {$where[] = "person_lname LIKE '{$_GET["person_lname"]}%'"; }
    if($_GET["person_age"]) {$where[] = "person_age LIKE '{$_GET["person_age"]}%'"; }
    if($_GET["person_gender"]) {$where[] = "person_gender LIKE '{$_GET["person_gender"]}%'"; }
    if($_GET["person_email"]) {$where[] = "person_email LIKE '{$_GET["person_email"]}%'"; }
    if($_GET["person_address"]) {$where[] = "person_address LIKE '{$_GET["person_address"]}%'"; }
    if($_GET["person_contact"]) {$where[] = "person_contact LIKE '{$_GET["person_contact"]}%'"; }

    if(!(count($where) === 0)) {
        $query .= implode(" AND ", $where);
        $query .= " ORDER BY person_lname";
    
        $result = $dbhandler->executeQuery($query);
        $where = array();
    } else {
        $query = "SELECT * FROM persons ORDER BY person_lname";
        $result = $dbhandler->executeQuery($query);
    }
} else {
    $query = "SELECT * FROM persons ORDER BY person_lname";
    $result = $dbhandler->executeQuery($query);
}

?>

    <link href="DataTables/datatables.min.css" rel="stylesheet"/>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
        }

        table {
            border-collapse: collapse;
            margin-block: 20px;
        }

        thead, tbody, th, td {
            border: 1px solid black;
        }

        table input[type="text"], table input[type="submit"], table select{
            width: 100%;
            padding: 5px;
        }

    </style>
</head>
<body>
    <form action="index.php" method="GET">
    <h2>List Registered Person's Information</h2>
    <p>This output connects to the database, retrieves data and allows user to filter and search records.</p>
    <table id="example">
        <thead>
            <tr>
                <th>Person Id</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Action</th>
            </tr>

            
                <tr>
                    <th>
                        <input type="text" name="person_id" value="<?php echo isset($_GET['person_id']) ? $_GET['person_id'] : "";?>">
                    </th>
                    <th>
                        <input type="text" name="person_fname" value="<?php echo isset($_GET['person_fname']) ? $_GET['person_fname'] : "";?>">
                    </th>
                    <th>
                        <input type="text" name="person_mname" value="<?php echo isset($_GET['person_mname']) ? $_GET['person_mname'] : "";?>">
                    </th>
                    <th>
                        <input type="text" name="person_lname" value="<?php echo isset($_GET['person_lname']) ? $_GET['person_lname'] : "";?>">
                    </th>
                    <th>
                        <input type="text" name="person_age" value="<?php echo isset($_GET['person_age']) ? $_GET['person_age'] : "";?>">
                    </th>
                    <th>
                        <select name="person_gender" id="person_gender">
                            <option value="" selected>Select All</option>
                            <option value="Male" <?php echo isset($_GET['person_gender']) ? (($_GET['person_gender']) == "Male" ? "selected" : "") : "";?>>Male</option>
                            <option value="Female" <?php echo isset($_GET['person_gender']) ? (($_GET['person_gender']) == "Female" ? "selected" : "") : "";?>>Female</option>
                        </select>
                    </th>
                    <th>
                        <input type="text" name="person_email" value="<?php echo isset($_GET['person_email']) ? $_GET['person_email'] : "";?>">
                    </th>
                    <th>
                        <input type="text" name="person_address" value="<?php echo isset($_GET['person_address']) ? $_GET['person_address'] : "";?>">
                    </th>
                    <th>
                        <input type="text" name="person_contact" value="<?php echo isset($_GET['person_contact']) ? $_GET['person_contact'] : "";?>">
                    </th>
                    <th>
                        <input type="submit" name="submit" value="Filter">
                    </th>
                </tr>
        </thead>
 
        <tbody>
            

            <?php 
                if($result) {
                    foreach ($result as $key => $value) {
                        echo '
                            <tr>
                                <td>'. $value['person_id'] .'</td>
                                <td>'. $value['person_fname'] .'</td>
                                <td>'. $value['person_mname'] .'</td>
                                <td>'. $value['person_lname'] .'</td>
                                <td>'. $value['person_age'] .'</td>
                                <td>'. $value['person_gender'] .'</td>
                                <td>'. $value['person_email'] .'</td>
                                <td>'. $value['person_address'] .'</td>
                                <td>'. $value['person_contact'] .'</td>
                                <td></td>
                            </tr>
                        ';
                    }
                }
            ?>
        </tbody>
    </table>
    </form>

    <script src="DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
    <script src="DataTables/datatables.min.js"></script>

    <script>
        $(document).ready( () => {
            $('#example').DataTable({
                order: [],
                bFilter: false,
                bSortCellsTop: true,
                pageLength: 25
            });
        });
    </script>
</body>
</html>