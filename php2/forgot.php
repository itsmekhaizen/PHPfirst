<?php require './layout/head.php'; ?>

<h1>PHP Output No. 2 (Forgot Password)</h1>
<p>This is the forgot password page.</p>

<fieldset>
    <legend>Forgot Password</legend>

    <form action="" method="POST">
    <table>
        <tr>
            <td>Email</td>
            <td>
                <input type="email" name="email" placeholder="Enter Email" required>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Submit">
                <input type="reset" value="Cancel">
            </td>
        </tr>
    </table>
    </form>
</fieldset>

<br>

<a href="./login.php">Back to Login</a>

<?php require './layout/foot.php'; ?>

