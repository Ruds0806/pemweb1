<?php

session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../../auth/login.php?pesan=belum_login");
} else if ($_SESSION["role"] != 'admin') {
    header("Location: ../../auth/login.php?pesan=akses_ditolak");
}


$judul = "Profile";
include('../layout/header.php');
require_once('../../config.php');

$id = $_SESSION['id'];
$result = mysqli_query($conn, "SELECT users.id_pegawai, users.username, users.password, users.status, users.role, pegawai.* FROM users JOIN pegawai ON users.id_pegawai = pegawai.id WHERE pegawai.id=$id");
?>

<?php while ($pegawai = mysqli_fetch_array($result)) : ?>

    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <center>
                                <img style="border-radius: 100%; width: 70%"
                                    src="<?= base_url('assets/img/foto_pegawai/' . $pegawai['foto']) ?>"
                                    alt="Foto Pegawai">
                            </center>



                            <table class="table mt-3">
                                <tr>
                                    <td>Nama</td>
                                    <td>: <?= $pegawai['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>: <?= $pegawai['jenis_kelamin'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: <?= $pegawai['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td>No. Handphone</td>
                                    <td>: <?= $pegawai['no_handphone'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td>: <?= $pegawai['jabatan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>: <?= $pegawai['username'] ?></td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>: <?= $pegawai['role'] ?></td>
                                </tr>
                                <tr>
                                    <td>Lokasi Kantor</td>
                                    <td>: <?= $pegawai['lokasi_presensi'] ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>: <?= $pegawai['status'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>

<?php endwhile ?>
<?php include('../layout/footer.php') ?>