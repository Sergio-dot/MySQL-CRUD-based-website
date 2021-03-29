<?php

include('../../config.php');
include('common_functions.php');

if (isset($_POST['login_btn'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) { // if username or password fields have been not filled
        $msg = 'Inserire username e password %s.';
    } else {
        $check = authentication($username);
        if (empty($check)) {
            $location = 'location: index.html';
            $msg = 'Le credenziali inserite non sono valide %s';
        } else {
            $user = $check->fetch_assoc();
            $pwd = $user['password'];

            if (!$user || !(md5($password) == $pwd)) {
                $msg = 'Username e/o password errato/i.';
            } else {
                session_regenerate_id();
                $_SESSION['session_id'] = session_id();

                $role = @$_POST['role'] ?? '';
                if ($role == "amministrativo") {
                    $location = 'location: ../../admin.php';
                    $_SESSION['session_user'] = $user['id_amministrativo'];
                    $_SESSION['session_name'] = $user['username'];
                    $_SESSION['role'] = $role;
                } else if ($role == "servizio") {
                    $location = 'location: ../../servizio.php';
                    $_SESSION['session_user'] = $user['id_servizio'];
                    $_SESSION['session_name'] = $user['username'];
                    $_SESSION['role'] = $role;
                } else if ($role == "culinario") {
                    $location = 'location: ../../culinario.php';
                    $_SESSION['session_user'] = $user['id_culinario'];
                    $_SESSION['session_name'] = $user['username'];
                    $_SESSION['role'] = $role;
                } else if ($role == "fornitore") {
                    $location = 'location: ../../fornitore.php';
                    $_SESSION['session_user'] = $user['id_fornitore'];
                    $_SESSION['session_name'] = $user['username'];
                    $_SESSION['role'] = $role;
                }
                header($location);
                exit;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirect...</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styleLogin.css">
</head>

<body>
    <div class="container text-center">
        <?php printf($msg, '<form action="index.html"><button class="w-10 btn btn-lg btn-primary" type="submit">Back</button></form>'); ?></p>
    </div>
</body>

</html>