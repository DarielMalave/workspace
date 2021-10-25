<?php include_once 'header.php' ?>

<?php
    if(!isset($_SESSION['loginName'])) {
        header("location: protoMain.php");
    }
?>

<?php 
$mysqli = new mysqli('localhost', 'root', '', 'userlog') or die(mysqli_error($mysqli));
$hotelName = $_POST['hotelName'];
$fetch = $mysqli->query("SELECT * FROM buildings, properties WHERE buildings.hotelName = properties.hotelBuilding AND buildings.hotelName = '$hotelName'") or die($mysqli->error());

?>

<div class="container">
<h1>Welcome to <?php echo $_POST['hotelName']?></h1>
<h2>Amenities here </h2>
    <div class="row">
        <?php while ($row = $fetch->fetch_assoc()): ?>
        <div class="col-md-4">
            <div class="card mx-auto" style="width: 18rem;">
            <!-- worry about images here -->
                <img class="card-img-top" src="img/standard.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['hotelName']?> Room (<?php echo $row['roomType']?>)</h5>
                    <p class="card-text">Flavor text</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">$<?php echo $row['price']?>/day</li>
                    <li class="list-group-item"><?php echo $row['amenities']?></li>
                    <li class="list-group-item">Rooms Available: <?php echo $row['availability']?></li>
                </ul>
                <form action="protoProcess.php" method="POST">
                    <input type="hidden" value="<?php echo $row['propId']?>" name="propId">
                    <?php if (isset($_SESSION['loginName'])) {
                        echo "<input type='hidden' value='" . $_SESSION['loginName'] . "' name='loginName'>";
                        echo "<div class='card-body'><button type='submit' class='btn btn-primary' name='reserve'>Reserve!</button></div>";
                    }
                    else {
                        echo "<div class='card-body'><button type='submit' class='btn btn-primary' name='reserveNotLoggedIn'>Reserve!</button></div>";
                    }
                    ?>
                </form>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include_once 'footer.php' ?>