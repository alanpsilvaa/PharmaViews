<?php
// Dados para conexão com o banco de dados
$host = 'localhost'; 
$dbname = 'gestao'; 
$username = 'root'; 
$password = ''; 

try {
    // Conexão ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receber os dados enviados pelo formulário
    $codigo_acao = $_POST['tipoAcao']; 
    $investimento = $_POST['investimento']; 
    $data_prevista = $_POST['dataPrevista']; 
    $data_cadastro = date('Y-m-d'); 

    // Inserir os dados na tabela do banco de dados
    $sql = "INSERT INTO acoes (codigo_acao, investimento, data_prevista, data_cadastro) 
            VALUES (:codigo_acao, :investimento, :data_prevista, :data_cadastro)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':codigo_acao', $codigo_acao, PDO::PARAM_INT);
    $stmt->bindParam(':investimento', $investimento, PDO::PARAM_STR);
    $stmt->bindParam(':data_prevista', $data_prevista, PDO::PARAM_STR);
    $stmt->bindParam(':data_cadastro', $data_cadastro, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "Ação adicionada com sucesso!";
    } else {
        echo "Erro ao adicionar a ação.";
    }
}
?>
