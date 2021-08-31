<!-- Navbar e head -->
<?php include "utility/head.php";
include_once "includes/functions.inc.php";
include_once "includes/dbh.inc.php";?>    
            
<?php if(isset($_SESSION["useruid"]))
{
    echo '<div class="soft_text"><p class="text_centered">Bem vindo usuário [' , $_SESSION["useruid"] , ']</p></div>';
} else {
    noLoginDetected();
}
?>

Sua foto de perfil
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit" name="submit_file">Enviar</button>
</form>

<div>
    <?php 
        showUserInfo($conn);
    ?>
    <!--
    Seu nome:<br>
    Email:<br>
    Telefone para contato:<br>
    Localização:<br>
    -->

    <!-- 
        $sql = "SELECT * FROM users;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0)
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                echo $row['usersUid'] . "<br>";
            }
        }
    ?> -->
    <br>
</div>

<div class="soft_text">
    <div class="text_centered">Animais Cadastrados</div>
</div>

<div>
<br>

    <!-- Escolher qual pet ver dados específicos -->
    <form action="pag_pet.php" method="POST">
        <?php showPets($conn); ?> <!-- Lista os animais pertencentes ao dono -->

        <select id="idPet" name="idPet">
            <?php choosePetFromList($conn); ?> <!-- Escolhe pet da lista -->
        </select>
        <button type="submit" name="choosePet">escolher</button><br>
    </form>

    <br>
    <!-- Fazer cadastro de novo pet -->
    <form action="includes/petsign.inc.php" method="POST">
        <input type="text" name="nomePet" placeholder="Nome do Pet"><br>
        <label for="generoPet">Macho ou Fêmea?</label>
            <select id="generoPet" name="generoPet">
                <option value="Macho">Macho</option>
                <option value="Femea">Femea</option>
            </select><br>
        <input type="number" name="idadePet" placeholder="Idade"><br>
        <input type="text" name="racaPet" placeholder="Raca pet"><br>

        <button type="submit" name="submitPet">Cadastrar meu pet</button>
    </form><br><br>

</div>

<!-- Footer -->
<?php include "utility/footer.php"; ?>