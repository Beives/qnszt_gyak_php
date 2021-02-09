<?php 
    include('admin_includes/database.php');
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo TITLE;?></title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <div class="wrapper">
            <header>
                <a href="/qnszt_gyak_php/admin" title="Return to home">
                    <img src="../img/banner.png" alt="Banner">
                </a>
            </header>
            <nav>
                <?php include('admin_includes/nav.php');?>
            </nav>
            <article>
