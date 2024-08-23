<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
</head>

<body>
    <h1>Calculadora de IMC</h1>
    <form method="post" action="">
        <label for="peso">Peso (kg):</label>
        <input type="number" id="peso" name="peso" step="0.1" required>
        <br><br>
        <label for="altura">Altura (m):</label>
        <input type="number" id="altura" name="altura" step="0.01" required>
        <br><br>
        <input type="submit" value="Calcular IMC">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os dados do formulário
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];

        // Verifica se os valores são válidos
        if ($peso > 0 && $altura > 0) {
            // Calcula o IMC
            $imc = $peso / ($altura * $altura);

            // Exibe o resultado
            echo "<h2>Seu IMC é: " . number_format($imc, 2) . "</h2>";

            // Classifica o IMC
            if ($imc < 18.5) {
                echo "<p>Classificação: Magreza</p>";
            } else if ($imc >= 18.51 && $imc < 24.9) {
                echo "<p>Classificação: Saúdavel</p>";
            } else if ($imc >= 25.0 && $imc < 29.9) {
                echo "<p>Classificação: Sobrepeso</p>";
            } else if ($imc >= 30.0 && $imc <34.9) {
                echo "<p>Classificação: Obesidade Grau I</p>";
            } else if ($imc >= 35.0 && $imc <39.9) {
                echo "<p> Classificação: Obesidade grau II</p>";
            } else if ($imc >= 40.0) {
                echo "<p> Classificação: Obesidade grau III</p>";
            }
        } else {
            echo "<p>Por favor, insira valores válidos para peso e altura.</p>";
        }
    }
    ?>
</body>

</html>