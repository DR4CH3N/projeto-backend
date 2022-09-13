<?php
namespace CalorDado;
use PDO, Exception;

final class Doacao{
    private int $id;
    private int $quantidade;
    private int $usuarioId;
    public Usuario $usuario;


    public function __construct(){
        $this->usuario = new Usuario;
        $this->conexao = $this->usuario->getConexao();
    }

    public function listar():array{
        $sql = "SELECT quantidade FROM roupas WHERE id = :id
        UPDATE roupas SET quantidade=quantidade+1 WHERE id = :id";
        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $erro){
            die("Erro: ".$erro->getMessage());
        }
        return $resultado;    
    }
   

    public function inserir():void{
        $sql = "INSERT INTO doacoes(quantidade, usuario_id) VALUES (:quantidade, :usuario_id)";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(":quantidade", $this->quantidade, PDO::PARAM_INT);
            $consulta->bindValue(":usuario_id", $this->usuario->getId(), PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
    }

    public function listarUm():array{
        $sql = "SELECT roupas, calcados, cobertores, usuario_id, usuarios.id FROM doacoes INNER JOIN usuarios ";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
        return $resultado;
    }

    
    public function getQuantidade(): int
    {
        return $this->quantidade;
    }
    public function setQuantidade(int $quantidade)
    {
        $this->quantidade = filter_var($quantidade, FILTER_SANITIZE_NUMBER_INT);
    }



    public function getUsuarioId(): int
    {
        return $this->usuarioId;
    }
    public function setUsuarioId(int $usuarioId)
    {
        $this->usuarioId = filter_var($usuarioId, FILTER_SANITIZE_NUMBER_INT);
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}
