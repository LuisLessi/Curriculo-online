<?php
    session_start();                    //Iniciar sessao
    session_unset();                    //Apagar variaveis de sessao
    session_destroy();                  //Destruir sessao
    header('Location: ../index.php');   //Redirecionar para o index