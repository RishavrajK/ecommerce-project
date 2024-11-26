<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My orders</title>
    <link rel="stylesheet" href="styles/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <h3 style="margin-bottom: 20px; color: #333; text-align:center; font-weight:bold;">All User</h3>
    <table>
        <thead>
            <?php

            $get_user_details = "SELECT * from `user_tabel`";
            $result_user = mysqli_query($con, $get_user_details);
            $row_count = mysqli_num_rows($result_user);
            echo "<tr>
                <th>Sl.no</th>
                <th>Username</th>
                <th>user email</th>
                <th>user address</th>
                <th>user mobile</th>
                <th>Delete</th>
                </tr>
        </thead>
            <tbody>";

            if ($row_count == 0) {
                echo "<h2 style='color:red;'>No User</h2>";
            } else {
                $number = 0;
                while ($row_users = mysqli_fetch_assoc($result_user)) {
                    $user_id = $row_users['user_id'];
                    $username = $row_users['username'];
                    $user_email = $row_users['user_email'];
                    $user_address = $row_users['user_address'];
                    $user_mobile = $row_users['user_mobile'];
                    $number++;


                    echo "  <tr>
                <td>$number</td>
                <td>$username</td>
                <td>$user_email</td>
                <td>$user_address</td>
                <td>$user_mobile</td>
                <td><a href='admin_index1.php?delete_user=$user_id' style='color: #333;'><i class='fa-solid fa-trash'></i></a></td>
                ";
                }
            }
            ?>

            </tbody>
    </table>
</body>

</html>