<?php

session_start();
require_once('../../config.php');

$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM jabatan WHERE id=$id");

$_SESSION['berhasil'] = 'Data berhasil dihapus';
header('Location: jabatan.php');
exit;

include('../layout/footer.php');
