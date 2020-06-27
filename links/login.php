<!doctype html>
<html class="no-js" lang="ru" style="font-size: 2vw;">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Музей воздухоплавания.</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="shortcut icon" href="../assets/css/paper_plane_PNG7.png" type="image/x-icon">

</head>

<body>
    <? include "../inc/header.php" ?>
    <div class=' animate__animated animate__backInLeft' class='container'>
        <form method='POST'>
            <h2 class='animate__animated animate__bounce animate__repeat-2'>Авторизация</h2>
            <input type='text' name='username' placeholder='Имя пользователя' required>
            <input type='password' name='user_password' placeholder='Пароль' required>

            <button class=' animate__animated animate__rubberBand  animate__repeat-2' type='submit'>Войти</button>
        </form>
    </div>
    <? 
        session_start();

        if (isset($_POST['username']) and isset($_POST['user_password'])) {
            $username = $_POST['username'];
            $password = $_POST['user_password'];

            $connection = mysqli_connect('std-mysql','std_962','12345678','std_962');

            $query = "SELECT * FROM users WHERE user_name = '".$username."'";

            $result = mysqli_query($connection,$query) or die (mysqli_error($connection));

            $count = mysqli_num_rows($result);

            if ($count == 1) {
                $_SESSION['username'] = $username;
            } else {
                $fmsg = 'Ошибка';
            }

            if(isset($_SESSION['username'])) {
                $username = $_SESSION['username'];

                echo 'Hello, '.$username;
                header('Location:admin.php');
                echo '<a href="logout.php">Выйти</a>';
            }


        }
    ?>


<? include "../inc/footer.php" ?>

</body>

</html>
