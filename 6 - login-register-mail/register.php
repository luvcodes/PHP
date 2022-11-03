<?php ob_start();
session_start();
include("connection.php");
/** @var PDO $dbh */
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['fullname'])) {
        //Run some SQL query here to find that user
        $stmt = $dbh->prepare("INSERT INTO `users`(`fullname`, `username`, `password`) VALUES (:fullname, :username, SHA2(:password, 0))");
        if ($stmt->execute([
            'fullname' => $_POST['fullname'],
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ])) {
            //Successfully registered, redirect user to login
            header("Location: login.php");
        } else {
            echo "<h1>Cannot register!</h1><div>Error message: " . $stmt->errorInfo()[2] . "</div>";
        }
} else {
    if (isset($_SESSION['user_id'])) {
        $user_stmt = $dbh->prepare("SELECT * FROM `users` WHERE `id` = ?");
        if ($user_stmt->execute([$_SESSION['user_id']]) && $user_stmt->rowCount() == 1) {
            //User already logged in, redirect user to dashboard
            header("Location: dashboard.php");
        } else {
            session_destroy();
            header("Location: login.php");
        }
    }
}
?>

<!--Actually printing contents on the page-->
<h1>Please Register</h1>
<form method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username"/>
    <br>
    <label for="password">Password</label>
    <input type="password" id="password" name="password"/>
    <br>
    <label for="fullname">Full name</label>
    <input type="text" id="fullname" name="fullname"/>
    <br />
    <input type="submit" value="Register"/>
</form>
<!--Login button to redirect to login page-->
<form>
    <input type="submit" formmethod="get" formaction="login.php" value="Login"/>
</form>
