<?php

session_start();
require_once('../../config.php');

$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM pegawai WHERE id=$id");

$_SESSION['berhasil'] = 'Data Pegawai berhasil dihapus';
header('Location: pegawai.php');
exit;

include('../layout/footer.php');
