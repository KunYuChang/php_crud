<?php
include 'connect.php';

$id = $_GET['updateid'];

// select query
$sql = "SELECT * FROM user WHERE id = '{$id}'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$fname  = $row['fname'];
$lname  = $row['lname'];
$email  = $row['email'];
$mobile = $row['mobile'];
$datas  = $row['multipleData'];

if (isset($_POST['submit'])) {
    $fname  = $_POST['fname'];
    $lname  = $_POST['lname'];
    $email  = $_POST['email'];
    $mobile = $_POST['mobile'];
    $datas  = $_POST['data'];
    $allData = implode(",", $datas);

    $sql = "UPDATE user
            SET fname='$fname',lname='$lname',email='$email',mobile='$mobile', multipleData='$allData'
            WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "updated succesfully";
        header('location:read.php');
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
    <title>Display data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container my-5">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">First name</label>
                <input type="text" class="form-control" name="fname" value="<?php echo $fname ?>">
            </div>
            <div class=" mb-3">
                <label class="form-label">Last name</label>
                <input type="text" class="form-control" name="lname" value="<?php echo $lname ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control" name="mobile" value="<?php echo $mobile ?>">
            </div>
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
            <button type="submit" class="btn btn-primary my-3" name="submit">Update</button>
        </form>
    </div>
</body>

</html>