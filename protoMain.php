<?php include_once 'header.php' ?>

<?php
        if (isset($_SESSION['loginName'])) {
            echo "<p>Welcome " . $_SESSION['loginName'] . "! View your profile <a href='profile.php'>here</a>.</p>";
        }

        if (isset($_GET['status'])) {
            echo "<p>Successfully logged out. Thank you for using our service!</p>";
        }

        if (isset($_GET['reserved'])) {
            echo "<p>Room successfully reserved.</p>";
        }

        if (isset($_GET['reserveFail'])) {
            echo "<p>Sorry, there are no more reservations available for that room. Please select another room.</p>";
        }
    ?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/hotel1.jpg" alt="First slide" width=500px height=500px>
            <div class="carousel-caption d-none d-md-block">
                <h5>Welcome to Group 12 Hotel Reservation System!</h5>
                <p>Greetings!</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/hotel2.jpg" alt="Second slide" width=500px height=500px>
            <div class="carousel-caption d-none d-md-block">
                <h5>Welcome to Group 12 Hotel Reservation System!</h5>
                <p>Greetings!</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/hotel3.jpg" alt="Third slide" width=500px height=500px>
            <div class="carousel-caption d-none d-md-block">
                <h5>Welcome to Group 12 Hotel Reservation System!</h5>
                <p>Greetings!</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="img/placeholder.png" width=100% height=100%>
        </div>
        <div class="col-md-6 justify-content-center align-self-center">
            <h2>About Us</h2>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <img src="img/placeholder.png" width=100% height=100%>
        </div>
        <div class="col-md-6 justify-content-center align-self-center">
            <h2>Explore the Ten Hotel Buildings</h2>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mx-auto" style="width: 18rem;">
                <img class="card-img-top" src="img/standard.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Standard Magnolia All Suites Room</h5>
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
                </form>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mx-auto" style="width: 18rem;">
                <img class="card-img-top" src="img/queen.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Queen Magnolia All Suites Room</h5>
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
                    <h5 class="card-title">King Magnolia All Suites Room</h5>
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