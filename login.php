<?php
include 'bdperfil2.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['contrasena'])) {
            $_SESSION['usuario'] = $row['nombre'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "No se encontró el usuario";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            color: #333;
        }
        form {
            max-width: 300px;
            margin: auto;
        }
        input[type="text"], input[type="contrasena"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form action="" method="post">
        Email: <input type="text" name="email"><br><br>
        Contraseña: <input type="contrasena" name="contrasena"><br><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
