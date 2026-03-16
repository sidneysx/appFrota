# 🚗 AppFrota

Sistema web desenvolvido em **Laravel** para gerenciamento de veículos, multas e revisões de uma frota.

O sistema permite cadastrar veículos, controlar revisões e registrar multas, facilitando o acompanhamento da situação da frota de forma simples e organizada.

---

# 📋 Funcionalidades

* Cadastro de veículos
* Controle de revisões
* Registro de multas
* Upload de imagens dos veículos
* Interface simples para gerenciamento da frota

---

# 👤 Usuários de Acesso

## 🔑 Administrador

Acesso completo ao sistema.

**Email**

```
user_admin@teste.com
```

**Senha**

```
12345678
```

---

## 🚨 Usuário de Multas

Responsável por registrar e gerenciar multas.

**Email**

```
user_multas@teste.com
```

**Senha**

```
12345678
```

---

## 📊 Usuário de Controle

Responsável pelo acompanhamento e controle da frota.

**Email**

```
user_controle@teste.com
```

**Senha**

```
12345678
```

---

# ⚙️ Tecnologias Utilizadas

* PHP
* Laravel
* Blade
* PostgreSQL
* TailwindCSS
* JavaScript

---

# 🚀 Como rodar o projeto

### 1️⃣ Clonar o repositório

```bash
git clone https://github.com/sidneysx/appFrota.git
```

### 2️⃣ Entrar na pasta

```bash
cd appFrota
```

### 3️⃣ Instalar dependências

```bash
composer install
```

### 4️⃣ Criar arquivo `.env`

```bash
cp .env.example .env
```

### 5️⃣ Gerar chave do sistema

```bash
php artisan key:generate
```

### 6️⃣ Rodar as migrations

```bash
php artisan migrate
```

### 7️⃣ Criar link do storage

```bash
php artisan storage:link
```

### 8️⃣ Iniciar servidor

```bash
php artisan serve
```

---

# 📂 Estrutura principal

```
app/
resources/views/
routes/
database/migrations/
public/
```

---

# 👨‍💻 Desenvolvedor

Desenvolvido por **Sidney Silva de Sousa**
💻 Desenvolvedor **Junior**

---

# 📄 Licença

Projeto desenvolvido para fins acadêmicos utilizando Laravel.
