<?php
namespace CalorDado;
abstract class Utilitarios {
    public static function limitaCaractere($dados){
        return mb_strimwidth($dados, 0, 20, " ...");
    }
    public static function formataData(string $data){
        return date('d/m/Y H:i',strtotime($data));
    }
    public static function dump($dados){
        echo "<pre>";
        var_dump($dados);
        echo "</pre>";
    }
    public static function formataTexto(string $texto):string{
        return nl2br($texto);
    }
}
?>
 