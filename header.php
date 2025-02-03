<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-ixpDEbT5v6a/Zzg90dRg3w7lL6JxSRjY9QaJ6dDtsABzk4O9E1c6QoJnptVpWyB58wbyLfHbIKv5k7k+n7WVlw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
     .dropdown-menu {
            background-color:lightblue;
            border: 1px dashed #ccc; /* Border color */
            border-radius: 5px; /* Border radius */
            padding: 10px; /* Padding */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow */
        }

        .dropdown-menu li {
            list-style-type: none; 
            margin-bottom: 5px; 
        }

        .dropdown-menu li a {
            color:white;
            text-decoration: none; /* Remove underline */
            transition: color 0.3s; /* Smooth transition */
            text-align: center;
        }

        .dropdown-menu li a:hover {
            color: lightblue; /* Text color on hover */
        }

        .dropdown-menu p {
            margin: 0; /* Remove margin for paragraph */
        }

        .dropdown-menu span {
            font-weight: bold; /* Make span text bold */
        }
        @media (max-width: 768px) {
            .dropdown-menu {
                width: 100%;
                padding: 5px;
            }

            .dropdown-menu li {
                width: 100%;
            }
        }
    
</style>
</head>
<body>
<header>
    <nav class="navbar">
        <span class="hamburger-btn material-symbols-rounded">menu</span>
        <a href="index.php" class="logo">
            <img src="images/logo.jpg" alt="logo">
            <h2>Dream Drive For Renting Cars</h2>
        </a>
        <ul class="links">
            <span class="close-btn material-symbols-rounded">close</span>
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="Support.php">Support</a></li>
           
        </ul>
        <?php
// Check if the user is logged in and if the email key is set in the session
if(isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
    // User is logged in and email key is set, display profile icon with dropdown
    echo '
    <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-user"></i> Profile
    </button>
    <ul class="dropdown-menu">
    <li> <p>Email: <span>' .$_SESSION['email'].'</span> </p> </li>
    <li> <div  class="button">
     <a href="logout.php">Logout</a> </li> <div>
    </ul>
        
    </div>
    ';
} else {
    // User is not logged in, display login button
    echo '
    <a href="login.php" class="button">
        <span class="transition"></span>
        <span class="gradient"></span>
        <span class="label">LogIn</span>
    </a>
    ';
}
?>

    </nav>
</header>
<script>
    const navbarMenu = document.querySelector(".navbar .links");
    const hamburgerBtn = document.querySelector(".hamburger-btn");
    const hideMenuBtn = navbarMenu.querySelector(".close-btn");
    const profileIcon = document.querySelector(".profile-icon");

    // Show mobile menu
    hamburgerBtn.addEventListener("click", () => {
        navbarMenu.classList.toggle("show-menu");
    });

    // Hide mobile menu
    hideMenuBtn.addEventListener("click", () =>  hamburgerBtn.click());

    // Toggle profile dropdown
    profileIcon.addEventListener("click", () => {
        const profileDropdown = document.getElementById("profileDropdown");
        profileDropdown.classList.toggle("show");
    });

    // Close profile dropdown when clicking outside
    window.addEventListener("click", (event) => {
        if (!event.target.matches('.profile-icon') && !event.target.matches('.profile-dropdown')) {
            const profileDropdown = document.getElementById("profileDropdown");
            if (profileDropdown.classList.contains('show')) {
                profileDropdown.classList.remove('show');
            }
        }
    });
</script>

</body>
</html>
