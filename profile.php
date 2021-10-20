<?php include_once 'header.php' ?>

<?php
    if(!isset($_SESSION['loginName'])) {
        header("location: protoMain.php");
    }
?>

<div class="container">

    <?php

echo "<h1>" . $_SESSION['loginName'] . " (Your Profile)</h1>";
echo "<h1>Your ID is " . $_SESSION['id'] . "</h1>";
echo "<h1>Your Reservations</h1>";

?>

    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" />
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
    </div> -->

    <div class="row">
        <?php $mysqli = new mysqli('localhost', 'root', '', 'userlog') or die(mysqli_error($mysqli)); 
        
        $fetch = $mysqli->query("SELECT * FROM properties, reservations WHERE properties.propId=reservations.propId AND reservations.id=" . $_SESSION['id'] . ";") or die($mysqli->error());
        ?>
        <?php while ($reservationRows = $fetch->fetch_assoc()): ?>
        <div class="col-md-4">
            <div class="card mx-auto" style="width: 18rem;">
                <img class="card-img-top" src="img/king.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo "" . $reservationRows['roomType'] . " " . $reservationRows['hotelBuilding'] . " Room"; ?></h5>
                    <p class="card-text">Flavor text</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo "$" . $reservationRows['price']; ?></li>
                    <li class="list-group-item">Amenities</li>
                    <!-- <li class="list-group-item">Rooms Available: <?php echo "" . $reservationRows['availability']; ?></li> -->
                </ul>
                <!--
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Reserve!</button>
                </div>
                -->
            </div>
        </div>
        <?php endwhile; ?>

    </div>

</div>

<?php include_once 'footer.php' ?>