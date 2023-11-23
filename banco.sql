CREATE TABLE `acervo` ( 
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    idEditora INT NOT NULL, 
    titulo VARCHAR(100), 
    autor VARCHAR(60), 
    ano INT, 
    preco DOUBLE, 
    quantidade INT, 
    tipo INT, 
FOREIGN KEY (idEditora) REFERENCES editora(id) );


CREATE TABLE `editora` (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    nome VARCHAR(60)
);

-- Código usado para inserir acervo
INSERT INTO acervo (id, idEditora, titulo, autor, ano, preco, quantidade, tipo) VALUES (
    1, 
    1, 
    'Harry Potter', 
    'J.K', 
    1995, 
    25.95, 
    1000, 
    1
);

-- Código usado para inserir editora
INSERT INTO editora (id, nome) VALUES (1, ' Editora Rocco');