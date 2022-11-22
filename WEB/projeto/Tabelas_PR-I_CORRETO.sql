CREATE TABLE doador (

		CodDoador serial,
		cpf int,
		nome varchar (50),
		telefone int,
		rua varchar (50),
		numero int,
		bairro varchar (15),
	    dataCadastro varchar(10),
	
	CONSTRAINT pk_doadores
	primary key(CodDoador)
	
);

----------------------------------------------

CREATE TABLE produtos (

		codProdutos serial,
		tipo varchar (20),
		produto varchar (30),
		quantidade varchar(20),
	
	CONSTRAINT pk_produtos
	primary key(codProdutos)

);

---------------------------------------------
CREATE TABLE doacao (

		codDoacao serial,
		nomeDoador varchar(50),
		CodDoador int,
		codProdutos int,
		data varchar(10),
		tipoDoacao varchar(30),
	
	CONSTRAINT pk_doacao
	primary key(codDoacao),
	
	constraint fk_doacao_doador foreign key(CodDoador) references doador(CodDoador),
	constraint fk_doacao_produtos foreign key(codProdutos) references produtos(codProdutos)

);

---------------------------------------------

INSERT INTO produtos VALUES
(default,'Comida','Arroz','5Kg'),
(default,'Comida','Feijão','1Kg'),
(default,'Comida','Sal','1Kg'),
(default,'Comida','Açúcar','2Kg'),
(default,'Comida','Café','1Kg'),
(default,'Comida','Vinagre','1L'),
(default,'Comida','Leite','1L'),
(default,'Comida','Óleo','1L'),
(default,'Comida','Farinha de trigo','1Kg'),
(default,'Prod de Higiene','Sabonete','un'),
(default,'Prod de Higiene','Álcool em Gel','un'),
(default,'Prod de Higiene','Desodorante','un'),
(default,'Prod de Higiene','Escova de Dentes','un'),
(default,'Prod de Higiene','Creme Dental','un'),
(default,'Prod de Higiene','Fralda Griátrica','embalagem'),
(default,'Prod de Higiene','Papel Higiênico','embalagem'),
(default,'Prod de Higiene','Cotonetes','embalagem'),
(default,'Prod de Higiene','Mascara Descartavél','un'),
(default,'Prod de Higiene','Talco','embalagem'),
(default,'Prod de Higiene','Hidratante','embalagem'),
(default,'Prod de Higiene','Luva Descartavél','un'),
(default,'Prod de Limpeza','Ácool','1L'),
(default,'Prod de Limpeza','Desinfetante','1L'),
(default,'Prod de Limpeza','Amaciante','1L'),
(default,'Prod de Limpeza','Sabão em pó','embalagem'),
(default,'Prod de Limpeza','Sabão em Barra','un'),
(default,'Prod de Limpeza','Água Sanitária','1L'),
(default,'Prod de Limpeza','Sabão Neutro','1L'),
(default,'Prod de Limpeza','Alvejante','1L'),
(default,'Prod de Limpeza','Luvas de Borracha','un'),
(default,'Prod de Limpeza','Pano de Chão','un'),
(default,'Prod de Limpeza','Guardanapo','un'),
(default,'Prod de Limpeza','Multiuso','un'),
(default,'Prod de Limpeza','Desingordurante','un'),
(default,'Dinheiro','R$02,00','$'),
(default,'Dinheiro','R$05,00','$'),
(default,'Dinheiro','R$10,00','$'),
(default,'Dinheiro','R$20,00','$'),
(default,'Dinheiro','R$50,00','$'),
(default,'Dinheiro','R$100,00','$'),
(default,'Dinheiro','R$200,00','$'),
(default,'Dinheiro','R$500,00','$'),
(default,'Dinheiro','R$1.000,00','$'),
(default,'Dinheiro','R$2.000,00','$');
 
---------------------------------------------------------

SELECT * FROM doador;
SELECT * FROM doacao;
SELECT * FROM produtos;







