CREATE DATABASE mercado;

USE mercado;

CREATE TABLE produtos (
    id                      INT NOT NULL AUTO_INCREMENT,
    nome                    VARCHAR(255) NOT NULL,
    descricao               VARCHAR(255) NOT NULL,
    setor                   VARCHAR(255) CHECK (setor IN ('Higiene e Limpeza', 'Hortifruti', 'Açougue E Peixaria', 'Padaria e Confeitaria', 'Frios e Laticínios', 'Congelados', 'Bebidas', 'Mercearia'))  NOT NULL,
    preco                   DOUBLE NOT NULL,
    validade                DATE NOT NULL,
    imagem                  VARCHAR(255) NOT NULL,
    peso                    VARCHAR(255) NOT NULL,
    marca                   VARCHAR(255) NOT NULL,
    quantidade_estoque      INTEGER NOT NULL,
    status_estoque          VARCHAR(255) CHECK (status_estoque IN ('Disponível', 'Poucas unidades', 'Esgotado')) NOT NULL,
    CONSTRAINT pk_produtos PRIMARY KEY (id)
);

CREATE TABLE usuarios (
    id               INT NOT NULL AUTO_INCREMENT,
    nome_completo    VARCHAR(255) NOT NULL,
    email            VARCHAR(255) NOT NULL UNIQUE,
    senha_hash       VARCHAR(255) NOT NULL,
    telefone         VARCHAR(255) UNIQUE,
    endereco         VARCHAR(255),
    CONSTRAINT pk_usuarios PRIMARY KEY (id)
);

CREATE TABLE carts (
    id          INT NOT NULL AUTO_INCREMENT,
    user_id     INT NOT NULL,
    CONSTRAINT pk_carts PRIMARY KEY (id)
);

CREATE TABLE cart_items (
    id             INT NOT NULL AUTO_INCREMENT,
    cart_id        INT NOT NULL,
    produtos_id     INT NOT NULL,
    quantity       INT NOT NULL DEFAULT 1,

    CONSTRAINT pk_cart_items PRIMARY KEY (id),
    FOREIGN KEY (cart_id) REFERENCES carts(id),
    FOREIGN KEY (produtos_id) REFERENCES produtos(id)
);

INSERT INTO usuarios (id, nome_completo, email, senha_hash, telefone, endereco)
VALUES (1, 'Ana Clara', 'ana@gmail.com', 'hash123', '(45)98888-1001', 'Rua das Flores, 120'),
       (2, 'Pedro Martins', 'pedro@gmail.com', 'hash123', '(45)98888-1002', 'Av. Brasil, 455'),
       (3, 'Julia Santos', 'julia@gmail.com', 'hash123', '(45)98888-1003', 'Rua Paraná, 89'),
       (4, 'Ricardo Alves', 'ricardo@gmail.com', 'hash123', '(45)98888-1004', 'Rua Mato Grosso, 900'),
       (5, 'Larissa Costa', 'larissa@gmail.com', 'hash123', '(45)98888-1005', 'Rua Pioneiros, 74'),
       (6, 'Felipe Rocha', 'felipe@gmail.com', 'hash123', '(45)98888-1006', 'Av. Central, 1500'),
       (7, 'Amanda Ferreira', 'amanda@gmail.com', 'hash123', '(45)98888-1007', 'Rua Primavera, 210'),
       (8, 'Gabriel Melo', 'gabriel@gmail.com', 'hash123', '(45)98888-1008', 'Rua São Paulo, 415'),
       (9, 'Camila Moura', 'camila@gmail.com', 'hash123', '(45)98888-1009', 'Rua Rio Branco, 58'),
       (10, 'Thiago Lopes', 'thiago@gmail.com', 'hash123', '(45)98888-1010', 'Rua Tiradentes, 900'),
       (11, 'Patricia Gomes', 'patricia@gmail.com', 'hash123', '(45)98888-1011', 'Av. das Torres, 775'),
       (12, 'Leonardo Silva', 'leo@gmail.com', 'hash123', '(45)98888-1012', 'Rua das Acácias, 340'),
       (13, 'Bruna Castro', 'bruna@gmail.com', 'hash123', '(45)98888-1013', 'Rua Bahia, 66'),
       (14, 'Eduardo Nunes', 'edu@gmail.com', 'hash123', '(45)98888-1014', 'Rua XV de Novembro, 199'),
       (15, 'Vanessa Lima', 'vanessa@gmail.com', 'hash123', '(45)98888-1015', 'Rua das Palmeiras, 871'),
       (16,'Rafael Duarte', 'rafael@gmail.com', 'hash123', '(45)98888-1016', 'Av. JK, 542'),
       (17, 'Isabela Mendes', 'isabela@gmail.com', 'hash123', '(45)98888-1017', 'Rua das Araucárias, 73'),
       (18, 'Matheus Oliveira', 'matheus@gmail.com', 'hash123', '(45)98888-1018', 'Rua Amazonas, 100'),
       (19, 'Beatriz Souza', 'bia@gmail.com', 'hash123', '(45)98888-1019', 'Rua dos Lírios, 641'),
       (20, 'Vinicius Pereira', 'vinicius@gmail.com', 'hash123', '(45)98888-1020', 'Rua Goiás, 511');

