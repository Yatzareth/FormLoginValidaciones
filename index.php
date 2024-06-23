<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['user']);
    $password = trim($_POST['password']);
    $edad = trim($_POST['edad']);

    function validar_edad($edad) {
        return is_numeric($edad) && $edad >= 18;
    }

    function validar_credenciales($user, $password) {
        $usuarios_validos = [
            "Luis" => "Mendoza"
        ];
        return isset($usuarios_validos[$user]) && $usuarios_validos[$user] == $password;
    }

    if (empty($user) || empty($password) || empty($edad)) {
        echo "Todos los campos son obligatorios.";
    } elseif (!validar_edad($edad)) {
        echo "Debes ser mayor de 18 años.";
    } elseif (!validar_credenciales($user, $password)) {
        echo "Usuario o contraseña incorrectos.";
    } else {
        echo "Inicio de sesión exitoso. ¡Bienvenido, $user!";
    }
}
?>
