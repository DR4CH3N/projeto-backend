### COMANDOS SQL 

## Modelagem Física:

# Criar banco de dados:

``` sql
CREATE DATABASE calordado CHARACTER SET utf8mb4;

```

# Criar tabelas: admin

``` SQL
CREATE TABLE admin(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(45) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);
```

# Criar tabelas: contato_meu_perfil

``` SQL
CREATE TABLE contato_meu_perfil(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    endereco VARCHAR(80) NOT NULL,
    cep VARCHAR(8) NOT NULL,
    cidade VARCHAR(45) NOT NULL,
    numero_casa VARCHAR(5) NOT NULL,
    usuario_id INT NOT NULL
);
```

# Criar tabela: usuarios

``` SQL
CREATE TABLE usuarios(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(45) NOT NULL,
    email VARCHAR(45) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);
```
# Criar tabela: quero_doar 

``` SQL
CREATE TABLE quero_doar(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    doacao ENUM('roupas', 'cobertores', 'calcados') NOT NULL,
    usuario_id INT NOT NULL

);
```
# Criar relacionamento entre usuarios e contato_meu_perfil:

``` SQL
ALTER TABLE contato_meu_perfil
    ADD CONSTRAINT fk_contato_meu_perfil_usuarios
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
```

# Criar relacionamento entre: quero_doar e usuarios

``` SQL
  ALTER TABLE quero_doar
  ADD CONSTRAINT fk_quero_doar_usuarios
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
```