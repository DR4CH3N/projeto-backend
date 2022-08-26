<?php
namespace CalorDado;
use PDO, Exception;

final class Usuario {
    private int $id;
    private string $nome;
    private string $email;
    private string $senha;
    private PDO $conexao;
    
    public function __construct(){
        $this->conexao = Banco::conecta();
    }
   
    public function listarUsuario():array{
        /* fazer inner/right join depois com a tabela cadastro (para poder listar nomes e endereços dos usuarios) e poder ordenar por nome */
        $sql = "SELECT id, nome, email, senha FROM usuarios ORDER BY nome";
        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $erro){
            die("Erro: ".$erro->getMessage());
        }
        return $resultado;    
    }

    /* pode ser interessante adicionar o CRUD aqui depois para poder deletar um usuario */

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }

 
    public function getNome(): string
    {
        return $this->nome;
    }
    public function setNome(string $nome)
    {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email)
    {
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public function getSenha(): string
    {
        return $this->senha;
    }
    public function setSenha(string $senha)
    {
        $this->senha = filter_var($senha, FILTER_SANITIZE_SPECIAL_CHARS);
    }

}
