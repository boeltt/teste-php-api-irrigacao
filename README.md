# API de controle de usuários, pivôs e irrigações.
## Tecnologias utilizadas:
- PHP 8.4.11
- Composer
- Laravel 11
- SQLite
---
## Instruções de configuração
1. Clonar o repositório
`git clone https://github.com/boeltt/teste-php-api-irrigacao.git`

2. Instalar dependências
`composer install`

3. Copiar o .env
`cp .env.example .env`

4. Gerar chave jwt da aplicação
`php artisan key:generate`

5. Configurar o SQLite no .env\
DB_CONNECTION=sqlite\
DB_DATABASE=database/database.sqlite

SESSION_DRIVER=file

7. Rodar as migrations
`php artisan migrate
---
## Testes
> Eu usei o Insomnia para testar, dito isso, vou deixar as instruções de como fiz os testes
> Para executar os testes é necessário rodar o comando `php artisan serve` e acessar o localhost:8000
### POST /api/auth/register
{
  "username": "rafael",
  "password": "123456"
}
### POST /api/auth/login
{
  "username": "rafael",
  "password": "123456"
}

---
> **A partir daqui precisa adicionar o header "Authorization" contendo "Bearer TOKEN", sendo esse token o resultado no login**
> Não usar/errar esse token funciona pra testar as rotas protegidas

### POST /api/pivots
{
  "description": "Pivô A",
  "flowRate": 180.0,
  "minApplicationDepth": 6.0
}
### GET /api/pivots
> Substituir IDPIVO abaixo pelo id resultante do GET ou na hora de registrar
### GET /api/pivots/IDPIVO
### PUT /api/pivots/IDPIVO
{
  "description": "Pivô Atualizado",
  "flowRate": 150.5
}
### DELETE /api/pivots/IDPIVO
---
### POST /api/irrigations
{
  "pivot_id": "UUID_DO_PIVO",
  "applicationAmount": 20.0,
  "irrigationDate": "2025-07-01T10:00:00Z"
}
### GET /api/irrigations
> Aqui se aplica a mesma coisa do IDPIVO para IDIRRIGACAO
### GET /api/irrigations/IDIRRIGACAO
### DELELTE /apip/irrigation/IDIRRIGACAO
