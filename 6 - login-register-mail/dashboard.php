<?php session_start();
include("connection.php");
/** @var PDO $dbh */ ?>
<?php
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    echo "<h1>You are logged out successfully. </h1>";
    echo "<a href='login.php'>Click here to login</a>";
} else {
    if (isset($_SESSION['user_id'])) {
        $user_stmt = $dbh->prepare("SELECT * FROM `users` WHERE `id` = ?");
        if ($user_stmt->execute([$_SESSION['user_id']]) && $user_stmt->rowCount() == 1) {
            $user = $user_stmt->fetchObject();
            echo "<h1>" . $user->fullname . ", you're already logged in!</h1>";
            echo "<a href='?action=logout'>Click here to logout</a>";
        } else {
            echo "<h1>Your account does not exist!</h1>";
            session_destroy();
        }
    } else {
        echo "<h1>Please Login or Register first!</h1>";
        echo "<a href='login.php'>Click here to login</a>";
    }
}
?>
