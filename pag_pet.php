<!-- Navbar e head -->
<?php include "utility/head.php";
include_once "includes/functions.inc.php";
include_once "includes/dbh.inc.php";?>    
            
<?php 
if(isset($_SESSION["useruid"])){
    echo '
    <div class="soft_text">
        <p class="text_centered">
            Bem vindo usuário [' , $_SESSION["useruid"] , ']
        </p>
    </div>';
}else{
    noLoginDetected();
}
?>

<div class="soft_text"> 
    <div class="text_centered">
        <?php showPetInfoName($conn);?> 
    </div>
</div>

<?php showPetInfo($conn);?>

<div class="soft_text">
    <div class="text_centered">Vacinas Recebidas</div>
</div>

<div>
    
</div>

<!-- Footer -->
<?php include "utility/footer.php"; ?>