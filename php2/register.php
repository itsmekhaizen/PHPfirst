<?php require './layout/head.php'; ?>

<h1>PHP Output No. 2 (Register)</h1>
<p>This output uses require statement in PHP.</p>

<fieldset>
    <legend>Register Account</legend>

    <form action="" method="POST">
    <table>
        <tr>
            <td>First Name</td>
            <td>
                <input type="text" name="fname" placeholder="Enter First Name" required>
            </td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td>
                <input type="text" name="lname" placeholder="Enter Last Name" required>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type="email" name="email" placeholder="Enter Email" required>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password" placeholder="Enter Password" required>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Register">
                <input type="reset" value="Cancel">
            </td>
        </tr>
    </table>
    </form>
</fieldset>

<br>

<a href="./login.php">Already have an account? Login</a>

<?php require './layout/foot.php'; ?>

