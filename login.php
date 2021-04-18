<!-- Navbar e head -->
<?php include "utility/main_head.php"; ?>

<div class="centrao">
    <h2>Log In</h2></br>

    <?php if(isset($_SESSION["useruid"]))
        {
            echo 
            '<a href="includes/logout.inc.php">
                <div class="text">Você já está logado</div>
            </a>';
        }
        else
        {
            echo '<div class="text">Bem-Vindo.</div>';
        }
?>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="uid" placeholder="Nome"></br></br>
        <input type="password" name="pwd" placeholder="Senha"></br></br>
        
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