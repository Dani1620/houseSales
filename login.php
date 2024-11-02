<?php

require './includes/app.php';

$errores = [];

// Autenticar al usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "El email es obligatorio o no es valido";
    }

    if (!$password) {
        $errores[] = "El password es obligatorio";
    }

    if (empty($errores)) {
        $query = " SELECT * FROM usuarios WHERE email = '{$email}'; ";

        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows) {
            // Accediendo a los registros de la consulta del usuario
            $usuario = mysqli_fetch_assoc($resultado);

            // Verificar si el password es correcto o no
            $auth = password_verify($password, $usuario['password']);
            // var_dump($auth);

            if ($auth) {
                // El usuario esta autenticado
                session_start();

                // llenando el arreglo de la sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('Location: ./admin/index.php');
            } else {
                // El password es incorrecto
                $errores[] = "El password es incorrecto";
            }
        } else {
            $errores[] = "El usuario no existe";
        }
    }
}


// Incluyendo el template para el header
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h2>Iniciar Sesion</h2>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error"><?php echo $error; ?></div>
    <?php endforeach; ?>

    <form method="POST" class="formulario contenido-centrado">
        <fieldset>
            <legend>Email y Password</legend>

            <div class="field">
                <label for="mail">E-mail:</label>
                <input type="email" name="email" id="mail" placeholder="Redacte su Email" />
            </div>

            <div class="field">
                <label for="pass">Password:</label>
                <input type="password" name="password" id="pass" placeholder="Escriba su password" />
            </div>
        </fieldset>

        <div class="alinear-derecha">
            <input type="submit" value="Iniciar Sesion" class="boton btn-verde">
        </div>
    </form>

</main>

<?php

incluirTemplate('footer');

?>