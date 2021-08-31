<!-- Navbar e head -->
<?php include "utility/head.php"; ?>

<?php if(isset($_SESSION["useruid"]))
        {
            echo 
            '
            <script>alert("Você já está logado") </script>
            <a href="pag_user.php">
                <div class="text">Você já está logado. Retorne para sua página de usuário clicando aqui.</div>
            </a>
            ';
            header("location: pag_user.php");
        }
?>

    <h2>Cadastro</h2>
    
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="name" placeholder="Nome"></br></br>
        <input type="text" name="email" placeholder="Email"></br></br>
        <input type="text" name="uid" placeholder="Nome de Usuário"></br></br>
        <input type="password" name="pwd" placeholder="Senha"></br></br>
        <input type="password" name="pwd2" placeholder="Repita a senha"></br></br>

        <!-- Small Signup Button -->
        <button type="submit" name="submit" class="scp_button">
            <div class="sm">
                <div class="scp_centered">Cadastrar</div>
            </div>
        </button>
        
        </br>

        <div class="scp_button_exit">
            <a href="main.php">
                Retornar
            </a>
        </div>
    </form>

    <h3>
        <?php 
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "Campos vazios";
                }
                else if ($_GET["error"] == "invaliduid"){
                    echo "Nome de usuário inválido";
                }
                else if ($_GET["error"] == "invalidemail"){
                    echo "Email inválido";
                }
                else if ($_GET["error"] == "passworddontmatch"){
                    echo "Senhas diferentes";
                }
                else if ($_GET["error"] == "usernametaken"){
                    echo "Usuário já em uso";
                }
                else if ($_GET["error"] == "none"){
                    echo "<h2>Cadastrado com sucesso</h2>";
                }
            }
        ?>
    </h3>

<!-- Footer -->
<?php include "utility/footer.php"; ?>