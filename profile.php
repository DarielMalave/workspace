<?php include_once 'header.php' ?>
<?php require_once 'functions.php' ?>

<?php
    if(!isset($_SESSION['loginName'])) {
        header("location: protoMain.php");
    }

	if (isset($_GET['deleted'])) {
		echo '<div class="alert alert-danger" role="alert">
  		Room successfully deleted!
		</div>';
	}

	if (isset($_GET['modifyTrue'])) {
		echo '<div class="alert alert-success" role="alert">
  		Room successfully modified!
		</div>';
	}

	if (isset($_GET['wrongrange'])) {
			echo "<p>Range of reservation dates is invalid. Please try again.</p>";
	}
?>

<div class="container">

<?php
echo "<h1>" . $_SESSION['loginName'] . " (Your Profile)</h1>";
echo "<h1>Your ID is " . $_SESSION['id'] . "</h1>";
echo "<h1>Your Reservations</h1>";
?>
    <div class="row">
        <?php 
		$db = db_iconnect("userlog");
        
        $fetch = $db->query("SELECT * FROM properties, reservations WHERE properties.propId=reservations.propId AND reservations.id=" . $_SESSION['id'] . ";") or die($db->error());
        ?>
        <?php while ($reservationRows = $fetch->fetch_assoc()): ?>
        <div class="col-md-4" style="padding-bottom: 50px;">
            <div class="card mx-auto" style="width: 18rem;">
                <img class="card-img-top" src="img/king.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo "" . $reservationRows['hotelBuilding'] . " Room (" . $reservationRows['roomType'] . ")"; ?></h5>
                    <p class="card-text">Flavor text</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Total Cost: <?php echo "$" . $reservationRows['totalCost']; ?></li>
                    <li class="list-group-item">Amenities</li>
					<li class="list-group-item">Reservation Date: <?php echo $reservationRows['startDate']; ?> to <?php echo $reservationRows['endDate']; ?></li>
					<li class="list-group-item">
						<button type='submit' class='btn btn-warning' name='modifyRoom' data-toggle='modal' data-target='#exampleModal' data-whatever="<?php echo "" . $reservationRows['hotelBuilding'] . " Room (" . $reservationRows['roomType'] . ")"; ?>" data-prop="<?php echo $reservationRows['propId']; ?>" data-id="<?php echo $reservationRows['reserveId']; ?>">Modify</button>
					</li>
					<li class="list-group-item">
						<form action="protoProcess.php" method="POST">
							<input type="hidden" name="propId" value="<?php echo $reservationRows['propId']; ?>">
							<input type="hidden" name="userId" value="<?php echo $reservationRows['id']; ?>">
							<button type='submit' class='btn btn-danger' 
							name='delete'>Delete</button>
						</form>
					</li>
                </ul>
            </div>
        </div>
		
		<!-- Modal Content -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
					<form action="protoProcess.php" method="POST">
                    <div class="modal-body">
                            <div class="form-group">
                                <p>Please modify how long you want to reserve this room.</p>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">New start date:</label>
                                <input type="date" class="form-control" name="newStartDate" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">New end date:</label>
                                <input type="date" class="form-control" name="newEndDate" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                            <input type="hidden" name="propId" value="0" id="propIdHere">
                            <input type='hidden' value='<?php echo $_SESSION['id']; ?>' name='loginName'>
							<input type="hidden" name="reserveId" value="0" id="reserveIdHere">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                            <button type="submit" class="btn btn-primary" name="modify">Modify</button>
                    </div>
					</form>
                </div>
            </div>
        </div>
		
		<!-- Internal JavaScript code for modals to work  -->
        <script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var roomName = button.data('whatever');
            var propId = button.data('prop');
			var reserveId = button.data("id");
            var modal = $(this);
            modal.find('.modal-title').text('Modify ' + roomName);
            $("#propIdHere").val(propId);
			$("#reserveIdHere").val(reserveId);
        })
        </script>
		
        <?php endwhile; ?>
    </div>

</div>

<?php include_once 'footer.php' ?>