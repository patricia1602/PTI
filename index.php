<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            max-width: 600px;
            margin: auto;
        }
        h1, h2 {
            text-align: center;
        }
        form {
            background-color: #ADD8E6;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px #0000001a;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #000ff0;
            color: white;
            border: none;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <h1>Calcule seu IMC</h1>
    <form method="post" action="">
        <label for="peso">Peso (kg):</label>
        <input type="text" id="peso" name="peso" placeholder="Digite o seu peso" required>
        
        <label for="altura">Altura (m):</label>
        <input type="text" id="altura" name="altura" placeholder="Digite a sua altura" required>
        
        <button type="submit">Calcular IMC</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];

        // Validação básica dos inputs
        if (is_numeric($peso) && is_numeric($altura) && $peso > 0 && $altura > 0) {
            $imc = $peso / ($altura * $altura);
            $imc_formatado = number_format($imc, 2);

            echo "<h2>Seu IMC é: $imc_formatado</h2>";

            // Classificação do IMC
            if ($imc < 18.5) {
                echo "<p>Classificação: Magreza</p>";
            } elseif ($imc >= 18.5 && $imc < 24.9) {
                echo "<p>Classificação: Saudável</p>";
            } elseif ($imc >= 25.0 && $imc < 29.9) {
                echo "<p>Classificação: Sobrepeso</p>";
            } elseif ($imc >= 30.0 && $imc < 34.9) {
                echo "<p>Classificação: Obesidade Grau I</p>";
            } elseif ($imc >= 35.0 && $imc < 39.9) {
                echo "<p>Classificação: Obesidade Grau II</p>";
            } else {
                echo "<p>Classificação: Obesidade Grau III</p>";
            }
        } else {
            echo "<p>Por favor, insira valores válidos para peso e altura.</p>";
        }
    }
    ?>
<br><br>
    <h2>Tabela de Avaliação do IMC</h2>
    <table>
        <tr>
            <th>Classificação</th>
            <th>IMC</th>
        </tr>
        <tr>
            <td>Magreza</td>
            <td>Abaixo de 18,5</td>
        </tr>
        <tr>
            <td>Saudável</td>
            <td>18,5 a 24,9</td>
        </tr>
        <tr>
            <td>Sobrepeso</td>
            <td>25,0 a 29,9</td>
        </tr>
        <tr>
            <td>Obesidade Grau I</td>
            <td>30,0 a 34,9</td>
        </tr>
        <tr>
            <td>Obesidade Grau II</td>
            <td>35,0 a 39,9</td>
        </tr>
        <tr>
            <td>Obesidade Grau III</td>
            <td>40,0 e acima</td>
        </tr>
    </table>
</body>
</html>
