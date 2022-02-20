<?php
include_once 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <form method="POST">
            <input type="text" placeholder="Search data" name="search">
            <button class="btn btn-dark" name="submit">Search</button>
        </form>
        <div class="container my-5">
            <table class="table">
                <?php if (isset($_POST['submit'])) :
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM user 
                            WHERE id='$search' OR 
                                  fname like '%$search%' OR 
                                  lname like '%$search%'";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            echo "
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                </tr>
                            </thead>
                            ";
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                                <tbody>
                                    <tr>
                                        <td>" . $row['id'] . "</td>
                                        <td>" . $row['fname'] . "</td>
                                        <td>" . $row['lname'] . "</td>
                                    </tr>
                                </tbody>
                                ";
                            }
                        } else {
                            echo '<h2 class="text-danger">Data nof found</h2>';
                        }
                    } else {
                        echo '<h2 class="text-danger">Data nof found</h2>';
                    }
                ?>
                <? endif; ?>
            </table>
        </div>
    </div>
</body>

</html>