<?php include_once 'header.php' ?>

<?php
        if (isset($_SESSION['loginName'])) {
            echo "<div class='alert alert-primary' role='alert' style='margin-bottom: 0px;'>
			Welcome " . $_SESSION['loginName'] . "! View your profile <a href='profile.php'>here</a>.
			</div>";
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
                <p>Greetings People!</p>
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

</div>

<?php include_once 'footer.php' ?>