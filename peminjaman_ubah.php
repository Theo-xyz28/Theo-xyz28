<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Tambah Kategori</title>
</head>

<body>
    <h1 class="mt-4">Peminjaman Buku</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post">
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            if (isset($_POST['submit'])) {
                                $buku_id = $_POST['buku_id'];
                                $user_id = $_SESSION['user']['user_id'];
                                $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                                $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                                $status_peminjaman = $_POST['status_peminjaman'];

                                $query = mysqli_query($koneksi, "UPDATE peminjaman SET buku_id='$buku_id', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', status_peminjaman='$status_peminjaman' WHERE peminjaman_id='$id'");

                                if ($query) {
                                    echo '<script>alert("Ubah data ulasan berhasil.");</script>';
                                } else {
                                    echo '<script>alert("Ubah data ulasan gagal.");</script>';
                                }
                            }
                        }
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE peminjaman_id = '$id'");
                        $data = mysqli_fetch_array($query);
                        ?>
                        <div class="row mb-3">
                            <div class="col-md-2">Buku</div>
                            <div class="col-md-8">
                                <select name="buku_id" class="form-control">
                                    <?php
                                    $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                                    while ($buku = mysqli_fetch_array($buk)) {
                                        ?>
                                        <option value="<?php echo $buku['buku_id']; ?>">
                                            <?php echo $buku['judul']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Tanggal Peminjaman</div>
                            <div class="col-md-8">
                                <input type="date" class="form-control"
                                    value="<?php echo $data['tanggal_peminjaman'] ?>" name="tanggal_peminjaman">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Tanggal Pengembalian</div>
                            <div class="col-md-8">
                                <input type="date" class="form-control"
                                    value="<?php echo $data['tanggal_pengembalian'] ?>" name="tanggal_pengembalian">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Status Peminjaman</div>
                            <div class="col-md-8">
                                <select name="status_peminjaman" class="form-control">
                                    <option value="dipinjam">Dipinjam</option>
                                    <option value="dikembalikan">Dikembalikan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">

                                <button type="submit" class="btn btn-primary" name="submit"
                                    value="submit">Simpan</button>
                                <button type="reset" class="btn btn-secondary" name="submit"
                                    value="submit">Reset</button>
                                <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>