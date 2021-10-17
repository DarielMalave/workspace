<?php

$mysqli = new mysqli('localhost', 'root', '', 'userlog') or die(mysqli_error($mysqli));

if (isset($_POST['register'])) {
    $username = $_POST['enter_username'];
    $email = $_POST['enter_email'];
    $password = $_POST['enter_password'];
    $mysqli->query("INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')") or die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: protoLogin.php");
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = $mysqli->query("SELECT * FROM users WHERE username='$username' AND password='$password'") or die($mysqli->error());
    //pre_r($result);

    if ($result->num_rows == 1) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "It works. Hooray.";
            echo "<br> id: ". $row["id"]. " - Name: ". $row["username"]. " " . $row["email"] . " " . $row["password"] . "<br>";
            session_start();
            $_SESSION['loginName'] = $username;
            header("location: protoMain.php");
            exit();
        }
    } else {
        //echo "Zero results. Try again.";
        header("location: protoLogin.php?status=incorrect");
    }
}

function pre_r( $array ) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>