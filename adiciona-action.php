<?php

include 'config.php';

$nome= filter_input(INPUT_POST, 'nome');
$email= filter_input(INPUT_POST, 'email');
$tel= filter_input(INPUT_POST, 'tel');
$idade= filter_input(INPUT_POST, 'idade');

$sql= $pdo->prepare("SELECT * FROM users WHERE email=:email");
$sql->bindValue(':email', $email );
$sql->execute();
if($sql->rowCount() ===0){

    if($nome && $email&& $tel && $idade){
    
        $sql= $pdo->prepare("INSERT INTO users (nome, email, tel, idade) VALUES (:nome, :email, :tel, :idade)");
        $sql->bindValue(':nome', $nome );
        $sql->bindValue(':email', $email );
        $sql->bindValue(':tel', $tel );
        $sql->bindValue(':idade', $idade );
        $sql->execute();
    
     header("location: index.php");
     exit;
    
    }else{
        header("location: adicionar.php");
        exit;
    }
}else{
    header("location: adicionar.php");
    exit;
}
<?php

// Conexão com o banco de dados (substitua as informações de acordo com o seu ambiente)

$servername = "localhost";

$username = "seu_usuario";

$password = "sua_senha";

$dbname = "seu_banco_de_dados";

// Parâmetros do formulário

$iduser = $_POST['iduser'];

$number = $_POST['number'];

// Verificação se o número é válido (1 ou 0)

if ($number != '1' && $number != '0') {

    echo "Número inválido. Deve ser 1 ou 0.";

    exit;

}

// Conexão com o banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão

if ($conn->connect_error) {

    die("Falha na conexão com o banco de dados: " . $conn->connect_error);

}

// Verificar se o ID do usuário já existe

$sql = "SELECT * FROM tabela WHERE iduser = $iduser";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // Verificar o número atual

    $row = $result->fetch_assoc();

    $currentNumber = $row['number'];

    if ($currentNumber == 1) {

        // O usuário já tem um registro com número 1, então definir o próximo número como 0

        $number = 0;

    }

    // Atualizar o número existente

    $sql = "UPDATE tabela SET number = $number WHERE iduser = $iduser";

    if ($conn->query($sql) === TRUE) {

        echo "Número atualizado com sucesso.";

    } else {

        echo "Erro ao atualizar número: " . $conn->error;

    }

} else {

    // Inserir um novo registro

    $sql = "INSERT INTO tabela (iduser, number) VALUES ($iduser, $number)";

    if ($conn->query($sql) === TRUE) {

        echo "Registro adicionado com sucesso.";

    } else {

        echo "Erro ao adicionar registro: " . $conn->error;

    }

}

$conn->close();

?>



?>

<?php

// Verificar se o formulário foi submetido

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obter o ID do post e o ID do usuário

    $post_id = $_POST['post_id'];

    $user_id = $_POST['user_id'];

    

    // Obter o tipo de ação (like ou dislike)

    $action = $_POST['action'];

    // Conexão com o banco de dados (substitua as informações de acordo com o seu ambiente)

    $servername = "localhost";

    $username = "seu_usuario";

    $password = "sua_senha";

    $dbname = "seu_banco_de_dados";

    // Conexão com o banco de dados

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão

    if ($conn->connect_error) {

        die("Falha na conexão com o banco de dados: " . $conn->connect_error);

    }

    // Verificar se o usuário já registrou uma ação para esse post

    $sql = "SELECT * FROM likes WHERE post_id = $post_id AND user_id = $user_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        // O usuário já registrou uma ação para esse post, então atualizar a ação

        $sql = "UPDATE likes SET action = '$action' WHERE post_id = $post_id AND user_id = $user_id";

        if ($conn->query($sql) === TRUE) {

            echo "Ação atualizada com sucesso.";

        } else {

            echo "Erro ao atualizar ação: " . $conn->error;

        }

    } else {

        // Inserir uma nova ação para o post

        $sql = "INSERT INTO likes (post_id, user_id, action) VALUES ($post_id, $user_id, '$action')";

        if ($conn->query($sql) === TRUE) {

            echo "Ação registrada com sucesso.";

        } else {

            echo "Erro ao registrar ação: " . $conn->error;

        }

    }

    $conn->close();

}

?>

<!-- Exibir o conteúdo e os botões de "like" e "dislike" -->

<div>

    <!-- Exibir o conteúdo do post -->

    <p>Conteúdo do post...</p>

    <!-- Formulário para o botão de "like" -->

    <form method="POST" action="">

        <input type="hidden" name="post_id" value="1"> <!-- Substitua pelo ID do post atual -->

        <input type="hidden" name="user_id" value="1"> <!-- Substitua pelo ID do usuário atual -->

        <input type="hidden" name="action" value="like">

        <input type="submit" value="Like">

    </form>

    <!-- Formulário para o botão de "dislike" -->

    <form method="POST" action="">

        <input type="hidden" name="post_id" value="1"> <!-- Substitua pelo ID do post atual -->

        <input type="hidden" name="user_id" value="1"> <!-- Substitua pelo ID do usuário


