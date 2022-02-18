<?php

include_once "connect.php";
if (isset($_POST['submit'])) {
    $gender = $_POST['gender'];
    $sql = "INSERT INTO radiodata (gender) VALUES ('$gender')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "Data of Radio buttons inserted successfully";
    } else {
        die(mysqli_error($con));
    }
}

// MySQL ENUM
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Button Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <form method="POST">
            <!-- Name的名稱必須相同 -->
            <div>
                <input type="radio" name="gender" value="male">Male
            </div>
            <div>
                <input type="radio" name="gender" value="female">Female
            </div>
            <button type="submit" name="submit" class="btn btn-dark my-5">Submit</button>
        </form>
    </div>
</body>

</html>