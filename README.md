# MVC User Application

Uma aplicação simples em PHP, utilizando MVC e Orientação a Objetos para a criação de um CRUD de usuários com autenticação.

# Instalação

Requerer uma versão do PHP 5.6+, MySQL e o Composer instalados. O Apache foi utilizado para a utilização do `mod_rewrite` para gerenciamento das urls amigáveis.

Clone o repositório dentro da sua pasta do Apache ou crie um virtual host.

```sh
$ cd php-user-crud
$ composer dump-autoload
```

Crie um banco de dados no MySQL e importe o arquivo `sql/table.sql`. Irei demonstrar acessando o mysql via sh, mas sinta-se a vontade para usar qualquer outra ferramenta como phpMyAdmin ou MySQLWorkBench

```sh
mysql> use db_name;
mysql> source sql/table.sql;
```

Caso você deseje popular com algumas informações de usuários, você também pode importar o `sql/insert.sql`

Pronto, agora só o que falta fazer é alterar o arquivo de configuração para criar o acesso ao banco de dados. O arquivo está em `app/config/config.php`

```php
// Database connection
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'php-app');

// URL of the application
define('URL', "http://localhost/php-app/");
```

Altere também a URL, que será usada para geração dos links e redirects.
