<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAdmin.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin page</title> 


</head>
<body>


<?php
include("config.php");
$sql = "SELECT COUNT(*) AS total_users FROM user";
$result = $conn->query($sql);
if ($result) {   
    $row = $result->fetch_assoc();
    $totalUsers = $row['total_users'];
   
} 
$conn->close();
?>
<?php
include("config.php");
$sql = "SELECT COUNT(*) AS total_reserv FROM reservation";
$result = $conn->query($sql);
if ($result) {   
    $row = $result->fetch_assoc();
    $totalreserv = $row['total_reserv'];
   
} 
$conn->close();
?>
<?php
include("config.php");
$sql = "SELECT SUM(amount) AS total_amount FROM payment";
$result = $conn->query($sql);
if ($result) {
    $row = $result->fetch_assoc();
    $totalAmount = $row['total_amount'];
}
$conn->close();
?>

    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.jpg" alt="">
            </div>

            <span class="logo_name">Dream Drive</span>
           
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="users.php">
                    <i class="uil uil-users-alt "></i>
                    <span class="link-name">Users</span>
                </a></li>
                <li><a href="reservation.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Reservations</span>
                </a></li>
                <li><a href="cars_view.php">
                    <i class="uil uil-car"></i>
                    <span class="link-name">Cars</span>
                </a></li>
                <li><a href="viewsupp.php">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">support</span>
                </a></li>
               
            </ul>
            
            <ul class="logout-mode">
                <li><a href="logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div>
              <h1>Admin Page</h1>
            </div>
            
            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total Users</span>
                        <span class="number"><?php    echo   $totalUsers; ?></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Total Reservations</span>
                        <span class="number"><?php  echo  $totalreserv; ?></span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Income</span>
                        <span class="number"><?php  echo " $" . $totalAmount; ?></span>
                    </div>
                </div>
            </div>

        </div>
        <h2>Revenue Trends</h2>
        <canvas id="revenueChart" width="400" height="200"></canvas>

    </section>
    
    <canvas id="revenueChart" width="400" height="200"></canvas>

    <script>
        // Sample revenue data
        const revenueData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Revenue',
                data: [1000, 1200, 1500, 1300, 1600, 1400],
                backgroundColor: 'rgba(255, 99, 132, 0.2)', // Change background color
                borderColor: 'rgba(255, 99, 132, 1)', // Change line color
                borderWidth: 2
            }]
        };

        // Get the canvas element
        const ctx = document.getElementById('revenueChart').getContext('2d');

        // Initialize Chart.js
        const revenueChart = new Chart(ctx, {
            type: 'line',
            data: revenueData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: 'rgba(255, 99, 132, 1)' // Change label color
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: 'rgba(255, 99, 132, 1)' // Change label color
                        }
                    }]
                },
                legend: {
                    labels: {
                        fontColor: 'rgba(255, 99, 132, 1)' // Change legend color
                    }
                }
            }
        });
    </script>

    <script>
      const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})
    </script>
</body>
</html>