<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit</title>
</head>

<body>

    <?php
    include('config.php');

    if (isset($_GET['id'])) {
        $userId = $_GET['id'];
        $query = "SELECT * FROM user WHERE id = $userId";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
        } else {

            echo "User not found!";
            exit();
        }
    } else {

        echo "User ID not provided!";
        exit();
    }

    ?>


    <div class="container mt-4">
        <form  method="POST" action="edit_user.php">
            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required value="<?php echo $user['username']; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $user['email']; ?>" required>
            </div>
           
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="pasword" name="Pass" class="form-control" value="<?php echo $user['password']; ?>" 
                    required>
            </div>

            <div class="mb-3">
                <label for="DOB" class="form-label">DOB</label>
               <input type="date" name="DOB" value="<?php echo $user['DOB']; ?>" >

            </div>
            <div class="mb-3">
                <label for="Gender" class="form-label">Gender</label>
               <input type="text" name="Gender" value="<?php echo $user['gender']; ?>">
               
            </div>
            <div class="mb-3">
                <label for="Phonenum" class="form-label">Phonenumb</label>
               <input type="text" name="Phonenum" value="<?php echo $user['phonenumb']; ?>">
               
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyXxKyjq0L6FhPAtT5h/pvW/dAiS6D/a8M" crossorigin="anonymous"></script>
</body>

</html>