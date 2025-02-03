<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add User</title>
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
<header>
        <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Users Mangement System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link active" aria-current="page" href="users.php">View Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add_user_form.php">Add User</a>
                        </li>

   

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <form id="main" method="post" action="add_user.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control"  aria-describedby="emailHelp"
                    required>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="pasword" name="Pass" class="form-control"  aria-describedby="emailHelp"
                    required>
            </div>

            <div class="mb-3">
                <label for="DOB" class="form-label">Date of Birth</label>
               <input type="date" name="DOB" class="form-control" >

            </div>
            <div class="mb-3">
                Gender
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Gender" value="Male" checked class="form-control">
                    <label class="form-check-label" for="Gender">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Gender"value="Female" class="form-control" >
                    <label class="form-check-label" for="Gender">
                        Female
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="Phonenum" class="form-label">Phone Number</label>
               <input type="text" name="Phonenum"class="form-control" >
               
            </div>
            <?php
            if (isset($_GET['success']) && $_GET['success'] == 'true') {
                echo '<p style="color: green;">Record added successfully!</p>';
            }
            ?>

            <button type="submit" class="btn btn-primary">Add User</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
