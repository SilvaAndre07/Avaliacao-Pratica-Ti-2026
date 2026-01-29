# Portal Startups 

Projeto institucional simples desenvolvido em **Laravel**, com o objetivo de **registrar startups** e **exibir uma lista pública** dessas startups por meio de uma **API REST**.  
O sistema foi criado para **fins educacionais e de prática**, simulando um cenário real de aplicações institucionais.

---

## 🛠️ Tecnologias Utilizadas

- PHP 8.1 ou superior
- Laravel 10 / 11
- PostgreSQL
- Tailwind CSS (via CDN)
- JavaScript (Fetch API)
- API REST com retorno em JSON

---

## 📌 Funcionalidades

- Cadastro de startups via API REST
- Listagem pública de startups
- Atualização da listagem sem necessidade de recarregar a página
- Interface simples, responsiva e institucional

---


---

## ⚙️ Configuração do Ambiente Local

Este projeto pode ser executado localmente seguindo os passos descritos abaixo.  
Certifique-se de possuir **PHP 8.1 ou superior**, **Composer** e **PostgreSQL** instalados em sua máquina.

**1. Clonagem do repositório**

Clone o repositório do projeto e acesse o diretório criado:
git clone https://github.com/SilvaAndre07/Avaliacao-Pratica-Ti-2026
cd ./Avaliacao-Pratica-Ti-2026/

**2. Instalação das dependências**

Instale as dependências do projeto utilizando o Composer:
composer install

**3. Criação do arquivo de ambiente**

Crie o arquivo de configuração do ambiente copiando o arquivo de exemplo:
cp .env.example .env

**4. Configuração do banco de dados**

Abra o arquivo `.env` e configure as variáveis de conexão com o banco de dados PostgreSQL conforme o seu ambiente local:

DB_CONNECTION=pgsql  
DB_HOST=127.0.0.1  
DB_PORT=5432  
DB_DATABASE=laravel
DB_USERNAME=postgres  
DB_PASSWORD=sua_senha

Certifique-se de que o banco de dados informado já exista no PostgreSQL antes de continuar.

**5. Geração da chave da aplicação**

Gere a chave da aplicação Laravel:
php artisan key:generate

**6. Execução das migrações**

Crie as tabelas necessárias no banco de dados:
php artisan migrate

**7. Dados de teste (opcional)**

Caso deseje popular o banco de dados com registros fictícios para testes locais:
php artisan db:seed

**8. Inicialização do servidor**

Inicie o servidor de desenvolvimento do Laravel:
php artisan serve

Após a inicialização, a aplicação estará disponível no endereço:

http://localhost:8000

## 🌐 Rotas da Aplicação

A aplicação é composta por **rotas de front-end** e **rotas de API**, organizadas de forma a separar claramente a camada de visualização da camada de dados.

### 🖥️ Rotas de Front-end (Web)

As rotas de front-end são responsáveis pela exibição das páginas da aplicação e estão definidas no arquivo `routes/web.php`. Essas rotas retornam **views Blade** e são acessadas diretamente pelo navegador.

Rotas disponíveis:
- **/**  
  Página inicial da aplicação. Exibe a listagem pública de startups cadastradas.
- **/startups/create**  
  Página destinada ao cadastro de novas startups.

Essas rotas não realizam operações diretas no banco de dados, apenas consomem a API por meio de requisições assíncronas.

---

### 🔌 Rotas de API (REST)

As rotas de API estão definidas no arquivo `routes/api.php` e são responsáveis pela **entrada e saída de dados** no formato **JSON**. Elas são consumidas pelo front-end utilizando JavaScript (Fetch API).

Rotas disponíveis:
- **GET /api/startups**  
  Retorna a lista completa de startups cadastradas.
- **POST /api/startups**  
  Recebe os dados de uma startup e realiza o cadastro no banco de dados.

As rotas de API são **stateless**, não utilizam sessões e não possuem autenticação por padrão, sendo adequadas para consumo por aplicações front-end ou integrações futuras.

---

## 🔐 LGPD — Lei Geral de Proteção de Dados Pessoais

Este projeto realiza a coleta e o armazenamento de dados pessoais, especificamente o **endereço de e-mail de contato** informado no momento do cadastro da startup.

Mesmo tratando-se de um projeto de caráter educacional, os princípios da **Lei Geral de Proteção de Dados Pessoais (Lei nº 13.709/2018)** são considerados como referência para o tratamento das informações.

**Natureza dos dados coletados**

O único dado pessoal coletado é o e-mail de contato da startup, utilizado para identificação e comunicação institucional. Nenhum outro dado pessoal sensível é solicitado ou armazenado pelo sistema.

**Finalidade do tratamento**

O e-mail de contato é coletado com a finalidade exclusiva de permitir o contato institucional com a startup cadastrada e de exibir uma informação básica de contato na listagem pública do sistema. Os dados não são utilizados para fins comerciais, publicitários ou de marketing.

**Base legal para o tratamento**

O tratamento dos dados pode se enquadrar nas seguintes bases legais previstas na LGPD:
- Consentimento do titular dos dados, conforme Art. 7º, inciso I
- Legítimo interesse do controlador, quando aplicável, conforme Art. 7º, inciso IX

**Boas práticas adotadas**

A aplicação adota o princípio da minimização de dados, coletando apenas as informações estritamente necessárias para o funcionamento do sistema. Os dados não são compartilhados com terceiros e não são utilizados para qualquer tipo de processamento automatizado ou envio de comunicações em massa.

**Recomendações para ambiente de produção**

Caso este projeto seja evoluído para uso em ambiente real, recomenda-se a adoção de medidas adicionais, como a disponibilização de uma Política de Privacidade clara, a possibilidade de solicitação de exclusão ou atualização dos dados pelo titular, a implementação de controles de acesso e a limitação do acesso aos dados apenas a usuários autorizados.

**Aviso importante**

Este projeto foi desenvolvido para fins educacionais e de prática. A utilização em ambiente de produção exige análise jurídica específica e adequações técnicas adicionais para plena conformidade com a LGPD.


