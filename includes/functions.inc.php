<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat) ){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat){
    $result;

    if ($pwd != $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../main.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES ( ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../main.php?error=stmtfailed");
        exit();
    }
    
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd){
    $result;
    if (empty($username) || empty($pwd) ){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../pag_user.php");
        exit(); 
    }
}

function showPets($conn){
    $data = $_SESSION['userid'];
    // Created template    
    $sql = "SELECT * FROM pet WHERE usersId = ?;";
    // Created prepared statement
    $stmt = mysqli_stmt_init($conn);

    //Preparing the prepared statement
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL statment failed";
    }else{
        //Bind parameter to placeholder
        mysqli_stmt_bind_param($stmt, "i", $data);

        //Running parameters inside DB
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result))
        {
            echo
            "Id do Pet: ". $row['idPet'] .
            " // Nome do Pet: " . $row['nomePet'] .
            "<br>Genero: " . $row['generoPet'] .
            " // Idade: " . $row['idadePet'] . " Anos.// " .
            "<br>Raca: " . $row['racaPet'] .
            "<br>ID do dono: " . $row['usersId'] .
            "<hr><br>";
        }
    }  
}

function showPetInfo($conn){
    $data = $_SESSION['userid'];
    $idPet = $_POST['idPet'];

    // Created template    
    $sql = "SELECT * FROM pet WHERE (usersId = ? AND idPet = ?);";
    // Created prepared statement
    $stmt = mysqli_stmt_init($conn);

    //Preparing the prepared statement
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL statment failed";
    }else{
        //Bind parameter to placeholder
        mysqli_stmt_bind_param($stmt, "ii", $data, $idPet);

        //Running parameters inside DB
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result))
        {
            echo 
            "Nome: " . $row['nomePet'] .
            "<br>Id Pet: " . $row['idPet'] .
            "<br>Genero: " . $row['generoPet'] .
            "<br>Idade: " . $row['idadePet'] . 
            "<br>Raca: " . $row['racaPet'];
        }
    }  
}

function showPetInfoName($conn){
    $data = $_SESSION['userid'];
    $idPet = $_POST['idPet'];

    // Created template    
    $sql = "SELECT * FROM pet WHERE (usersId = ? AND idPet = ?);";
    // Created prepared statement
    $stmt = mysqli_stmt_init($conn);

    //Preparing the prepared statement
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL statment failed";
    }else{
        //Bind parameter to placeholder
        mysqli_stmt_bind_param($stmt, "ii", $data, $idPet);

        //Running parameters inside DB
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result))
        {
            echo 
            "Bem-vindo(a) a pagina do pet: " . $row['nomePet'] . "<br>";
        }
    }  
}

function choosePetFromList($conn){
    $data = $_SESSION['userid'];
    // Created template    
    $sql = "SELECT * FROM pet WHERE usersId = ?;";
    // Created prepared statement
    $stmt = mysqli_stmt_init($conn);

    //Preparing the prepared statement
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL statment failed";
    }else{
        //Bind parameter to placeholder
        mysqli_stmt_bind_param($stmt, "i", $data);

        //Running parameters inside DB
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result))
        {
            echo "
                <option value=" . $row['idPet'] . ">"
                    . $row['nomePet'] . 
                "</option>";
        }
    }  
}

function showUserInfo($conn){
    // template and userId grab
    $data = $_SESSION['userid'];
    $sql = "SELECT * FROM users WHERE usersId = ?;";

    //Prepared statement
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL statment failed";
    }else{
        //Bind parameter to placeholder
        mysqli_stmt_bind_param($stmt, "i", $data);

        //Running parameters inside DB
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result))
        {
            echo "
                <style>table, th, td {border:1px solid black;}</style>

                <table style='width:400px'>
                    <tr>
                        <th>Seu nome:</th>
                        <td>" . $row['usersName'] . "</td>
                    </tr>
                    <tr>
                        <th>Seu nome de usuario:</th>
                        <td>" . $row['usersUid'] . "</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>" . $row['usersEmail'] . "</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>" . $row['usersEmail'] . "</td>
                    </tr>
                    <tr>
                        <th>Telefone para contato:</th>
                        <td>" . $row['usersPhone'] . "</td>
                    </tr>
                    <tr>
                        <th>Localizacao:</th>
                        <td>" . $row['usersLocation'] . "</td>
                    </tr>
                    <tr>
                        <th>ID de conta(Fixo):</th>
                        <td>" . $row['usersId'] . "</td>
                    </tr>
                </table>
            ";
        }
    }
}

function noLoginDetected(){
    echo '
        <script>alert("Opa, voc� n�o est� logado. Acho que voc� n�o deveria estar aqui.") </script>
        <a class="soft_text" href="main.php">
            <div class="text">Clique aqui para retornar ao menu inicial e criar uma conta ou entrar em uma j� existente.</div>
        </a>
        ';

    header("Location: main.php?nologin");
}