<?php
    session_start();
    require_once 'conexao.php';

    if(isset($_POST['bt_cadastrar'])) {
        $nome_curso = mysqli_real_escape_string($con, $_POST['nome_curso']);
        $instituicao = md5(mysqli_real_escape_string($con, $_POST['instituicao']));
        $ano_curso = md5(mysqli_real_escape_string($con, $_POST['ano_curso']));
        // CREATE criar, inserir
        $sql = "INSERT INTO usuarios (nome_curso, instituicao, ano_curso) VALUES ('$nome_curso', '$instituicao','$ano_curso')";

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
