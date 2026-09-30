<?php

$data = $data ?? [];
$errors = $errors ?? [];

$isEdit = isset($data['faculty_id']);

if ($isEdit) {
    $formAction = "index.php?action=update&id=" . $data['faculty_id'];
} else {
    $formAction = "index.php?action=store";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>
        <?php echo $isEdit ? 'Edit Faculty' : 'Add Faculty'; ?>
    </title>

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<div class="container">

    <h1>
        <?php echo $isEdit ? 'Edit Faculty' : 'Add Faculty'; ?>
    </h1>

    <?php if (!empty($errors)): ?>

        <div class="error-box">

            <?php foreach ($errors as $error): ?>

                <p><?php echo htmlspecialchars($error); ?></p>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

    <form action="<?php echo $formAction; ?>" method="POST">

        <label>First Name</label>
        <input
            type="text"
            name="first_name"
            value="<?php echo htmlspecialchars($data['first_name'] ?? ''); ?>"
            required
        >

        <label>Middle Name</label>
        <input
            type="text"
            name="middle_name"
            value="<?php echo htmlspecialchars($data['middle_name'] ?? ''); ?>"
            required
        >

        <label>Last Name</label>
        <input
            type="text"
            name="last_name"
            value="<?php echo htmlspecialchars($data['last_name'] ?? ''); ?>"
            required
        >

        <label>Age</label>
        <input
            type="number"
            name="age"
            min="1"
            max="120"
            value="<?php echo htmlspecialchars($data['age'] ?? ''); ?>"
            required
        >

        <label>Gender</label>

        <select name="gender" required>

            <option value="">Select Gender</option>

            <option value="Male"
                <?php echo (($data['gender'] ?? '') == 'Male') ? 'selected' : ''; ?>>
                Male
            </option>

            <option value="Female"
                <?php echo (($data['gender'] ?? '') == 'Female') ? 'selected' : ''; ?>>
                Female
            </option>

            <option value="Other"
                <?php echo (($data['gender'] ?? '') == 'Other') ? 'selected' : ''; ?>>
                Other
            </option>

        </select>

        <label>Address</label>

        <textarea name="address" required><?php echo htmlspecialchars($data['address'] ?? ''); ?></textarea>

        <label>Position</label>

        <input
            type="text"
            name="position"
            value="<?php echo htmlspecialchars($data['position'] ?? ''); ?>"
            required
        >

        <label>Salary</label>

        <input
            type="number"
            name="salary"
            step="0.01"
            min="0"
            value="<?php echo htmlspecialchars($data['salary'] ?? ''); ?>"
            required
        >

        <button type="submit">
            <?php echo $isEdit ? 'Update Faculty' : 'Save Faculty'; ?>
        </button>

        <a href="index.php" class="cancel-btn">
            Cancel
        </a>

    </form>

</div>

</body>
</html>