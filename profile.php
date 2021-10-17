<?php include_once 'header.php' ?>

<?php
    if(!isset($_SESSION['loginName'])) {
        header("location: protoMain.php");
    }
?>

<?php

    echo "hello";
    echo "<h1>" . $_SESSION['loginName'] . "</h1>";
    echo "<h1>Your Reservations</h1>";

?>

<div class="container">
<div class="row">

  <div class="col-md-4">
      <div class="mx-auto" style="width: 16rem;">
        <img class="card-img-top" src="img/queen.jpg" alt="Card image cap">
      </div>
  </div>

  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Queen Magnolia All Suites Room</h5>
        <p class="card-text">Flavor text</p>
        <a href="#" class="btn btn-primary">Modify</a>
      </div>
    </div>
  </div>

</div>
</div>