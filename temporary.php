echo "
<style>table, th, td {border:1px solid black;}</style>

<table style='width:400px'>
    <tr>
        <th>Seu nome:</th>
        <td>" . $row['usersUid'] . "</td>
    </tr>
    <tr>
        <th>Seu nome de usuario:</th>
        <td>" . $row['userUid'] . "</td>
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
</table>";

echo 

"Seu nome: " . $row['usersName']
            . "<br>Seu nome de usuario: " . $row['usersUid']
            . "<br>Email: " . $row['usersEmail']
            . "<br>Telefone para contato: " . $row['usersPhone']
            . "<br>Localizacao: " . $row['usersLocation']
            . "<br>ID de conta(Fixo): " . $row['usersId']
            . "<hr><br>";