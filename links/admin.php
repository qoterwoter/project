<!doctype html>
<html class="no-js" lang="ru" style="font-size: 2vw;">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Музей воздухоплавания.</title>
    <link rel="shortcut icon" href="../assets/css/paper_plane_PNG7.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?
        session_start();
        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            
            echo '<h1>Hello, '.$username.'</h1>';
            echo '<a class="logout" href="logout.php">Выйти</a>';
            include '../inc/adminka.php';
            echo '<a class="logout" href="logout.php">Выйти</a>';
        }
    ?>



</body>

</html>