INSERT INTO produtos (id, nome, descricao, setor, preco, validade, imagem, peso, marca, quantidade_estoque, status_estoque)
VALUES (1, 'Maçã Gala', 'Maçã fresca selecionada', 'Hortifruti', 8.99, '2026-08-10', 'maca.jpeg', '1kg', 'Campo Verde', 80, 'Esgotado'),
       (2, 'Banana Prata', 'Banana madura premium', 'Hortifruti', 6.49, '2026-08-05', 'banana.webp', '1kg', 'Natural Foods', 65, 'Disponível'),
       (3, 'Pera Williams', 'Pera doce importada', 'Hortifruti', 12.90, '2026-08-14', 'pera.jpeg', '1kg', 'Fresh Farm', 42, 'Disponível'),
       (4, 'Uva Roxa', 'Uva sem sementes', 'Hortifruti', 14.50, '2026-08-08', 'uva.jpeg', '500g', 'Campo Verde', 33, 'Disponível'),
       (5, 'Melancia', 'Melancia fresca inteira', 'Hortifruti', 18.99, '2026-08-02', 'melancia.webp', '1un', 'Horta Viva', 14, 'Poucas unidades'),
       (6, 'Abacaxi Pérola', 'Abacaxi doce selecionado', 'Hortifruti', 9.90, '2026-08-06', 'abacaxi.webp', '1un', 'Fresh Farm', 27, 'Disponível'),
       (7, 'Mamão Formosa', 'Mamão fresco', 'Hortifruti', 7.99, '2026-08-07', 'mamao.jpg', '1kg', 'Natural Foods', 21, 'Esgotado'),
       (8, 'Laranja Pera', 'Laranja suculenta', 'Hortifruti', 5.99, '2026-08-10', 'laranja.avif', '1kg', 'Campo Verde', 75, 'Disponível'),
       (9, 'Limão Tahiti', 'Limão fresco', 'Hortifruti', 4.99, '2026-08-11', 'limao.jpeg', '1kg', 'Horta Viva', 49, 'Disponível'),
       (10, 'Morango', 'Morango fresco bandeja', 'Hortifruti', 13.90, '2026-08-04', 'morango.jpeg', '250g', 'Fresh Farm', 16, 'Poucas unidades'),

       (11, 'Alface Americana', 'Alface crocante', 'Hortifruti', 3.99, '2026-08-03', 'alface-americana.webp', '1un', 'Horta Viva', 35, 'Esgotado'),
       (12, 'Rúcula', 'Rúcula fresca', 'Hortifruti', 4.49, '2026-08-02', 'rucula.jpeg', '1maço', 'Natural Foods', 18, 'Poucas unidades'),
       (13, 'Couve', 'Couve manteiga fresca', 'Hortifruti', 3.50, '2026-08-04', 'couve.jpeg', '1maço', 'Horta Viva', 20, 'Disponível'),
       (14, 'Tomate Italiano', 'Tomate premium', 'Hortifruti', 9.80, '2026-08-08', 'tomate.jpeg', '1kg', 'Campo Verde', 54, 'Disponível'),
       (15, 'Cenoura', 'Cenoura fresca', 'Hortifruti', 5.40, '2026-08-12', 'cenoura.png', '1kg', 'Natural Foods', 45, 'Disponível'),
       (16, 'Batata Inglesa', 'Batata lavada', 'Hortifruti', 7.90, '2026-08-20', 'batata.webp', '1kg', 'Raiz Forte', 60, 'Disponível'),
       (17, 'Batata Doce', 'Batata doce roxa', 'Hortifruti', 8.50, '2026-08-21', 'batata-doce.webp', '1kg', 'Raiz Forte', 44, 'Esgotado'),
       (18, 'Mandioca', 'Mandioca fresca', 'Hortifruti', 6.99, '2026-08-10', 'mandioca.jpeg', '1kg', 'Campo Verde', 29, 'Disponível'),
       (19, 'Pepino Japonês', 'Pepino crocante', 'Hortifruti', 4.90, '2026-08-06', 'pepino.webp', '500g', 'Natural Foods', 31, 'Disponível'),
       (20, 'Cebola Branca', 'Cebola selecionada', 'Hortifruti', 5.70, '2026-08-15', 'cebola.jpeg', '1kg', 'Campo Verde', 58, 'Disponível'),

       (21, 'Picanha Bovina', 'Picanha premium', 'Açougue E Peixaria', 79.90, '2026-08-06', 'picanha.jpg', '1kg', 'Friboi', 12, 'Esgotado'),
       (22, 'Alcatra', 'Alcatra bovina', 'Açougue E Peixaria', 49.90, '2026-08-06', 'alcatra.jpg', '1kg', 'Friboi', 19, 'Disponível'),
       (23, 'Contra Filé', 'Contra filé bovino', 'Açougue E Peixaria', 52.90, '2026-08-06', 'contra-file.jpg', '1kg', 'Swift', 17, 'Disponível'),
       (24, 'Peito de Frango', 'Peito de frango congelado', 'Açougue E Peixaria', 19.99, '2026-09-10', 'frango.jpg', '1kg', 'Sadia', 70, 'Disponível'),
       (25, 'Coxa e Sobrecoxa', 'Frango temperado', 'Açougue E Peixaria', 17.50, '2026-09-08', 'coxa.jpg', '1kg', 'Perdigão', 45, 'Disponível'),
       (26, 'Linguiça Toscana', 'Linguiça fresca', 'Açougue E Peixaria', 24.90, '2026-08-09', 'linguica.jpg', '1kg', 'Aurora', 38, 'Disponível'),
       (27, 'Costela Suína', 'Costela temperada', 'Açougue E Peixaria', 29.90, '2026-08-05', 'costela.jpg', '1kg', 'Seara', 16, 'Esgotado'),
       (28, 'Tilápia', 'Filé de tilápia congelado', 'Açougue E Peixaria', 39.90, '2026-10-10', 'tilapia.jpg', '800g', 'Copacol', 23, 'Disponível'),
       (29, 'Salmão', 'Filé de salmão importado', 'Açougue E Peixaria', 89.90, '2026-08-08', 'salmao.jpg', '1kg', 'NorFish', 7, 'Poucas unidades'),
       (30, 'Camarão', 'Camarão limpo congelado', 'Açougue E Peixaria', 69.90, '2026-10-15', 'camarao.jpg', '500g', 'Costa Sul', 11, 'Poucas unidades'),

        (31, 'Hambúrguer Bovino', 'Hambúrguer artesanal', 'Congelados', 21.90, '2026-12-10', 'hamburguer.jpg', '672g', 'Seara', 40, 'Disponível'),
        (32, 'Pizza Calabresa', 'Pizza congelada calabresa', 'Congelados', 18.90, '2026-11-18', 'pizza.jpg', '460g', 'Sadia', 25, 'Disponível'),
        (33, 'Lasanha Bolonhesa', 'Lasanha congelada', 'Congelados', 16.50, '2026-10-12', 'lasanha.jpg', '600g', 'Perdigão', 22, 'Disponível'),
        (34, 'Batata Frita', 'Batata pré-frita congelada', 'Congelados', 14.90, '2026-12-01', 'batata-frita.jpg', '1kg', 'McCain', 35, 'Esgotado'),
        (35, 'Sorvete Chocolate', 'Sorvete premium chocolate', 'Congelados', 27.90, '2027-02-15', 'sorvete.jpg', '1.5L', 'Kibon', 14, 'Poucas unidades'),
        (36, 'Açaí Tradicional', 'Açaí congelado', 'Congelados', 19.90, '2027-01-22', 'acai.jpg', '1L', 'Frooty', 18, 'Disponível'),
        (37, 'Nuggets Frango', 'Nuggets crocantes', 'Congelados', 13.90, '2026-12-05', 'nuggets.jpg', '700g', 'Sadia', 41, 'Disponível'),
        (38, 'Pão de Queijo', 'Pão de queijo congelado', 'Congelados', 17.90, '2027-03-01', 'pao-queijo.jpg', '1kg', 'Forno de Minas', 29, 'Disponível'),
        (39, 'Brócolis Congelado', 'Brócolis congelado', 'Congelados', 9.90, '2027-01-18', 'brocolis.jpg', '300g', 'Grano', 16, 'Disponível'),
        (40, 'Polpa de Morango', 'Polpa natural congelada', 'Congelados', 8.50, '2027-04-10', 'polpa.jpg', '400g', 'DaFruta', 19, 'Disponível'),

        (41, 'Leite Integral', 'Leite integral longa vida', 'Frios e Laticínios', 5.99, '2026-11-12', 'leite.jpg', '1L', 'Italac', 100, 'Disponível'),
        (42, 'Leite Desnatado', 'Leite desnatado', 'Frios e Laticínios', 6.20, '2026-11-14', 'leite-desnatado.jpg', '1L', 'Piracanjuba', 67, 'Esgotado'),
        (43, 'Queijo Mussarela', 'Queijo fatiado', 'Frios e Laticínios', 13.50, '2026-08-18', 'mussarela.jpg', '500g', 'Frimesa', 28, 'Disponível'),
        (44, 'Queijo Prato', 'Queijo prato premium', 'Frios e Laticínios', 14.20, '2026-08-20', 'queijo-prato.jpg', '500g', 'Aurora', 21, 'Disponível'),
        (45, 'Iogurte Natural', 'Iogurte integral natural', 'Frios e Laticínios', 4.90, '2026-08-07', 'iogurte-natural.jpg', '170g', 'Nestlé', 17, 'Poucas unidades'),
        (46, 'Requeijão', 'Requeijão cremoso', 'Frios e Laticínios', 9.40, '2026-09-12', 'requeijao.jpg', '200g', 'Catupiry', 33, 'Disponível'),
        (47, 'Cream Cheese', 'Cream cheese tradicional', 'Frios e Laticínios', 11.50, '2026-09-15', 'cream-cheese.jpg', '150g', 'Philadelphia', 14, 'Disponível'),
        (48, 'Margarina', 'Margarina cremosa', 'Frios e Laticínios', 7.90, '2027-01-10', 'margarina.jpg', '500g', 'Qualy', 49, 'Esgotado'),
        (49, 'Presunto Fatiado', 'Presunto cozido', 'Frios e Laticínios', 11.90, '2026-08-10', 'presunto.jpg', '400g', 'Sadia', 20, 'Disponível'),
        (50, 'Peito de Peru', 'Peito de peru defumado', 'Frios e Laticínios', 16.90, '2026-08-11', 'peito-peru.jpg', '300g', 'Perdigão', 12, 'Esgotado'),

        (51, 'Pão Francês', 'Pão francês fresco', 'Padaria e Confeitaria', 14.90, '2026-08-02', 'pao-frances.jpg', '1kg', 'Padaria Central', 30, 'Disponível'),
        (52, 'Pão Integral', 'Pão integral macio', 'Padaria e Confeitaria', 10.90, '2026-08-15', 'pao-integral.jpg', '500g', 'Bauducco', 24, 'Esgotado'),
        (53, 'Bolo de Cenoura', 'Bolo caseiro', 'Padaria e Confeitaria', 24.90, '2026-08-06', 'bolo-cenoura.jpg', '700g', 'Casa Doce', 8, 'Poucas unidades'),
        (54, 'Bolo de Chocolate', 'Bolo recheado', 'Padaria e Confeitaria', 29.90, '2026-08-06', 'bolo-chocolate.jpg', '900g', 'Casa Doce', 10, 'Poucas unidades'),
        (55, 'Croissant', 'Croissant amanteigado', 'Padaria e Confeitaria', 7.90, '2026-08-03', 'croissant.jpg', '120g', 'Padaria Central', 17, 'Esgotado'),
        (56, 'Sonho de Creme', 'Sonho recheado', 'Padaria e Confeitaria', 6.90, '2026-08-03', 'sonho.jpg', '100g', 'Casa Doce', 15, 'Esgotado'),
        (57, 'Rosquinha', 'Rosquinha doce', 'Padaria e Confeitaria', 8.50, '2026-08-10', 'rosquinha.jpg', '300g', 'Panco', 28, 'Disponível'),
        (58, 'Torta de Limão', 'Torta artesanal', 'Padaria e Confeitaria', 32.90, '2026-08-04', 'torta-limao.jpg', '1kg', 'Casa Doce', 6, 'Poucas unidades'),
        (59, 'Donut Chocolate', 'Donut recheado', 'Padaria e Confeitaria', 5.99, '2026-08-03', 'donut.jpg', '90g', 'Sweet Bakery', 19, 'Disponível'),
        (60, 'Cookie Americano', 'Cookie gotas de chocolate', 'Padaria e Confeitaria', 9.90, '2026-08-10', 'cookie.jpg', '200g', 'Bauducco', 25, 'Esgotado'),

        (61, 'Arroz Integral', 'Arroz integral tipo 1', 'Mercearia', 32.90, '2027-05-10', 'arroz-integral.jpg', '5kg', 'Camil', 40, 'Disponível'),
        (62, 'Feijão Carioca', 'Feijão carioca selecionado', 'Mercearia', 8.90, '2027-04-18', 'feijao-carioca.jpg', '1kg', 'Kicaldo', 52, 'Disponível'),
        (63, 'Macarrão Penne', 'Macarrão grano duro', 'Mercearia', 6.50, '2027-03-10', 'macarrao-penne.jpg', '500g', 'Renata', 60, 'Disponível'),
        (64, 'Molho de Tomate', 'Molho tradicional', 'Mercearia', 4.90, '2027-02-01', 'molho.jpg', '340g', 'Quero', 70, 'Disponível'),
        (65, 'Açúcar Refinado', 'Açúcar refinado especial', 'Mercearia', 5.99, '2027-06-20', 'acucar.jpg', '1kg', 'União', 80, 'Esgotado'),
        (66, 'Sal Refinado', 'Sal refinado iodado', 'Mercearia', 2.99, '2028-01-01', 'sal.jpg', '1kg', 'Cisne', 90, 'Disponível'),
        (67, 'Farinha de Trigo', 'Farinha especial', 'Mercearia', 6.80, '2027-05-11', 'farinha.jpg', '1kg', 'Dona Benta', 44, 'Disponível'),
        (68, 'Achocolatado', 'Achocolatado em pó', 'Mercearia', 12.90, '2027-08-12', 'achocolatado.jpg', '800g', 'Nescau', 39, 'Esgotado'),
        (69, 'Biscoito Recheado', 'Biscoito chocolate', 'Mercearia', 4.50, '2027-01-15', 'biscoito.jpg', '140g', 'Trakinas', 57, 'Disponível'),
        (70, 'Granola', 'Granola tradicional', 'Mercearia', 14.90, '2027-07-10', 'granola.jpg', '500g', 'Mãe Terra', 20, 'Disponível'),

        (71, 'Coca-Cola Zero', 'Refrigerante zero açúcar', 'Bebidas', 10.99, '2027-02-12', 'coca-zero.jpg', '2L', 'Coca-Cola', 45, 'Esgotado'),
        (72, 'Guaraná Antarctica', 'Refrigerante guaraná', 'Bebidas', 9.90, '2027-02-15', 'guarana.jpg', '2L', 'Antarctica', 51, 'Disponível'),
        (73, 'Suco Uva', 'Suco integral de uva', 'Bebidas', 13.90, '2026-12-10', 'suco-uva.jpg', '1L', 'Del Valle', 33, 'Disponível'),
        (74, 'Chá Gelado', 'Chá sabor pêssego', 'Bebidas', 6.90, '2027-01-20', 'cha.jpg', '1.5L', 'Leão', 29, 'Disponível'),
        (75, 'Água com Gás', 'Água mineral gaseificada', 'Bebidas', 3.50, '2028-03-10', 'agua-gas.jpg', '500ml', 'Crystal', 66, 'Disponível'),
        (76, 'Energético Tropical', 'Energético sabor tropical', 'Bebidas', 11.90, '2027-06-12', 'energetico-tropical.jpg', '473ml', 'Monster', 14, 'Poucas unidades'),
        (77, 'Cerveja Sem Álcool', 'Cerveja pilsen sem álcool', 'Bebidas', 5.99, '2027-04-18', 'cerveja-zero.jpg', '350ml', 'Heineken', 42, 'Esgotado'),
        (78, 'Água de Coco', 'Água de coco natural', 'Bebidas', 7.50, '2026-10-10', 'agua-coco.jpg', '1L', 'Kero Coco', 24, 'Esgotado'),
        (79, 'Café Gelado', 'Bebida café pronta', 'Bebidas', 9.50, '2027-03-10', 'cafe-gelado.jpg', '250ml', '3 Corações', 17, 'Disponível'),
        (80, 'Vitamina Proteica', 'Bebida proteica chocolate', 'Bebidas', 12.90, '2027-01-12', 'vitamina.jpg', '250ml', 'Piracanjuba', 15, 'Poucas unidades'),

        (81, 'Sabão Líquido', 'Sabão líquido roupas', 'Higiene e Limpeza', 19.90, '2028-01-10', 'sabao-liquido.jpg', '2L', 'OMO', 30, 'Disponível'),
        (82, 'Amaciante', 'Amaciante concentrado', 'Higiene e Limpeza', 16.50, '2028-03-15', 'amaciante.jpg', '2L', 'Comfort', 28, 'Disponível'),
        (83, 'Desinfetante', 'Desinfetante floral', 'Higiene e Limpeza', 7.90, '2027-12-10', 'desinfetante.jpg', '1L', 'Veja', 50, 'Disponível'),
        (84, 'Limpador Multiuso', 'Limpador multiuso', 'Higiene e Limpeza', 8.50, '2027-11-10', 'multiuso.jpg', '500ml', 'Veja', 35, 'Disponível'),
        (85, 'Esponja', 'Esponja dupla face', 'Higiene e Limpeza', 3.20, '2029-01-01', 'esponja.jpg', '1un', 'Scotch-Brite', 90, 'Esgotado'),
        (86, 'Creme Dental', 'Creme dental menta', 'Higiene e Limpeza', 6.99, '2028-04-10', 'creme-dental.jpg', '90g', 'Colgate', 64, 'Disponível'),
        (87, 'Escova Dental', 'Escova macia', 'Higiene e Limpeza', 8.90, '2029-01-01', 'escova.jpg', '1un', 'Oral-B', 43, 'Disponível'),
        (88, 'Desodorante Aerosol', 'Desodorante masculino', 'Higiene e Limpeza', 15.90, '2028-06-12', 'desodorante.jpg', '150ml', 'Rexona', 26, 'Disponível'),
        (89, 'Papel Toalha', 'Papel toalha dupla folha', 'Higiene e Limpeza', 9.50, '2029-01-01', 'papel-toalha.jpg', '2rolos', 'Snob', 37, 'Disponível'),
        (90, 'Álcool Gel', 'Álcool gel antisséptico', 'Higiene e Limpeza', 12.50, '2028-08-08', 'alcool-gel.jpg', '500ml', 'Asseptgel', 21, 'Disponível'),

        (91, 'Paçoca', 'Paçoca tradicional', 'Mercearia', 7.90, '2027-05-10', 'pacoca.jpg', '500g', 'Paçoquita', 48, 'Disponível'),
        (92, 'Canjica', 'Canjica branca premium', 'Mercearia', 6.50, '2027-07-12', 'canjica.jpg', '500g', 'Yoki', 36, 'Disponível'),
        (93, 'Pipoca', 'Milho para pipoca', 'Mercearia', 5.20, '2027-09-18', 'pipoca.jpg', '500g', 'Yoki', 55, 'Disponível'),
        (94, 'Amendoim Torrado', 'Amendoim torrado salgado', 'Mercearia', 8.99, '2027-04-20', 'amendoim.jpg', '400g', 'Elma Chips', 27, 'Disponível'),
        (95, 'Milho Verde', 'Milho verde em conserva', 'Mercearia', 4.80, '2027-08-10', 'milho.jpg', '200g', 'Quero', 50, 'Disponível'),
        (96, 'Leite Condensado', 'Leite condensado integral', 'Mercearia', 7.40, '2027-02-15', 'leite-condensado.jpg', '395g', 'Moça', 45, 'Disponível'),
        (97, 'Creme de Leite', 'Creme de leite tradicional', 'Mercearia', 4.50, '2027-03-11', 'creme-leite.jpg', '200g', 'Nestlé', 58, 'Disponível'),
        (98, 'Coco Ralado', 'Coco ralado úmido', 'Mercearia', 6.90, '2027-05-22', 'coco-ralado.jpg', '100g', 'Sococo', 34, 'Disponível'),
        (99, 'Doce de Leite', 'Doce de leite cremoso', 'Mercearia', 12.90, '2027-07-18', 'doce-leite.jpg', '400g', 'Viçosa', 18, 'Esgotado'),
        (100, 'Chocolate em Barra', 'Chocolate ao leite', 'Mercearia', 8.90, '2027-10-10', 'chocolate.jpg', '90g', 'Lacta', 60, 'Disponível');
