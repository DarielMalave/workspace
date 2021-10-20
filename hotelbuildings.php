<?php include_once 'header.php' ?>

<div class="container">
    <h1>Hotel Buildings</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card mx-auto" style="width: 18rem;">
                <img class="card-img-top" src="img/standard.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">The Magnolia All Suites</h5>
                    <p class="card-text">Flavor text</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Price</li>
                    <li class="list-group-item">Amenities</li>
                    <li class="list-group-item">Rooms Available: x</li>
                </ul>
                <!-- make conditional statement for how the form works when user is not logged
                in and when user is logged in -->
                <form action="protoProcess.php" method="POST">
                    <input type="hidden" value="YMQPF" name="propId">
                    <?php if (isset($_SESSION['loginName'])) {
                        echo "<input type='hidden' value='" . $_SESSION['loginName'] . "' name='loginName'>";
                        echo "<div class='card-body'><button type='submit' class='btn btn-primary' name='reserve'>Reserve!</button></div>";
                    }
                    else {
                        echo "<div class='card-body'><button type='submit' class='btn btn-primary' name='reserveNotLoggedIn'>Reserve!</button></div>";
                    }
                    ?>
                    <!-- <div class="card-body">
                        <button type="submit" class="btn btn-primary" name="reserveNotLoggedIn">Reserve!</button>
                    </div> -->
                </form>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mx-auto" style="width: 18rem;">
                <img class="card-img-top" src="img/queen.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">The Lofts at Town Centre</h5>
                    <p class="card-text">Flavor text</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Price</li>
                    <li class="list-group-item">Amenities</li>
                    <li class="list-group-item">Rooms Available: x</li>
                </ul>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Reserve!</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mx-auto" style="width: 18rem;">
                <img class="card-img-top" src="img/king.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Park North Hotel</h5>
                    <p class="card-text">Flavor text</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Price</li>
                    <li class="list-group-item">Amenities</li>
                    <li class="list-group-item">Rooms Available: x</li>
                </ul>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Reserve!</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php' ?>