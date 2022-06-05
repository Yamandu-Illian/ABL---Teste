# ABL---Teste
![image](https://user-images.githubusercontent.com/79177690/172066807-75a46587-12b6-43d5-b8f1-620b2dbb99ca.png)
> Situação: finalizado!

### Sistema para gerenciamento de moradores de um condomínio

#### Para o desenvolvimento do CRUD di sistemas foram utilizadas duas tabelas:

Morador         |
-------------   |
id              |
cpf             |
nome            |
telefone        |
rg              |
data_nascimento |
email           |

Apartamento     | 
-------------   |
id              |
numero          |
aluguel         |
torre           |
fk_morador      |

-----------------------------------

><strong>Tecnologias usadas</strong>
<table>
   <tr>
     <td><strong>Tecnologia</strong></td>
     <td>PHP</td>
     <td>MySQL</td>
     <td>Composer</td>
     <td>HTML</td>
     <td>Bootstrap</td>
   </tr>
   <tr>
     <td><strong>Versão</strong></td>
     <td>8.0</td>
     <td>8.0</td>
     <td>2.3</td>
     <td>5</td>
     <td>5.0</td>
   </tr>
</table>

## Como executar o código:
1. Certifique-se de ter o PHP, MySQL e o Composer instalados no seu dispositivo
2. Abra o SGBD execute o seguinte código SQL:
``` 
  CREATE DATABASE condominio DEFAULT CHARACTER SET utf8;
  USE condominio;

  CREATE TABLE morador(
    id INT NOT NULL AUTO_INCREMENT,
    cpf CHAR(11) NOT NULL,
    nome VARCHAR(100) NOT NULL,    
    telefone CHAR(11) NOT NULL,    
    rg CHAR(7) NOT NULL,
    data_nascimento DATE NOT NULL,
    email VARCHAR(150) NOT NULL,
    PRIMARY KEY(id)
  ) ENGINE = InnoDB;

  CREATE TABLE apartamento(
    id INT NOT NULL AUTO_INCREMENT,
    numero INT NOT NULL,
    aluguel DECIMAL(6,2) NOT NULL,
    torre VARCHAR(100) NOT NULL,
    fk_morador INT DEFAULT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (fk_morador) REFERENCES morador(id)
  ) ENGINE = InnoDB;
```
3. Baixe a pasta do projeto
4. Execute o projeto em algum navegador
#### OBS.:
##### Caso tenha algum problema com a conexão do banco de dados, siga as instruções:
+ A conexão com o banco de dados foi feita na classe __BancoDeDados__ uma função chamada __setConnection__
+ Na classe você encontrará as variáveis __HOST, NAME, USER, PASSWORD__, cada uma com um comentário explicando suas respectivas funções
+ Se necessário, altere os valores das várias para que a conexão seja realizada com o seu banco de dados
