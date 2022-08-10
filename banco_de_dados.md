### COMANDOS SQL

## modelagem fisica:

# criar banco de dados:

``` sql
CREATE DATABASE calordado CHARACTER SET utf8mb4;

```

# criar tabelas: admin


``` sql
CREATE TABLE admin(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(45) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);
```

# criar tabelas: contato_meu_perfil

``` sql
CREATE TABLE contato_meu_perfil(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    endereco VARCHAR(80) NOT NULL,
    cep VARCHAR(20) NOT NULL,
    cidade VARCHAR(45) NOT NULL,
    numero_casa VARCHAR(15) NOT NULL,
    usuario_id INT NOT NULL
);
```

# criar tabelas: usuarios

``` sql
CREATE TABLE usuarios(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(45) NOT NULL,
    email VARCHAR(45) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);
```

# criar tabela: quero_doar 

``` sql
CREATE TABLE quero_doar(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    doacao ENUM('roupas', 'cobertores', 'calcados') NOT NULL,
    usuario_id INT NOT NULL

);
```

# criar relacionamento entre usuarios e contato_meu_perfil:

``` sql
ALTER TABLE contato_meu_perfil
    ADD CONSTRAINT fk_contato_meu_perfil_usuarios
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
```

# criar relacionamento entre: quero_doar e usuarios

```sql
  ALTER TABLE quero_doar
  ADD CONSTRAINT fk_quero_doar_usuarios
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
```