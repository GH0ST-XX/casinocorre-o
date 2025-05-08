<?php
$symbols = ['🍒', '🍋', '🔔', '⭐', '🍇', '💎']; // Define um array com os símbolos que serão usados na máquina caça-níquel
$reels = ["", "", ""]; // Inicializa um array com três posições vazias para armazenar os símbolos sorteados
$message = ""; // Inicializa uma variável para armazenar a mensagem do resultado

if (isset($_POST['spin'])) { // Verifica se o botão "Girar" foi pressionado
    for ($i = 0; $i < 3; $i++) { // Percorre os três rolos da máquina
        $reels[$i] = $symbols[array_rand($symbols)]; // Seleciona aleatoriamente um símbolo do array e o atribui ao rolo correspondente
    }

    if ($reels[0] === $reels[1] && $reels[1] === $reels[2]) { // Verifica se todos os três rolos têm o mesmo símbolo
        $message = "🎉 Você ganhou! 🎉"; // Define a mensagem de vitória se houver três símbolos iguais
    } else {
        $message = "Tente novamente!"; // Define a mensagem de tentativa caso os símbolos sejam diferentes
    }
}
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres para evitar problemas com acentos -->
    <title>Caça Níquel Simples</title> <!-- Define o título da página -->
    <link rel="stylesheet" href="style.css"> <!-- Importa o arquivo de estilos CSS -->
</head>
<body>
    <div class="slot-machine"> <!-- Div para estruturar a máquina caça-níquel -->
        <h1>🎰 Jackpot</h1> <!-- Título chamativo da máquina caça-níquel -->
        <form method="post"> <!-- Cria um formulário para enviar os dados via POST -->
            <div class="reels"> <!-- Div para exibir os três rolos da máquina -->
                <span><?php echo $reels[0]; ?></span> <!-- Exibe o primeiro rolo -->
                <span><?php echo $reels[1]; ?></span> <!-- Exibe o segundo rolo -->
                <span><?php echo $reels[2]; ?></span> <!-- Exibe o terceiro rolo -->
            </div>
            <button type="submit" name="spin">Girar</button> <!-- Botão para girar os rolos -->
        </form>
        <p class="message"><?php echo $message; ?></p> <!-- Exibe a mensagem do resultado -->
    </div>
</body>
</html>
