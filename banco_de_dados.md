### COMANDOS SQL 

## Modelagem Física:

# Criar banco de dados:

``` sql
CREATE DATABASE calor-dado-novo CHARACTER SET utf8mb4;

```

# Criar tabelas: admin // Tabela admin nao usaremos mais

``` SQL
CREATE TABLE admin(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(45) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);
```

# Criar tabelas: cadastros

``` SQL
CREATE TABLE cadastros(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    telefone VARCHAR(14) NOT NULL,
    endereco VARCHAR(80) NOT NULL,
    cep VARCHAR(8) NOT NULL,
    cidade VARCHAR(45) NOT NULL,
    numero_casa VARCHAR(5) NOT NULL,
    bairro VARCHAR(20) NOT NULL,
    endereco VARCHAR(20) NOT NULL,
    usuario_id INT NOT NULL
);
```

# Criar tabela: usuarios

``` SQL
CREATE TABLE usuarios(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(45) NOT NULL,
    email VARCHAR(45) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('admin', 'usuario') NOT NULL
);
```
# Criar tabela: doacoes

``` SQL
CREATE TABLE doacoes(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    roupas INT(12) NOT NULL,
    calcados INT(12) NOT NULL,
    cobertores INT(12) NOT NULL,
    pix VARCHAR(255) NOT NULL,
    usuario_id INT NOT NULL
);
```
# Criar relacionamento entre usuarios e cadastros:

``` SQL
ALTER TABLE cadastros
    ADD CONSTRAINT fk_cadastro_usuarios
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
```

# Criar relacionamento entre: doacoes e usuarios

``` SQL
  ALTER TABLE cadastros
  ADD CONSTRAINT fk_cadastro_usuarios
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
```

# Adicionar campo quantidade na tabela doações

``` sql
ALTER TABLE `cadastros` ADD `Quantidade` INT NOT NULL AFTER `doacao`;
```

## adicionar tipo de usuario na tabela usuarios
```sql
ALTER TABLE `usuarios` ADD `Tipo` ENUM('admin', 'usuario') NOT NULL AFTER `senha`;
```

## adicionar tabela nova para recuperacao de senha

```sql
CREATE TABLE resetsenha(
    pwdSenhaId INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    pwdResetEmail TEXT NOT NULL,
    pwdResetSelecionador TEXT NOT NULL,
    pwdResetToken LONGTEXT NOT NULL,
    pwdResetExpiracao TEXT NOT NULL
);
```