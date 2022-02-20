<?php
include_once 'connect.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $datas = $_POST['data'];
    $allData = implode(',', $datas);
    $gender = $_POST['gender'];

    // insert query
    $sql = "INSERT INTO user (fname, lname, email, mobile, multipleData, gender)
            VALUES ('$fname', '$lname', '$email', '$mobile', '$allData', '$gender')";

    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo 'Data inserted successfully';
        header('location: read.php');
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
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container my-5">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="mb-3">
                <label class="form-label">First name</label>
                <input type="text" class="form-control" placeholder="Enter your first name" name="fname" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Last name</label>
                <input type="text" class="form-control" placeholder="Enter your last name" name="lname" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control" placeholder="Enter your mobile" name="mobile" autocomplete="off">
            </div>
            <!-- skill -->
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
            <!-- gender -->
            <div>
                Gender:
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female
            </div>
            <button type="submit" class="btn btn-primary my-3" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>