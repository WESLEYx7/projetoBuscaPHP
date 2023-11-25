CREATE TABLE `acervo` ( 
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    idEditora INT NOT NULL, 
    titulo VARCHAR(100), 
    autor VARCHAR(60), 
    ano INT, 
    preco DOUBLE, 
    quantidade INT, 
    tipo INT, 
    FOREIGN KEY (idEditora) 
    REFERENCES editora(id)
);


CREATE TABLE `editora` (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    nome VARCHAR(60)
);

-- Código usado para inserir acervo
INSERT INTO acervo (idEditora, titulo, autor, ano, preco, quantidade, tipo) VALUES (
    1, 
    'Harry Potter', 
    'george orwell', 
    1945, 
    47.95, 
    200, 
    2
);

INSERT INTO acervo ( idEditora, titulo, autor, ano, preco, quantidade, tipo) VALUES (
    4, 
    'Teste', 
    'Testando', 
    2023, 
    75.43, 
    10, 
    3
);

-- Código usado para inserir editora
INSERT INTO editora (nome) VALUES ('Editora Rocco');