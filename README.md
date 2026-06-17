# Passaporte.io

Sistema web desenvolvido em Laravel para gerenciamento de eventos, inscrições e geração de ingressos digitais.

---

## Tecnologias Utilizadas

* PHP 8.3
* Laravel 13
* SQLite
* Laravel Breeze
* Tailwind CSS
* Simple QR Code

---

## Funcionalidades

### Visitante

* Visualizar eventos disponíveis
* Filtrar eventos por categoria
* Visualizar detalhes de eventos
* Criar conta
* Fazer login

### Participante

* Inscrever-se em eventos
* Receber ingresso digital
* Visualizar QR Code do ingresso
* Cancelar inscrição
* Consultar histórico de ingressos
* Dashboard do participante

### Organizador

* Criar eventos
* Editar eventos
* Excluir eventos
* Upload de banner
* Dashboard do organizador
* Check-in de participantes
* Controle de vagas

---

## Requisitos

* PHP 8.3 ou superior
* Composer
* Node.js
* NPM

---

## Instalação

Clone o projeto:

```bash
git clone https://github.com/MrLusky/Passaporte.io.git
```

Entre na pasta:

```bash
cd passaporte
```

Instale as dependências PHP:

```bash
composer install
```

Instale as dependências JavaScript:

```bash
npm install
```

Copie o arquivo de ambiente:

```bash
copy .env.example .env
```

Gere a chave da aplicação:

```bash
php artisan key:generate
```

---

## Banco de Dados

O projeto utiliza SQLite.

Crie o arquivo:

```txt
database/database.sqlite
```

Depois execute:

```bash
php artisan migrate:fresh --seed
```

---

## Storage

Crie o link simbólico:

```bash
php artisan storage:link
```

---

## Compilar os Assets

```bash
npm run build
```

Durante o desenvolvimento:

```bash
npm run dev
```

---

## Executar o Projeto

```bash
php artisan serve
```

Acesse:

```txt
http://127.0.0.1:8000
```

---

## Usuários de Teste

### Organizador

Email:

```txt
organizer@passaporte.com
```

Senha:

```txt
12345678
```

### Participante

Email:

```txt
participant@passaporte.com
```

Senha:

```txt
12345678
```

---

## Estrutura do Projeto

### Perfis

* Participante
* Organizador

### Principais Módulos

* Autenticação
* Eventos
* Categorias
* Inscrições
* Ingressos
* QR Code
* Check-in
* Dashboards

---

## Autor

Lucas Daniel de Araujo Pereira

Projeto desenvolvido para fins acadêmicos na disciplina de Programação Web III.
