<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <title>Pet e Saúde</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>


<body>
    <!-- Navbar -->
        <nav class="navbar">
            <img class="logo" src="x.bmp">

        <?php
        if(isset($_SESSION["useruid"]))
        {
            echo 
            '<a href="includes/logout.inc.php">
                <div class="text">Sair</div>
            </a>';
        }
        else
        {
            echo '<div class="text">Bem-Vindo.</div>';
        }
        ?>
        </nav>
    <!-- End of Navbar -->

    <!-- Whitebox -->
    <div class="white_box">