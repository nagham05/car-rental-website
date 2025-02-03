<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Add Reservations</title>
<style>
    body {
        background-color: #e3f2fd; /* Background color */
        color: #000000; /* Text color */
    }
    .navbar {
        background-color: #e3f2fd; /* Navbar background color */
    }
    .navbar-brand,
    .nav-link {
        color: #000000; /* Navbar text color */
    }
    .container {
        background-color: #ffffff; /* Container background color */
        border-radius: 10px; /* Rounded corners */
        padding: 20px; /* Padding inside container */
        margin: 20px auto; /* Centering the container */
        max-width: 500px; /* Limiting container width */
    }
    .btn-primary {
        background-color: #1976d2; /* Primary button background color */
        border-color: #1976d2; /* Primary button border color */
    }
    .btn-primary:hover {
        background-color: #1565c0; /* Hover background color */
        border-color: #1565c0; /* Hover border color */
    }
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Reservation Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="reservation.php">View Reservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_res.php">Add a reservation</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <form id="main" method="post" action="process_reservation.php">
            <div class="mb-3">
                <label for="Sdate" class="form-label">Start Date:</label>
               <input type="date" name="Sdate" class="form-control">
            </div>
            <div class="mb-3">
                <label for="Enddate" class="form-label">End Date:</label>
               <input type="date" name="Enddate" class="form-control">
            </div>
            <div class="mb-3">
                <label for="PLocation" class="form-label">Pickup Location:</label>
                <input type="text" name="PLocation" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="DLocation" class="form-label">Drop-off Location:</label>
                <input type="text" name="DLocation" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="PTime" class="form-label">Pickup Time:</label>
                <input type="time" name="PTime" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="DTime" class="form-label">Drop-off Time:</label>
                <input type="time" name="DTime" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="UID" class="form-label">UID:</label>
                <input type="text" name="UID" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="CID" class="form-label">CID:</label>
                <input type="text" name="CID" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="PID" class="form-label">PID:</label>
                <input type="text" name="PID" class="form-control" required>
            </div>

            <?php
            if (isset($_GET['success']) && $_GET['success'] == 'true') {
                echo '<p style="color: green;">Record added successfully!</p>';
            }
            ?>

            <button type="submit" class="btn btn-primary">Add Reservation</button>
        </form>
    </div>
</body>
</html>
