<!DOCTYPE html>
<html>
<head>
    <title>Placar</title>
</head>
<body>
    <h1>Placar</h1>
    
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>Jogador A:</label>
        <input type="string" name="pontuacaoA" value="<?php echo $pontos_a; ?>">
        <br><br>
        <label>Jogador B:</label>
        <input type="string" name="pontuacaoB" value="<?php echo $pontos_b; ?>">
        <br><br>
        <input type="submit" value="Atualizar Placar">
    </form>

    <?php
    function vez_de_sacar($pontuacao) {
        list($pontos_a, $pontos_b) = explode(':', $pontuacao);
        $pontos_a = intval($pontuacao[0]);;
        $pontos_b = intval($pontuacao[1]);;
        if ($pontos_a >= 21 && $pontos_a - $pontos_b >= 2) {
            return "jogador a";
        } elseif ($pontos_b >= 21 && $pontos_b - $pontos_a >= 2) {
            return "jogador b";
        }
    
        // Jogadores trocam a vez de sacar a cada 5 sacadas
        $total_sacadas = $pontos_a + $pontos_b;
        if ($total_sacadas % 10 < 5) {
            return "jogador a";
        } else {
            return "jogador b";
        }

        // Verifica se a pontuação chegou a "20:20"
        if ($pontos_a == 20 && $pontos_b == 20) {
            // Cada jogador saca apenas 2 vezes
            $total_sacadas = $pontos_a + $pontos_b;
            if ($total_sacadas % 4 < 2) {
                return "jogador a";
            } else {
                return "jogador b";
            }
        }    
    }

    // Determina de quem é a vez de sacar
    $vezDeSacar = vez_de_sacar($pontos_a . ':' . $pontos_b);
    ?>

    <h2>Vez de Sacar</h2>
    <p><?php echo $vezDeSacar; ?></p>
</body>
</html>
