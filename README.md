# 🏥 Clínica Geral - Sistema Web

Sistema desenvolvido em **PHP**, **MySQL**, **Bootstrap 5**, **jQuery** e **AdminLTE**, com foco no gerenciamento de uma clínica médica.

O projeto possui autenticação, controle de usuários, gerenciamento administrativo e sistema de agendamento de consultas, exames e cirurgias.

---

# Tecnologias

- PHP 8+
- MySQL
- Bootstrap 5
- jQuery
- AdminLTE 4
- HTML5
- CSS3
- JavaScript

---

# Funcionalidades

## Área Pública

- Página inicial
- Sobre
- Serviços
- Consultas
- Exames
- Cirurgias
- Unidades
- Clientes
- Contato
- Pesquisa de serviços
- Comentários aprovados

---

## Área do Cliente

- Cadastro
- Login
- Perfil
- Agendamento de consultas, exames e cirurgias
- Cancelamento de agendamentos
- Visualização dos próprios agendamentos

---

## Área Administrativa

- Dashboard
- Cadastro de serviços
- Gerenciamento de serviços
- Gerenciamento de unidades
- Gerenciamento de comentários
- Gerenciamento de agendamentos
- Controle de acesso por perfil

---

# Sistema de Agendamentos

O sistema realiza automaticamente:

- seleção da unidade;
- verificação dos dias de funcionamento;
- verificação do horário de funcionamento;
- bloqueio de horários já ocupados;
- liberação automática de horários cancelados ou concluídos;
- gerenciamento completo pelo administrador.

Status disponíveis:

- Pendente
- Confirmado
- Cancelado
- Concluído

---

# Estrutura do Projeto

```
ClinicaPHP/

├── admin/
├── auth/
├── cliente/
├── config/
├── database/
│   ├── agendamentos/
│   ├── comentarios/
│   ├── helpers/
│   ├── servicos/
│   ├── unidades/
│   └── usuarios/
├── js/
├── partials/
├── paginas/
├── projeto-upload/
└── uploads/
```

---

# Organização adotada

O projeto foi organizado utilizando separação por responsabilidade.

- **admin/** → funcionalidades administrativas
- **cliente/** → funcionalidades exclusivas do cliente
- **database/** → regras de negócio e acesso ao banco
- **partials/** → componentes reutilizados
- **auth/** → autenticação e controle de acesso
- **helpers/** → funções auxiliares

---

# Perfis de Usuário

## Administrador

- gerencia serviços;
- gerencia unidades;
- gerencia comentários;
- gerencia agendamentos.

## Cliente

- realiza agendamentos;
- consulta seus próprios agendamentos;
- cancela agendamentos.

---

# Banco de Dados

O banco acompanha o projeto através do arquivo SQL.

Principais tabelas:

- usuarios
- servicos
- unidades
- comentarios
- agendamentos

---

# Instalação

1. Clone o repositório

```
git clone <url>
```

2. Coloque o projeto dentro do:

```
xampp/htdocs/
```

3. Importe o banco de dados.

4. Configure as credenciais do banco em:

```
config/database.php
```

5. Inicie:

- Apache
- MySQL

6. Acesse:

```
http://localhost/ClinicaPHP
```

---

# Usuários de Teste

Administrador

```
E-mail:
admin@clinica.com

Senha:
senha123
```

Cliente

```
E-mail:
cliente@clinica.com

Senha:
senha123
```

---

Desenvolvido para fins acadêmicos.