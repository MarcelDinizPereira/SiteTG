<!-- Navbar e head -->
<?php include "utility/main_head.php"; ?>

<div class="centrao">
    <h2>Log In</h2></br>

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
</div>

<audio controls loop>
        <source src="contents/music/gwyn_theme.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

<!-- Footer -->
<?php include "utility/footer.php"; ?>