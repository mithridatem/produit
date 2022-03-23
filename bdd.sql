create database product;
use product;
CREATE TABLE product(
        id_prod      Int  Auto_increment  NOT NULL ,
        name_prod    Varchar (50) NOT NULL ,
        content_prod Text NOT NULL ,
        visible_prod TinyINT NOT NULL
	,CONSTRAINT product_PK PRIMARY KEY (id_prod)
)ENGINE=InnoDB;