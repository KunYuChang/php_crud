<?php

include_once "connect.php";

if (isset($_POST['submit'])) {
    $place = $_POST['place'];

    $sql = "INSERT INTO selectdata (place) VALUES ('$place')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Data inserted succesfully";
    } else {
        die(mysqli_error($con));
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Option Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <form method="POST">
            <select name="place">
                <option value="CCU">CCU</option>
                <option value="NYUST">NYUST</option>
                <option value="NFU">NFU</option>
                <option value="WFU">WFU</option>
            </select>
            <button class="btn btn-dark" type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>