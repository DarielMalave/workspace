<?php include_once 'header.php' ?>
<?php require_once 'functions.php' ?>

<?php 
	
	if (!isset($_POST['hotelName'])) {
		header("location: protoMain.php");
	}
	
$db = db_iconnect("userlog");
$hotelName = $_POST['hotelName'];
$fetch = $db->query("SELECT * FROM buildings, properties WHERE buildings.hotelName = properties.hotelBuilding AND buildings.hotelName = '$hotelName'") or die($db->error());
?>

<style>
.datepicker-days table .disabled-date.day {
    background-color: #663399;
    color: #fff;
}

.datepicker table tr td.disabled,
.datepicker table tr td.disabled:hover {
    background: #8447c2;
    color: #fff;
}
</style>

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
                <?php if (isset($_SESSION['loginName'])):?>
                <div class='card-body'>
                    <button type='submit' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'
                        name='reserve'
                        data-whatever="<?php echo "" . $row['hotelName'] . " Room (" . $row['roomType'] . ")"; ?>"
                        data-prop="<?php echo $row['propId']; ?>">Reserve!</button>
                </div>
                <?php else: ?>
                <form action="protoProcess.php" method="POST">
                    <div class='card-body'><button type='submit' class='btn btn-primary'
                            name='reserveNotLoggedIn'>Reserve!</button></div>
                </form>
                <?php endif; ?>

                <input id="startDate">
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
                                <p>Please select how long you would like to reserve this room.</p>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Start date:</label>
                                <input name="startDate" type="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">End date:</label>
                                <input name="endDate" type="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <p><strong>NOTE:</strong> This room will appear in your user profile. You may
                                    cancel the reservation any time.</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="propId" value="0" id="propIdHere">
                            <input type='hidden' value='<?php echo $_SESSION['loginName']; ?>' name='loginName'>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                            <button type="submit" class="btn btn-primary" name="reserve">Reserve</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- type="date" class="form-control" -->

        <!-- Internal JavaScript code for modals to work  -->
        <script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var roomName = button.data('whatever');
            var propId = button.data('prop');
            var modal = $(this);
            modal.find('.modal-title').text('Reserve ' + roomName);
            $("#propIdHere").val(propId);
        })

        var datesForDisable = ["2021-11-14", "2021-11-15", "2021-11-16"]

        $("#startDate").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            weekStart: 1,
            calendarWeeks: true,
            todayHighlight: true,
            datesDisabled: datesForDisable,
        })
        </script>
        <?php endwhile; ?>
    </div>
</div>

<?php include_once 'footer.php' ?>