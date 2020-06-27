<!doctype html>
<html class="no-js" lang="ru" style="font-size: 2vw;">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Музей воздухоплавания.</title>
    <link rel="shortcut icon" href="assets/css/paper_plane_PNG7.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
</head>

<body>
    <? include "inc/header.php" ?>
    <? include "inc/all_planes.php" ?>
    <? include "inc/footer.php" ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script>
        $('p').click(function () {
            $(this).toggleClass("highlight");
        });
    </script>
</html>