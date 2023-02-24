<?php
include('conexao.php');

if (isset($_POST['email']) || isset($_POST['password'])) {



    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);

    $sql_code = "SELECT * FROM tb_user WHERE email = '$email' AND password = '$password'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1) {

        $usuario = $sql_query->fetch_assoc();

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id'] = $username['id'];
        $_SESSION['nome'] = $username['nome'];

        header("Location: painel.php");
    } else {
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page </title>
    <link rel="stylesheet" href="./style.css">

</head>

<body>

    <form name="form" action="" method="POST">
        <div class="form-field">
            <input type="text" name="email" placeholder="Email" />
        </div>

        <div class="form-field">
            <input type="password" name="password" placeholder="Senha" />
        </div>

        <div class="form-field">
            <button class="btn" type="submit">Log in</button>
        </div>
    </form>
    <div class="register">
    <a href="registration.php">Registrar</a>
    </div>
</body>
</html>