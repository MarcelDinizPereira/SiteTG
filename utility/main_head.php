<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <title>Pet e Saúde</title>
    <link rel="stylesheet" type="text/css" href="css/style2.css"/>
</head>


<body>
    <!-- Navbar -->
        <nav class="navbar">
            <img class="logo" src="x.bmp">

        <?php
        if(isset($_SESSION["useruid"])){
            echo "<li>teu cu</li>";
            echo 
            '<a href="includes/logout.inc.php">
                <img class="btn_img" src="icon_client.png">
                <div class="btn_txt">Entrar na conta</div>
            </a>';
            echo '<div class="text">-nomecliente-.</div>';
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