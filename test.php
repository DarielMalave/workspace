<?php
require_once 'functions.php';

// expand algorithm to include dates between ranges instead of the start dates and end dates alone
// expand algorithm to handle if user picks a date that conflicts with current reservations

$db = db_iconnect("userlog");
$fetch = $db->query("SELECT startDate, endDate FROM reservations") or die($db->error());
$allReservedDates = array();
while ($row = $fetch->fetch_assoc()) {
    $date1 = new DateTime($row['startDate']);
    $date2 = new DateTime($row['endDate']);
    $result = $date1->diff($date2);

    // if range of dates is longer than one day, we need to add the dates between the ranges for
    // calendar to be accurate
    if ( $result->d > 1) {
        // logic
        for ($i = $date1; $i <= $date2; $i->modify('+1 day')){
            $day = $i->format("Y-m-d");
            $allReservedDates[] = $day;
        }
    }
    else {
        $allReservedDates[] = $row['startDate'];
        $allReservedDates[] = $row['endDate'];
    }
    
}

echo "<pre>";
print_r($allReservedDates);
echo "</pre>";
// $date1 = new DateTime("2021-11-22");
// $date2 = new DateTime("2021-11-25");
// $interval = $date1->diff($date2);
// echo $interval->d;

?>

<!DOCTYPE html>
<html>
<head>
<title>date</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card">
                    <div class="card-header bg-info  text-center">
                        <h4><b class="text-white">Date Picker</b></h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Date:</label>
                                        <input type="text"  name="date" class="datepicker form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-success btn-sm" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        //var disableDates = ["2021-11-15", "2021-11-16", "2021-11-17","2021-11-18"];

        <?php 
        $js_array = json_encode($allReservedDates);
        echo "var datesForDisable = ". $js_array . ";\n";
        ?>

        //var datesForDisable = ["2021-11-14", "2021-11-15","2021-11-16", "2021-11-13"];
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            weekStart: 1,
            todayHighlight: true,
            autoclose: true,
            datesDisabled: datesForDisable,
        });
    </script>
</body>
</html>