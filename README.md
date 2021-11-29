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
4. Gere uma chave da jwt
```
php artisan jwt:secret
```
5. Recomendo que crie um banco de dados para testes com o nome series_testes, para alteração do nome do banco de dados de testes altere a variável DB_DATABASE no arquivo phpunit.xml

6. Para rodar os testes da aplicação utilize o comando
```
php artisan test
```

## Dependencias
- Composer
- PHP 7
- MySQL
