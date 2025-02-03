<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                            <a class="nav-link active" aria-current="page" href="">View Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add_user_form.php">Add User</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>

    <div class="container mt-4">
    <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search by name...">
    <table class="table table-success table-striped">
        <thead>
            <tr class="table-success">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php
            include('config.php');
            $query = "SELECT * FROM user";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo ("<tr>");
                echo ("<td>" . $row["id"] . "</td>");
                echo ("<td>" . $row["username"] . "</td>");
                echo ("<td>" . $row["email"] . "</td>");
                echo ("<td>" . $row["password"] . "</td>");
                echo ("<td>" . $row["DOB"] . "</td>");
                echo ("<td>" . $row["gender"] . "</td>");
                echo ("<td>" . $row["phonenumb"] . "</td>");
                echo("<td> <a href='edit_user_form.php?id=" . $row["id"] . "' class='btn btn-secondary edit'>Edit</a></td>");
                echo("<td> <a href='delete_user.php?id=" . $row["id"] . " ' class='btn btn-secondary delete'>Delete</a></td>");
                echo ("</tr>");
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        var searchValue = this.value.toLowerCase();
        var rows = document.getElementById('tableBody').getElementsByTagName('tr');
        for (var i = 0; i < rows.length; i++) {
            var name = rows[i].getElementsByTagName('td')[1].innerText.toLowerCase();
            if (name.includes(searchValue)) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    });
</script>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <a class="btn btn-primary" href="Admin.php" role="button">Back</a>
</body>

</html>