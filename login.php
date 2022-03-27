<?php
    include_once('connection.php');

function uidExists($conn, $username, $password)
{
    $query = "SELECT * FROM gebruiker WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($query);
        $stmt->execute(
            array(
                'username' => $username,
                'password' => $password
            )
        );
        $count = $stmt->rowCount();
    if ($count) {
        $_SESSION['username'] = $_POST['username'];
        header("location: index.php");
        exit;
    }
}

function LoggedInUser($conn, $username, $password)
{
    $query = "SELECT * FROM gebruiker WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->execute(
        array(
            'username' => $username,
            'password' => $password
        )
    );
    $uidExists = uidExists($conn, $username, $password);
    $checkPwd = password_verify($password, $_POST['password']);
    if ($checkPwd === false) {
        echo "<h2 class='updatetext'>Invalid username password combination</h2>";
        exit();
    } else if ($checkPwd === true) {
        $_SESSION['username'] = $uidExists['username'];
        $_SESSION['password'] = $uidExists['password'];
        echo "Logged in";
        echo __LINE__;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        .body-container{
            background-color: aliceblue;
            width: 200px;
            margin-top: 100px;
            margin-left: auto;
            margin-right: auto;
            padding-top: 50px;
            padding-left: 300px;
            padding-right: 300px;
            padding-bottom: 50px;
        }
        .form{
            text-align: center;
        }
        .titel{
        }
        .username{
        }
        .password{
        }
        .submit{
        }
        .updatetext {
            text-align: center
        }
        </style>
</head>
<body>
<div class="body-container">
    <form class="form" action="login.php" method="POST">
        <div class="titel"><h1>Netland Admin Panel</h1></div>
        <div class="username"><input type="text" name="username" placeholder="Username"></div><br>
        <div class="password"><input type="password" name="password" placeholder="Password"></div><br>
        <div class="submit"><input type="submit" name="submit" placeholder="Login"></div>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        //username & password required

        if (empty($_POST["username"])) {
            echo "<h2 class='updatetext'>username is required</h2>";
            exit;
        } elseif (empty($_POST["password"])) {
            echo "<h2 class='updatetext'>password is required</h2>";
            exit;
        }

        if (!LoggedInUser($pdo, $username, $password)) {
            echo "fout";
            echo __LINE__;
        };

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            echo "fail";
        } else {
            echo "fail";
            header("location: ../login.php");
        }
    }
    ?>
</div>
</body>
</html>
