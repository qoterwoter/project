<?
    session_start();
    session_destroy();
    header('Location: http://project.std-962.ist.mospolytech.ru/links/login.php');
    exit;
?>