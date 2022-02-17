<?php

// Insert Checkbox Data into MySQL Database using PHP

require_once "connect.php";

if (isset($_POST['submit'])) {
    $allData = implode(',', $_POST['data']);
    echo $allData;

    $sql = "INSERT INTO `skill` (skill) 
            VALUES ('$allData')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "inserted successfully";
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form class="my-5" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="data[]" value="HTML">
                <label class="form-check-label">HTML</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="data[]" value="CSS">
                <label class="form-check-label">CSS</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="data[]" value="JavaScript">
                <label class="form-check-label">JavaScript</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="data[]" value="PHP">
                <label class="form-check-label">PHP</label>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>