<?php include_once 'header.php' ?>

    <?php
        if (isset($_SESSION['loginName'])) {
            echo "<p>Welcome " . $_SESSION['loginName'] . "! View your profile <a href='profile.php'>here</a>.</p>";
        }

        if (isset($_GET['status'])) {
            echo "<p>Successfully logged out. Thank you for using our service!</p>";
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
                    <div class="card-body">
                        <button type="button" class="btn btn-primary">Reserve!</button>
                    </div>
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
                        <button type="button" class="btn btn-primary">Reserve!</button>
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
                        <button type="button" class="btn btn-primary">Reserve!</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

<footer class="page-footer font-small blue pt-4">
    <div class="container-fluid text-center text-md-left">
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3">
                <h5 class="text-uppercase">Footer Content</h5>
                <p>Here you can use rows and columns to organize your footer content.</p>
            </div>

            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-6">
                <h5 class="text-uppercase text-center">Links</h5>
                <ul class="list-unstyled text-center">
                    <li> <a href="#!">Link 1</a> </li>
                    <li> <a href="#!">Link 2</a> </li>
                    <li> <a href="#!">Link 3</a> </li>
                    <li> <a href="#!">Link 4</a> </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
    </div>
</footer>

</html>