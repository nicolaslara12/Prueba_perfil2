<?php
include 'bdperfil2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES ('$nombre', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuarios</title>
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
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
    <script>
        function validateForm() {
            var nombre = document.forms["registro"]["nombre"].value;
            var email = document.forms["registro"]["email"].value;
            var password = document.forms["registro"]["contrasena"].value;
            if (nombre == "" || email == "" || password == "") {
                alert("Todos los campos son obligatorios");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Registro de Usuarios</h2>
    <form name="registro" action="" onsubmit="return validateForm()" method="post">
        Nombre: <input type="text" name="nombre"><br><br>
        Email: <input type="text" name="email"><br><br>
        Contraseña: <input type="contrasena" name="contrasena"><br><br>
        <input type="submit" value="Registrar">
    </form>
    <a href="login.php">Iniciar Sesión</a>
</body>
</html>
