<?php include './layout/head.php'; ?>

<h1>PHP Output No. 2 (Login)</h1>
<p>This is the login page.</p>

<fieldset>
    <legend>Login Account</legend>

    <form action="" method="POST">
    <table>
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
                <input type="submit" value="Login">
                <input type="reset" value="Cancel">
            </td>
        </tr>
    </table>
    </form>
</fieldset>

<br>

<a href="./register.php">Create an account</a>
<br>
<a href="./forgot.php">Forgot Password?</a>

<?php include './layout/foot.php'; ?>

