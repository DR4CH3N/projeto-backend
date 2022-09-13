<?php
namespace CalorDado;
use PDO, Exception;

final class Doacao{
    private int $id;
    private int $roupas;
    private int $calcados;
    private int $cobertores;
    private int $usuarioId;
    public Usuario $usuario;
    private string $pix;


    public function __construct(){
        $this->usuario = new Usuario;
        $this->conexao = $this->usuario->getConexao();
    }

    public function listar():array{
        $sql = "SELECT id, roupas, calcados, cobertores, pix FROM doacoes";
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
        $sql = "INSERT INTO doacoes(roupas, calcados, cobertores, usuario_id) VALUES (:roupas, :calcados, :cobertores, :usuario_id)";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(":roupas", $this->roupas, PDO::PARAM_INT);
            $consulta->bindParam(":calcados", $this->calcados, PDO::PARAM_INT);
            $consulta->bindParam(":cobertores", $this->cobertores, PDO::PARAM_INT);
            $consulta->bindParam(":usuario_id", $this->usuarioId, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
    }

    public function listarUm():array{
        /* faze right/inner join aqui depois com a tabela usuarios */
        $sql = "SELECT usuarios.id, usuarios.nome, SUM(doacoes.roupas), SUM(doacoes.calcados), 
        SUM(doacoes.cobertores), doacoes.pix FROM doacoes 
        LEFT JOIN usuarios
        ON doacoes.usuario_id = usuarios.id";
        
        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $erro){
            die("Erro: ".$erro->getMessage());
        }
        return $resultado;    
    }


    
   
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }

    public function getRoupas(): int
    {
        return $this->roupas;
    }
    public function setRoupas(int $roupas)
    {
        $this->roupas = filter_var($roupas, FILTER_SANITIZE_NUMBER_INT);
    }

    public function getCalcados(): int
    {
        return $this->calcados;
    }
    public function setCalcados(int $calcados)
    {
        $this->calcados = filter_var($calcados, FILTER_SANITIZE_NUMBER_INT);
    }

    public function getCobertores(): int
    {
        return $this->cobertores;
    }
    public function setCobertores(int $cobertores)
    {
        $this->cobertores = filter_var($cobertores, FILTER_SANITIZE_NUMBER_INT);
    }

    public function getPix(): string
    {
        return $this->pix;
    }
    public function setPix(string $pix)
    {
        $this->pix = filter_var($pix, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    /**
     * Get the value of usuarioId
     *
     * @return int
     */
    public function getUsuarioId(): int
    {
        return $this->usuarioId;
    }

    /**
     * Set the value of usuarioId
     *
     * @param int $usuarioId
     *
     * @return self
     */
    public function setUsuarioId(int $usuarioId): self
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }
}
