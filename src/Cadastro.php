<?php
namespace CalorDado;
use PDO, Exception;

final class Cadastro {
    private int $id;
    private string $telefone;
    private string $endereco;
    private string $cep;
    private string $cidade;
    private string $numero;
    private string $bairro;
    private string $complemento;
    private int $usuarioId;
    public Usuario $usuario;
    private PDO $conexao;
    
    public function __construct(){
        $this->usuario = new Usuario;
        $this->conexao = $this->usuario->getConexao();
    }
   
    public function listarUsuario():array{
        /* fazer inner/right join depois com a tabela cadastro (para poder listar nomes e endereços dos usuarios) e poder ordenar por nome */
        $sql = "SELECT usuarios.id, usuarios.nome, usuarios.email, cadastro.telefone, cadastro.endereco, cadastro.cep, cadastro.cidade, cadastro.numero, cadastro.complemento, cadastro.bairro FROM usuarios LEFT JOIN cadastro
        ON cadastro.usuario_id = usuarios.id";
        try{
            $consulta = $this->conexao->prepare($sql);

            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $erro){
            die("Erro: ".$erro->getMessage());
        }
        return $resultado;    
    }

    public function InserirCadastro(){
        $sql = "INSERT INTO cadastro(telefone, endereco, cep, cidade, numero, bairro, complemento, usuario_id) VALUES (:telefone, :endereco, :cep, :cidade, :numero, :bairro, :complemento, :usuario_id)";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
            $consulta->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
            $consulta->bindParam(":cep", $this->cep, PDO::PARAM_STR);
            $consulta->bindParam(":cidade", $this->cidade, PDO::PARAM_STR);
            $consulta->bindParam(":numero", $this->numero, PDO::PARAM_STR);
            $consulta->bindParam(":bairro", $this->bairro, PDO::PARAM_STR);
            $consulta->bindParam(":complemento", $this->complemento, PDO::PARAM_STR);
            $consulta->bindValue(":usuario_id", $this->usuario->getId(), PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
    }
   
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

    }

   
    public function getEndereco(): string
    {
        return $this->endereco;
    }
    public function setEndereco(string $endereco)
    {
        $this->endereco = filter_var($endereco, FILTER_SANITIZE_SPECIAL_CHARS);

    }

    
    public function getCep(): string
    {
        return $this->cep;
    }
    public function setCep(string $cep)
    {
        $this->cep = filter_var($cep, FILTER_SANITIZE_SPECIAL_CHARS);

    }

    
    public function getCidade(): string
    {
        return $this->cidade;
    }
    public function setCidade(string $cidade)
    {
        $this->cidade = filter_var($cidade, FILTER_SANITIZE_SPECIAL_CHARS);

    }

    
    public function getNumero(): string
    {
        return $this->numero;
    }
    public function setNumero(string $numero)
    {
        $this->numero = filter_var($numero, FILTER_SANITIZE_SPECIAL_CHARS);

    }

    public function getUsuarioId(): int
    {
        return $this->usuarioId;
    }
    public function setUsuarioId(int $usuarioId)
    {
        $this->usuarioId = filter_var($usuarioId, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public function getBairro(): string
    {
        return $this->bairro;
    }
    public function setBairro(string $bairro)
    {
        $this->bairro = filter_var($bairro, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public function getComplemento(): string
    {
        return $this->complemento;
    }
    public function setComplemento(string $complemento)
    {
        $this->complemento = filter_var($complemento, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }
    public function setTelefone(string $telefone)
    {
        $this->telefone = filter_var($telefone, FILTER_SANITIZE_SPECIAL_CHARS);
    }

}
