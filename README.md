# Teste Nofaro Laravel

### Pré requisitos


Antes de começar, você vai precisar rodar o comando composer install para instalar todas as dependência para gerar a hash:

> $ Composer install

### Como acessar a rota de gerar uma hash ###

#### Para acessar a rota de gerar uma hash necessita passar o seguinte endpoint: ####
> POST host:porta//api/hash
#### Segue abaixo exemplo: ####
![picture alt](https://github.com/GabrielOliveira01/nofaro/blob/main/Captura%20de%20Tela%202021-06-07%20às%2010.56.44.png)

### Como rodar o command laravel para a criação da hash e salvar ela no banco de dados ###

#### Para rodar o command precisa passar as seguintes instruções:

> $ php artisan nofaro:test nofaro --requests=5

#### Segue abaixo exemplo: ####

![picture alt](https://github.com/GabrielOliveira01/nofaro/blob/main/Captura%20de%20Tela%202021-06-07%20às%2011.01.52.png)

### Como consultar as hashs salvas no banco de dados ###

#### Consultar a rota para trazer as hashs salvas precisa chamar o seguinte endpoint: ####

> GET host:porta//api/hash

#### Segue abaixo exemplo: ####

![picture alt](https://github.com/GabrielOliveira01/nofaro/blob/main/Captura%20de%20Tela%202021-06-07%20às%2011.15.58.png)

#### Nesse endpoint pode passar alguns filtros na query da requisição ####

#### Segue abaixo exemplo: ####

![picture alt](https://github.com/GabrielOliveira01/nofaro/blob/main/Captura%20de%20Tela%202021-06-07%20às%2011.22.22.png) 
