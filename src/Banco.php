<?php
namespace CalorDado;
use PDO, Exception;
abstract class Banco {
    private static string $servidor = "localhost";
    private static string $usuario = "suniow89_lucasmendes";
    private static string $senha = "Luc@s4674";
    private static string $banco = "suniow89_calordado";
    private static PDO $conexao; 
    public static function conecta():PDO{
        try {
            self::$conexao = new PDO("mysql:host=".self::$servidor."; dbname=".self::$banco."; charset=utf8", self::$usuario, self::$senha);
            // Habilida a verificação de erros (em geral e exceções)
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
        return self::$conexao;
    }
}
?>