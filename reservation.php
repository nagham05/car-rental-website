<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations and Payments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .views{
            margin: 20px;
            padding: 10px;
        }
        @media (max-width: 768px) {
            .views {
                margin: 10px;
                padding: 5px;
            }
            .table td, .table th {
                padding: .3rem;
            }
        }
    </style>
</head>
<body>
        <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Reservation Mangement System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link active" aria-current="page" href="reservation.php">View Reservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add_res.php">Add a reservation</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <div class="views">
        <h2>Reservation View</h2>
            <div class="container mt-4 table-responsive">
                    <table class="table table-primary table-striped">
                        <thead>
                            <tr class="table-primary">
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Pick Up Location</th>
                                <th>Dropoff Location</th>
                                <th>Pickup Time</th>
                                <th>Dropoff Time</th>
                                <th>UID</th>
                                <th>CID</th>
                                <th>PID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('config.php');
                            $query = "SELECT * FROM reservation";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo ("<tr>");
                                echo ("<td>" . $row["startdate"] . "</td>");
                                echo ("<td>" . $row["enddate"] . "</td>");
                                echo ("<td>" . $row["pickuplocation"] . "</td>");
                                echo ("<td>" . $row["dropofflocation"] . "</td>");
                                echo ("<td>" . $row["pickuptime"] . "</td>");
                                echo ("<td>" . $row["dropofftime"] . "</td>");
                                echo ("<td>" . $row["UID"] . "</td>");
                                echo ("<td>" . $row["CID"] . "</td>");
                                echo ("<td>" . $row["PID"] . "</td>");
                                
                                echo("<td> <a href='deleteRes.php?id=" . $row["id"] . " ' class=' btn btn-dark delete'>delete</a></td>");
                                echo ("</tr>");
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
        </div>
<div class="views">
    <h2>Payment view</h2>
        <div class="container mt-4 table-responsive">
            <table class="table table-primary table-striped">
                <thead>
                    <tr class="table-primary">
                        <th>Id</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>Card Number</th>
                        <th>CVV</th>
                        <th>Cardholder name</th>
                        <th>Expiry Date</th>
                        <th>Payment Date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('config.php');
                    $query = "SELECT * FROM payment";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo ("<tr>");
                        echo ("<td>" . $row["id"] . "</td>");
                        echo ("<td>" . $row["paymentmethod"] . "</td>");
                        echo ("<td>" . $row["amount"] . "</td>");
                        echo ("<td>" . $row["Cardnumb"] . "</td>");
                        echo ("<td>" . $row["CVV"] . "</td>");
                        echo ("<td>" . $row["Cardholdername"] . "</td>");
                        echo ("<td>" . $row["expirydate"] . "</td>");
                        echo ("<td>" . $row["paymentdate"] . "</td>");
                       
                        
                        echo("<td> <a href='deleteRes.php?id=" . $row["id"] . " ' class=' btn btn-dark delete'>delete</a></td>");
                        echo ("</tr>");
                    }
                    ?>
                </tbody>
            </table>
        </div>

</div>
    <a class="btn btn-primary" href="Admin.php" role="button">Back</a>
</body>
</html>
