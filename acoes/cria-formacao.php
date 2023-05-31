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
        $idusuario = mysqli_real_escape_string($con, $_SESSION['idusuario']);
        // CREATE criar, inserir
        $sql = "INSERT INTO formacoes (nivel, nome_curso, instituicao, ano_inicio, ano_termino, situacao, idusuario)
         VALUES ('$nivel','$nome_curso', '$instituicao','$ano_inicio', '$ano_termino', '$situacao', '$idusuario')";

        if(mysqli_query($con, $sql)) {
        $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
        $_SESSION['status']   = "success";
        header('Location: ../painel.php');
        } else {
        $_SESSION['mensagem'] = "Não foi possível cadastrar formação";
        $_SESSION['status']   = "danger";
        header('Location: ../painel.php');
}
        // FECHAR CONEXAO
        mysqli_close($con);
    }
