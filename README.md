Olá, tudo bem?

Requisitos:

1. PHP 7;
2. Composer;
3. IDE (VS Code, PHP Storm, etc).

-> Para começar a usar a API, faça o clone do repositório em uma pasta qualquer do seu computador.

-> Após isso, abra a devida pasta com o terminal de comando ou o VSCode.

-> Então, crie um banco de dados em seu MySQL chamado escola_api.

O arquivo .env já está configurado com minhas credenciais, que são:

User: root
Password: root

Caso as suas credenciais de acesso do MYSQL sejam diferentes, altere no arquivo .env em:

DB_USERNAME=root
DB_PASSWORD=root

Após isso, gere a migrate com o comando no terminal:

php artisan migrate

Logo após esse comando, popule a tabela de Users e Alunos com o comando:

php artisan db:seed

Feito tudo isso, execute o servidor com o comando: php artisan serve

Pronto, a API está funcionando e aguardando requisições do nosso aplicativo React!
