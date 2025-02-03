<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php' );
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<title>Cars</title>
<style>
:root {
    --primary: #222e3f; /* navy */
    --secondary: #4e5251; /* grey */
    --accent: #e3f2fd; /* lightblue */
    --text: #ffffff; /* white */
}

.container {
    margin-top: 20px;
}

.card {
    --bg-card: var(--primary);
    --light: var(--text);
    --bg-linear: linear-gradient(0deg, var(--primary) 50%, var(--accent) 125%);
    --dark: var(--secondary);

    position: relative;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    padding: 1rem;
    width: 18rem; /* Default width */
    background-color: var(--bg-card);
    border-radius: 1rem;
    color: var(--light);
    margin: 10px;
}

.image_container {
    overflow: hidden;
    cursor: pointer;
    position: relative;
    z-index: 5;
    width: 100%;
    height: 12rem; /* Default height */
    border-radius: 0.5rem;
}

.image_container .image {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 100%;
}

.title,
.type {
    overflow: clip;
    width: 100%;
    font-size: 1rem;
    font-weight: 600;
    text-transform: capitalize;
    text-wrap: nowrap;
    text-overflow: ellipsis;
}

.action {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.price {
    font-size: 1.3rem;
    font-weight: 700;
}

.reserve-button {
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.25rem;
    padding: 0.5rem;
    width: 50%; /* Default width */
    background-image: var(--bg-linear);
    font-size: 0.75rem;
    font-weight: 500;
    text-wrap: nowrap;
    border: 2px solid hsla(262, 83%, 58%, 0.5);
    border-radius: 0.5rem;
    box-shadow: inset 0 0 0.25rem 1px var(--light);
}

.reserve-button a {
    text-decoration: none;
    color: white;
}

.input-group{
  width: 50%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding: 20px;
  margin: 10px;
}

.container .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.filter{
  display:flex;
  flex-direction: row;
}

</style>
</head>
<body>
<?php include 'header.php';?>
    </header>
<h1>Cars</h1>
<div class="filter">
<div class="input-group mb-3">
  <label class="input-group-text" for="modelSelect">Models</label>
  <select class="form-select" id="modelSelect" onchange="filterCards()">
    <option selected>Choose...</option>
    <?php
    // Retrieve model options from the database and store them in an array
    include 'config.php';
    $models = [];
    $sql = "SELECT DISTINCT model FROM car WHERE status LIKE 'available'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $models[] = $row["model"];
      }
    }
    $conn->close();
    // Sort the array alphabetically
    sort($models);
    // Generate dropdown options dynamically
    foreach ($models as $model) {
      echo '<option value="' . $model . '">' . $model . '</option>';
    }
    ?>
  </select>
</div>
<div class="input-group mb-3">
  <label class="input-group-text" for="typeSelect">Types</label>
  <select class="form-select" id="typeSelect" onchange="filterCards()">
    <option selected>Choose...</option>
    <?php
    // Retrieve type options from the database and store them in an array
    include 'config.php';
    $types = [];
    $sql = "SELECT DISTINCT type FROM car WHERE status LIKE 'available'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $types[] = $row["type"];
      }
    }
    $conn->close();
    // Sort the array alphabetically
    sort($types);
    // Generate dropdown options dynamically
    foreach ($types as $type) {
      echo '<option value="' . $type . '">' . $type . '</option>';
    }
    ?>
  </select>
</div>
</div>


<div class="container">
  <div class="row">
    <?php
    

    include 'config.php';

    $sql = "SELECT id,model, price, type, image FROM car WHERE status LIKE 'available'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $_SESSION['car_id'] = $row['id'];
      $_SESSION['price']=$row['price'];
      while ($row = $result->fetch_assoc()) {

       


        ?>
        <div class="col-md-4">
          <div class="card">
            <div class="image_container">
              <img src="uploads/<?php echo $row["image"]; ?>" class="image" alt="<?php echo $row["model"]; ?>">
            </div>
            <div class="title">
              <span><?php echo $row["model"]; ?></span>
              <div class="type">
                <span><?php echo $row["type"]; ?></span>
              </div>
            </div>
            <div class="action">
              <div class="price">
                <span><?php echo $row["price"]; ?>$ / Day</span>
              </div>
              <div class="reserve-button">
                <a href="add_reservation.php" name="reserve">Reserve</a>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
    } else {
      echo "0 results";
    }

    $conn->close();
    ?>
  </div>
</div>

<?php include 'footer.php';?>

<script>
function filterCards() {
    var selectedModel = document.getElementById('modelSelect').value.toLowerCase();
    var selectedType = document.getElementById('typeSelect').value.toLowerCase();
    var cards = document.querySelectorAll('.card');

    cards.forEach(function(card) {
        var model = card.querySelector('.title span').textContent.toLowerCase();
        var type = card.querySelector('.type span').textContent.toLowerCase();

        if ((selectedModel === 'choose...' || model === selectedModel) && 
            (selectedType === 'choose...' || type === selectedType)) {
            card.style.display = 'block'; // Display the card
        } else {
            card.style.display = 'none'; // Hide the card
        }
    });
}
</script>
<!-- Include Bootstrap JS and its dependencies below, if needed -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
