<?php

if (isset($_POST["reset-password-submit"]) ) {
    
    $selecionador = $_POST["selecionador"];
    $validacao = $_POST["validacao"];
    $senha = $_POST["senha"];
    $senhaConfirma = $_POST["senha-confirma"];
    
    /* caso o campo senha e/ou confirma-senha estiverem vazios, ele vai mandar o ususario para uma pagina de erro */
    if (empty($senha) || empty($senhaConfirma)) {
    header("Location: ../criar-nova-senha.php?novasenha=empty");
    die();
    /* caso a senha for diferente do confirma-senha ele vai dar uma tela/mensagem de erro e vai pedir novamente para o usuario colocar as senhas nos campos */
} else if ($senha != $senhaConfirma) {
    header("Location: ../criar-nova-senha.php?novasenha=senhadiferente");
    die();
}
    /* checando os tokens */

    $dataAtual = date("U");

    require 'src/Banco.php';

    $sql = "SELECT * FROM resetsenha WHERE pwdResetSelecionador=? AND pwdResetExpiracao >= ?";

    $declaracao = mysqli_stmt_init($conexao);

    if (!mysqli_stmt_prepare($declaracao, $sql) ) {
        echo "OPS! houve um erro, tente novamente";
        die();
    } else {
        /* o "s" significa string */
        mysqli_stmt_bind_param($declaracao, "s", $selecionador, $dataAtual);
        mysqli_stmt_execute($declaracao);

        $resultado = mysqli_stmt_get_result($declaracao);

        if (!$coluna = mysqli_fetch_assoc($resultado) ) {
            echo "OPS! houve um erro, tente novamente fazer o reset de sua senha";
            die();
        }
        else {
            $tokenBin = hex2bin($validacao);
            $tokenCheck = password_verify($tokenBin, $coluna["pwdResetToken"]);

            if ($tokenCheck === false) {
                echo "OPS! houve um erro, tente novamente fazer o reset de sua senha";
                die();
            } elseif ($tokenCheck === true) {
                
                $tokenEmail = $coluna['pwdResetEmail'];

                $sql = "SELECT * FROM usuarios WHERE email=?;";

                $declaracao = mysqli_stmt_init($conexao);

                if (!mysqli_stmt_prepare($declaracao, $sql) ) {
                echo "OPS! houve um erro, tente novamente";
                die();
                } else {

                mysqli_stmt_bind_param($declaracao, "s", $tokenEmail);

                mysqli_stmt_execute($declaracao);
                
                $resultado = mysqli_stmt_get_result($declaracao);

                    if (!$coluna = mysqli_fetch_assoc($resultado) ) {
                    echo "OPS! houve um erro, tente novamente fazer o reset de sua senha";
                    die();
                    }
                    else {
                        $sql = "UPDATE usuarios SET senha=? WHERE email=?";

                        $declaracao = mysqli_stmt_init($conexao);

                        if (!mysqli_stmt_prepare($declaracao, $sql) ) {
                        echo "OPS! houve um erro, tente novamente";
                        die();
                        } else {

                        $novaSenhaHash = password_hash($senha, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($declaracao, "ss", $novaSenhaHash, $tokenEmail);

                        mysqli_stmt_execute($declaracao);

                        }
                        $sql = "DELETE FROM resetsenha WHERE pwdResetEmail=?";

                        $declaracao = mysqli_stmt_init($conexao);

                        if (!mysqli_stmt_prepare($declaracao, $sql) ) {
                        echo "OPS! houve um erro, tente novamente";
                        die();
                        } else {

                        mysqli_stmt_bind_param($declaracao, "s", $tokenEmail);

                        mysqli_stmt_execute($declaracao);

                        header("Location: ../login.php?novasenha=senhaatualizada");
                        }
                    }
                }
            }
        }
    }
    

    } else {
    header("location: ../index.php");
}