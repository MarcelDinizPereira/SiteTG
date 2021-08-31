<!-- Navbar e head -->
<?php include "utility/head.php"; ?>

<div class="centrao">
    <?php if(isset($_SESSION["useruid"]))
        {
            echo 
            '
            <script>alert("Você já está logado") </script>
            <a href="pag_user.php">
                <div class="text">Você já está logado. Retorne para sua página de usuário clicando aqui.</div>
            </a>';
            header("location: pag_user.php");
        }
        else
        {
            echo '<div class="text"><h2>Entre em sua conta</h2></div>';
        }
    ?>
    <form action="includes/login.inc.php" method="post">
        <br>Nome de usuário ou email:<br>
        <input type="text" name="uid" placeholder="UsuárioExemplo"></br></br>
        Senha:<br>
        <input type="password" name="pwd" placeholder="*****"></br></br>
        
        <!-- Small Signup Button -->
        <button type="submit" name="submit" class="scp_button">
            <div class="sm">
                <div class="scp_centered">Entrar</div>
            </div>
        </button>
        
        </br>
    
        <!-- Small leave button -->
        <div class="scp_button_exit">
            <a href="main.php">
                Retornar
            </a>
        </div>
    </form>


    <h3>
        <?php 
            if(isset($_GET["error"]))
            {
                if($_GET["error"] == "emptyinput"){
                    echo "Campos vazios";
                }
                else if ($_GET["error"] == "wronglogin"){
                    echo "Senha ou usuário inválido";
                }
            }   
        ?>
    </h3>


</div>

<!-- Footer -->
<?php include "utility/footer.php"; ?>