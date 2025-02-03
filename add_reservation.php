<!DOCTYPE html>

<?php
session_start();
$id= $_SESSION['user_id'];

$carid= $_SESSION['car_id'];
$price= $_SESSION['price'];

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Reservation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #e3f2fd; /* Background color */
            color: #000000; /* Text color */
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .container {
            background-color: #ffffff; /* Container background color */
            border-radius: 10px; /* Rounded corners */
            padding: 20px; /* Padding inside container */
            margin: 20px auto; /* Center the container */
            max-width: 600px; /* Limit container width */
        }
        .form-control {
            border-color: #1976d2; /* Form control border color */
        }
        .btn-primary {
            background-color: #1976d2; /* Primary button background color */
            border-color: #1976d2; /* Primary button border color */
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #1565c0; /* Hover background color */
            border-color: #1565c0; /* Hover border color */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Car Rental Reservation</h1>
        <form action="process_reservation.php" method="POST">
            <div class="form-group">
                <label for="startdate">Start Date:</label>
                <input type="date" class="form-control" id="startdate" name="startdate" required>
            </div>
            <div class="form-group">
                <label for="enddate">End Date:</label>
                <input type="date" class="form-control" id="enddate" name="enddate" required>
            </div>
            <div class="form-group">
                <label for="pickuplocation">Pickup Location:</label>
                <input type="text" class="form-control" id="pickuplocation" name="pickuplocation" required>
            </div>
            <div class="form-group">
                <label for="dropofflocation">Drop-off Location:</label>
                <input type="text" class="form-control" id="dropofflocation" name="dropofflocation" required>
            </div>
            <div class="form-group">
                <label for="pickuptime">Pickup Time:</label>
                <input type="time" class="form-control" id="pickuptime" name="pickuptime" required>
            </div>
            <div class="form-group">
                <label for="dropofftime">Drop-off Time:</label>
                <input type="time" class="form-control" id="dropofftime" name="dropofftime" required>
            </div>
            <div class="form-group">
                <label for="UID">UID</label>
                <input type="text" class="form-control" id="UID" name="UID" value="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>" readonly>

            </div>
            <div class="form-group">
    <label for="CID">CID</label>
    <input type="text" class="form-control" id="CID" name="CID" value="<?php echo htmlspecialchars($carid, ENT_QUOTES, 'UTF-8'); ?>" readonly>
</div>
<div class="form-group">
    <label for="PID">Cash on arrival</label>
    <input type="text" class="form-control" id="PID" name="PID" value="<?php echo htmlspecialchars($price, ENT_QUOTES, 'UTF-8'); ?>" readonly>
</div>
            
            <button type="submit" class="btn btn-primary">Submit Reservation</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
