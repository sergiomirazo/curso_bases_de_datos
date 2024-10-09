<?php
sesion_start();
sesion_destroy();
header('Location: index.php');
exit;
?>
