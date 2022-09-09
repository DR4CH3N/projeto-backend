<?php
namespace CalorDado;
use PDO, Exception;

final class Doacao{
    private int $id;
    private int $roupas;
    private int $calcados;
    private int $cobertores;
    public Cadastro $doacoesId;
    private string $pix;


    public function __construct(){
        $this->cadastro = new Cadastro;
        $this->conexao = $this->cadastro->getConexao();
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
        $this->roupas = filter_var($roupas, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public function getCalcados(): int
    {
        return $this->calcados;
    }
    public function setCalcados(int $calcados)
    {
        $this->calcados = filter_var($calcados, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public function getCobertores(): int
    {
        return $this->cobertores;
    }
    public function setCobertores(int $cobertores)
    {
        $this->cobertores = filter_var($cobertores, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public function getPix(): string
    {
        return $this->pix;
    }
    public function setPix(string $pix)
    {
        $this->pix = filter_var($pix, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}
