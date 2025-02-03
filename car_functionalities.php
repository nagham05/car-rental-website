<?php
include 'config.php';
function retrieve()
{
    global $conn;
    $images = [];

    $sql = "SELECT * FROM car";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cars[] = $row;
        }
    }

    return $cars;
}

function getImageById($id)
{
    global $conn;

    $sql = "SELECT * FROM car WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function edit($id, $model, $year, $price, $type, $status, $new_image_name) {
    global $conn;

    // Check if a new image is uploaded
    if (!empty($new_image_name)) {
        // If new image uploaded, update image field
        $sql = "UPDATE car SET model=?, year=?, price=?, type=?, status=?, image=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdsdsi", $model, $year, $price, $type, $status, $new_image_name, $id);
    } else {
        // If no new image uploaded, update other fields except image
        $sql = "UPDATE car SET model=?, year=?, price=?, type=?, status=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdsdi", $model, $year, $price, $type, $status, $id);
    }
    return $stmt->execute();
}



function delete($id) {
    global $conn;
    $sql = "DELETE FROM car WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>