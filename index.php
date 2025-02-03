<!DOCTYPE html>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home </title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">

</head>
<body>
<?php include 'header.php'; ?>

    <div class="background-container">
        <div class="conetnt">
            <h1>Explore Our Fleet and Hit the Road in Style!</h1>
            <p>"Embark on Your Next Adventure with Ease! 
            Discover a Wide Selection of Quality Vehicles <br>
            Tailored to Your Journey. 
             Find the Perfect Ride for Every Occasion and Unleash Your Wanderlust Today!"</p>
            <a style="--clr: #7808d0" class="explore-btn" href="search.php">
                        <span class="button__icon-wrapper">
                            <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 15">
                                <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>
                            </svg>
                            
                            <svg class="button__icon-svg  button__icon-svg--copy" xmlns="http://www.w3.org/2000/svg" width="10" fill="none" viewBox="0 0 14 15">
                                <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>
                            </svg>
                        </span>
                        Explore Now
            </a>
        </div>        
    </div> 
<?php include 'footer.php';?>
    <script>const navbarMenu = document.querySelector(".navbar .links");
        const hamburgerBtn = document.querySelector(".hamburger-btn");
        const hideMenuBtn = navbarMenu.querySelector(".close-btn");
       
        // Show mobile menu
        hamburgerBtn.addEventListener("click", () => {
            navbarMenu.classList.toggle("show-menu");
        });
        
        // Hide mobile menu
        hideMenuBtn.addEventListener("click", () =>  hamburgerBtn.click());
      </script>
</body>
</html>