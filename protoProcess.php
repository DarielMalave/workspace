<?php

$mysqli = new mysqli('localhost', 'root', '', 'userlog') or die(mysqli_error($mysqli));

//$username = "hi";

// ========================================================================
// need to update conditional to not allow duplicate records in database
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

    if ($result->num_rows == 1) {
        while($row = $result->fetch_assoc()) {
            //echo "It works. Hooray.";
            //echo "<br> id: ". $row["id"]. " - Name: ". $row["username"]. " " . $row["email"] . " " . $row["password"] . "<br>";
            session_start();
            $_SESSION['loginName'] = $username;
            // email variable in session?
            header("location: protoMain.php");
            exit();
        }
    } else {
        //echo "Zero results. Try again.";
        header("location: protoLogin.php?status=incorrect");
    }
}

// Make sure reserve button only works if user is logged in and session exists
// $result statement should be fine since there can't be any duplicate usernames
if (isset($_POST['reserve'])) {
    // grab propId and username to be used in following queries
    $propId = $_POST['propId'];
    $username = $_POST['loginName'];
    
    // get unique ID from user logged in using username
    $fetchId = $mysqli->query("SELECT id FROM users WHERE username='$username'") or die($mysqli->error());
    $rowForId = $fetchId->fetch_assoc();

    // get price from properties
    $fetchPrice = $mysqli->query("SELECT price, availability FROM properties WHERE propId='$propId'") or die($mysqli->error());
    $rowForPrice = $fetchPrice->fetch_assoc();

    //pre_r($rowForId);
    //pre_r($rowForPrice);

    $userId = $rowForId['id'];
    $price = $rowForPrice['price'];
    $availability = $rowForPrice['availability'];

    //echo "$availability";
    // if statement to handle what to do if availability is 0
    if ($availability == 0) {
        header("location: protoMain.php?reserveFail");
    }
    else {
        // query to insert new reservation in reservation table
        $mysqli->query("INSERT INTO reservations (id, propId, totalCost) VALUES('$propId', '$userId', '$price')") or die($mysqli->error);

        // query to decrement availability number from property reserved
        $availability --;
        $mysqli->query("UPDATE properties SET availability=$availability WHERE propId='$propId'") or die($mysqli->error);

        header("location: protoMain.php?reserved=true");
    }
}

function pre_r( $array ) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>