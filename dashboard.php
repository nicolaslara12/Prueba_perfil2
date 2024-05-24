
<!DOCTYPE html>
<html>
<head>
    <title>Panel de Control</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            color: #333;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Bienvenido, <?php echo $nombre; ?>!</h2>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>


<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("login.php");
    exit();
}

$nombre = $_SESSION['usuario'];
?>


