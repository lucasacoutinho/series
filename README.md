# Agregador de series

## Instalação

1. Instale as dependencias do projeto utilizando o composer
```
composer i
```
2. Copie o arquivo .env.example para .env
```
cp .env.example .env
```

3. Gere uma chave da aplicação Laravel
```
php artisan key:generate
```
4. Recomendo que crie um banco de dados para testes com o nome series_testes, para alteração do banco de dados de testes altere DB_DATABASE no arquivo phpunit.xml

5. Para rodar os testes da aplicação utilize o comando
```
php artisan test
```



## Dependencias
- composer
- PHP 7
