<!DOCTYPE html>
<html>
<head>
    <title>Faculty Management</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<div class="container">

    <h1>Faculty Management</h1>

    <a href="index.php?action=create" class="btn">Add Faculty</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php foreach (($faculty ?? []) as $row): ?>

            <tr>
                <td><?php echo htmlspecialchars($row['faculty_id']); ?></td>
                <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                <td><?php echo htmlspecialchars($row['middle_name']); ?></td>
                <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                <td><?php echo htmlspecialchars($row['age']); ?></td>
                <td><?php echo htmlspecialchars($row['gender']); ?></td>
                <td><?php echo htmlspecialchars($row['address']); ?></td>
                <td><?php echo htmlspecialchars($row['position']); ?></td>
                <td>₱<?php echo number_format($row['salary'], 2); ?></td>

                <td>
                    <a href="index.php?action=edit&id=<?php echo $row['faculty_id']; ?>" class="edit-btn">
                        Edit
                    </a>

                    <a href="index.php?action=delete&id=<?php echo $row['faculty_id']; ?>"
                       class="delete-btn"
                       onclick="return confirm('Are you sure you want to delete this faculty?');">
                        Delete
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>

        </tbody>
    </table>

</div>

</body>
</html>