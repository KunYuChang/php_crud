<?php
include 'connect.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <table class="table">
            <thead class="bg-dark text-light">
                <tr>
                    <th scope="col">Sl no</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Mobile</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM user";
                $result = mysqli_query($con, $sql);
                $num = mysqli_num_rows($result);
                // 設定一頁顯示幾筆
                $numberPages = 2;
                // 計算總共有幾頁 (無條件進位)
                $totalPages = ceil($num / $numberPages);
                // 創建分頁按鈕
                for ($btn = 1; $btn <= $totalPages; $btn++) {
                    echo '<a class="btn btn-dark mx-1 mb-3" href="pagination.php?page=' . $btn . '">' . $btn . '</a>';
                }

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $start = ($page - 1) * $numberPages;
                $sql = "SELECT * FROM user LIMIT " . $start . "," . $numberPages;
                $result = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <tr>
                            <th scope='row'>" . $row['id'] . "</th>
                            <td>" . $row['fname'] . "</td>
                            <td>" . $row['lname'] . "</td>
                            <td>" . $row['mobile'] . "</td>
                        </tr>";
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>