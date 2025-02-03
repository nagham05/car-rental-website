<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view Support</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/
bootstrap.min.css">
<style>
    #back{
        text-decoration-line: none;
    }
</style>
</head>
<body>
    <header><h1>View Messages</h1></header>
<div class="container mt-4">
            <table class="table table-success table-striped">
                <thead>
                    <tr cclass="table-success">
                       
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        
                      
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('config.php');
                    $query = "SELECT * FROM support";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo ("<tr>");
                        echo ("<td>" . $row["name"] . "</td>");
                        echo ("<td>" . $row["email"] . "</td>");
                        echo ("<td>" . $row["message"] . "</td>");
                       
                        echo("<td> <a href='delete_supp.php?id=" . $row["id"] . " ' class=' btn btn-dark delete'>delete</a></td>");
                        echo ("</tr>");
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <a class="btn btn-primary" href="Admin.php" role="button">Back</a>
</body>
</html>