<?php include_once 'header.php' ?>

<?php
    if(!isset($_SESSION['loginName'])) {
        header("location: protoMain.php");
    }
?>

<?php

    echo "<h1>" . $_SESSION['loginName'] . "</h1>";
    echo "<h1>Your Reservations</h1>";

?>

<div class="container">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" />
    <div class="card mb-6" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-4">
                <img src="img/queen.jpg" class="card-img" alt="..." width="100%" height="100%">
            </div>
            <div class="col-8">
                <div class="card-body">
                    <h5 class="card-title">Standard</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div>
</div>