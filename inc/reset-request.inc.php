<?php

if (isset($_POST["reset-request-submit"])) {
    /* entendendo a logica: a variavel $token, pela funcao random bytes ira gerar letras e simbolos aleatorios no link, para que ninguem possa ter acesso a ela alem do usuario que quiser recuperar sua senha.

    a variavel $selecionador vai verificar e autenticar pra ver se é realmente aquele usuario especifico que quer redefinir sua senha
    */
    
    $selecionador = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    /* a variavel URL vai pegar a pagina de recuperar a senha e concatenar com as variaveis $selecionador e $token */

    $url = "localhost/microblog-inicial/criar-nova-senha.php?selecionador=".$selecionador. "&validacao=". bin2hex($token);

    /* criando uma data de expiracao para o token */

    /* aqui, a data de expiracao vai ser 10 minutos (600 segundos) apos o token ser criado, o usuario tera 10min para poder fazer o reset de sua senha */

    $expiracao = date("U") + 600;

    /* aqui ele vai fazer a conexao com o banco, por isso o require */
    require 'Banco.php';

    /* ele vai pegar o campo email do formulario */
    $emailUsuario = $_POST["email"];

    /* aqui ele ira deletar o token (caso tiver mais de um) do banco de dados do usuario, 
    a interrogacao depois do pwdResetEmail sera substituida pela variavel $declaracao, 
    vai vir no tipo string e vai receber tambem o email do usuario*/
    $sql = "DELETE FROM resetsenha WHERE pwdResetEmail=?";
    $declaracao = mysqli_stmt_init($conexao);

    if (!mysqli_stmt_prepare($declaracao, $sql) ) {
        echo "OPS! houve um erro, tente novamente";
        die();
    } else {
        /* o "s" significa string */
        mysqli_stmt_bind_param($declaracao, "s", $emailUsuario);
        mysqli_stmt_execute($declaracao);
    }
    
    $sql = "INSERT INTO resetsenha (pwdResetEmail, pwdResetSelecionador, pwdResetToken, pwdResetExpiracao) VALUES (?, ?, ?, ?);";
    $declaracao = mysqli_stmt_init($conexao);

    if (!mysqli_stmt_prepare($declaracao, $sql) ) {
        echo "OPS! houve um erro, tente novamente";
        die();
    } else {
        /* aqui ele vai fazer a encriptacao to token com a funcao de password hash */
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);

        /* o "s" significa string */
        mysqli_stmt_bind_param($declaracao, "ssss", $emailUsuario, $selecionador, $hashedToken, $expiracao);
        mysqli_stmt_execute($declaracao);
    }

    mysqli_stmt_close($declaracao);
    mysqli_close($conexao);
   
    
    
    $emailPara = $emailUsuario;
    
    $assunto = "Redefinir sua senha na Calor dado";

    $mensagem = '<p>Recebemos seu pedido para mudar sua senha, o link para poder muda-la está logo abaixo. se você não fez esse pedido sugerimos que você troque sua senha pois ela pode estar comprometida.</p>';
    $mensagem .= '<p>Aqui esta o link para poder mudar sua senha: </br>';
    $mensagem .= '<a href="' . $url . '">' . $url . '</a></p>';

    /* o \r e \n servem para ir para uma nova linha no PHP */
    
    /* email temporario sendo usado apenas para testes, colocar o email da calor dado depois */
    $headers = "de Calor dado <(degehi9598@otodir.com)>\r\n";
    $headers .= "Responder para: <(degehi9598@otodir.com)>\r\n";
    $headers .= "Content-type: text/html\r\n";

    
    /* aqui ele vai usar a função do PHP de email e incluir o conteudo que vai ser enviado para o email do usuario */
    mail($emailPara, $assunto, $mensagem, $headers);
    
    /* aqui ele vai  */
    header("location: ../reset-password.php?reset=sucesso");


} else {
    // caso o usuario entrar nessa pagina de recuperacao de senha por engano, ele vai para a localizacao informada
    header("location: ../index.php");
}