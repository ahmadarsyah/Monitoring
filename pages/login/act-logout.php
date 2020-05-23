<?php
session_start();
unset($_SESSION['id_user']);
unset($_SESSION['hak_akses']);
session_destroy();
	header("Location:../../index.php");
?>