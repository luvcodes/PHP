<?php ob_start();
session_start();
include("connection.php");
/** @var PDO $dbh */
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['username']) && !empty($_POST['password'])) {
        //Run some SQL query here to find that user
        $stmt = $dbh->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ?");
        if ($stmt->execute([
                $_POST['username'],
                hash('sha256', $_POST['password'])
            ]) && $stmt->rowCount() > 0) {
            $row = $stmt->fetchObject();
            $_SESSION['user_id'] = $row->id;
            //Successfully logged in, redirect user to dashboard
            header("Location: dashboard.php");
        } else {
            echo "<h1>Either username or password is incorrect!</h1>";
        }
} else {
    if (isset($_SESSION['user_id'])) {
        $user_stmt = $dbh->prepare("SELECT * FROM `users` WHERE `id` = ?");
        if ($user_stmt->execute([$_SESSION['user_id']]) && $user_stmt->rowCount() == 1) {
            //User already logged in, redirect user to dashboard
            header("Location: dashboard.php");
        } else {
            echo "<h1>Your account does not exist!</h1>";
            session_destroy();
        }
    } else {
        echo "<h1>Please Login</h1>";
    }
}
?>
<form method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username"/>
    <br>
    <label for="password">Password</label>
    <input type="password" id="password" name="password"/>
    <br>
    <input type="submit" value="Login"/>
</form>
<!--Register button to redirect page-->
<form>
    <input type="submit" formmethod="get" formaction="register.php" value="Register"/>
</form>
