<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form method="POST" action="">
        <h1>Formulário com PHP</h1>
        <p class="error">* Obrigatório</p>
        <!--"required" Um formulário HTML com um campo de entrada obrigatório:-->

        Nome: <input name="nome" type="text"> <span class="error">*</span> <br><br>
        Email: <input name="email" type="text"><span class="error">*</span><br><br>
        Website: <input name="website" type="text"><span class="error">*</span><br><br>
        Comrntário: <textarea name="comentário" cols="30" rows="3"></textarea><span class="error">*</span><br><br>

        <!--gênero para so qur um fiquemat cado é presiso botar o 'name'-->
        <!--definir os valores-->
        Gênero:
        <input name="genero" value="masculino" type="radio"> Masculino
        <input name="genero" value="feminino" type="radio"> Feminino
        <input name="genero" value="outros" type="radio"> Outro
        <br><br>

        <!--para enviar os dados prenchidos-->
        <button name="enviado" type="submit"> Eviar</button>

        <!--Vamos exibir os dados agora-->
    </form> <?php
            //verificar se o formulário foi enviado
            if (isset($_POST['enviado'])) {
                echo "<h1>Dados enviados:</h1>";

                // Validar e exibir dados
                //'empty' Determina se uma variável é considerada vazia. Uma variável é considerada vazia se 
                //não existir ou seu valor for igual a false. A função empty() não gera um aviso se a variável não existir.
                //'strien' determina o tamanho do nome
                if (empty($_POST['nome']) || strlen($_POST['nome']) < 3 || strlen($_POST['nome']) > 100) {
                    echo '<p class="error">Preencha corretamente o campo nome</p>';
                } else {
                    echo "<p><b>Nome:</b> {$_POST['nome']}</p>";
                }
                //filter_var — Filtra uma variável com um filtro especificado | determina se o email e valido
                if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) {
                    echo '<p class="error">Preencha corretamente o campo e-mail</p>';
                } else {
                    echo "<p><b>Email:</b> {$_POST['email']}</p>";
                }

                if (!empty($_POST['website']) && !filter_var($_POST['website'], FILTER_SANITIZE_URL)) {
                    echo '<p class="error">Preencha corretamente o campo website</p>';
                } else {
                    echo "<p><b>Website:</b> {$_POST['website']}</p>";
                }

                $genero = "Não selecionado";
                //lasso
                if (isset($_POST['genero'])) {
                    $genero = $_POST['genero'];

                    //validando o genero 
                    if ($genero != "masculino" && $genero != "feminino" && $genero != "outros") {
                        echo '<p class="error">Selecione corretamente o gênero</p>';
                    } else {
                        echo "<p><b>Gênero:</b> {$_POST['genero']}</p>";
                    }
                } else {
                    echo "<p><b>Gênero:</b> $genero</p>";
                }
            }
            ?>
</body>

</html>