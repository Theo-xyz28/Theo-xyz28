<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1 class="mt-4 mb-4">Daftar Pengguna Web</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                        <tr class="bg-success">
                            <th>ID Pengguna</th>
                            <th class="bg-gray">Nama Pengguna</th>
                            <th>Email</th>
                            <th>Level</th>
                        </tr>
                        <tbody>
                            <?php
                            // Ambil data pengguna yang terdaftar dari tabel user
                            $result = mysqli_query($koneksi, "SELECT * FROM user");

                            // Tampilkan data pengguna dalam bentuk tabel
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['user_id'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['level'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>