<?php
require_once('operations.php');
require_once('connect.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $image = $_FILES['file'];

    $image_file_name = $image['name'];
    $image_file_error = $image['error'];
    $image_file_temp = $image['tmp_name'];

    // 取得副檔名
    $file_name_separate = explode('.', $image_file_name);
    $file_extension = strtolower(end($file_name_separate));

    // 定義可接受的副檔名
    $extension = ['jpeg', 'jpg', 'png'];

    if (in_array($file_extension, $extension)) {
        $upload_image = 'images/' . $image_file_name;
        // iconv 用來解決中文檔名上傳亂碼問題
        move_uploaded_file($image_file_temp,  iconv("utf-8", "big5", $upload_image));
    }

    $sql = "INSERT INTO registration (name,mobile,image)
            VALUES ('$username','$mobile','$upload_image')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // Alert
        echo '
        <div class="alert alert-success" role="alert">
            <strong>Success</strong> Data inserted successfully
        </div>
        ';
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
    <title>Image upload</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img {
            width: 100px;
        }
    </style>
</head>

<body>
    <div class="text-center my-4">User data</div>
    <div class="container mt-5 d-flex justify-content-center">
        <table class="table table-bordered w-50">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Sl no</th>
                    <th scope="col">Username</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM registration";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $image = $row['image'];
                    echo '
                    <tr>
                        <td>' . $id . '</td>
                        <td>' . $name . '</td>
                        <td><img src=' . $image . '></td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>