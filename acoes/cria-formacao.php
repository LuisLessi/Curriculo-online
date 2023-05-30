<?php
    session_start();
    require_once 'conexao.php';

    if(isset($_POST['bt_cadastrar'])) {
        $nivel  = mysqli_real_escape_string($con, $_POST['nivel']);
        $nome_curso = mysqli_real_escape_string($con, $_POST['nome_curso']);
        $instituicao = mysqli_real_escape_string($con, $_POST['instituicao']);
        $ano_inicio = mysqli_real_escape_string($con, $_POST['ano_inicio']);
        $ano_termino = mysqli_real_escape_string($con, $_POST['ano_termino']);
        $situacao = mysqli_real_escape_string($con, $_POST['situacao']);
        // CREATE criar, inserir
        $sql = "INSERT INTO usuarios (nivel, nome_curso, instituicao, ano_inicio, ano_termino, situacao)
         VALUES ('$nivel','$nome_curso', '$instituicao','$ano_inicio', '$ano_termino', '$situacao')";

        if(mysqli_query($con, $sql)) {
            $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
            header('Location: ../dashboard.php');
        } else {
            $_SESSION['mensagem'] = "Erro no cadastro!";
            header('Location: ../dashboard.php');
        }
        // FECHAR CONEXAO
        mysqli_close($con);
    }
