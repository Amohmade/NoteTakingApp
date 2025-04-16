# 📝 Symfony Note-Taking App

A simple note management web application built with **Symfony 7**, **Doctrine ORM**, **Twig**, and **Bootstrap 5**.

---

## ⚙️ Requirements

- PHP 8.1 or higher
- Composer
- MySQL or SQLite
- Node.js + Yarn *(for assets like Bootstrap)*
- Symfony CLI *(recommended)*

---

## 🚀 Installation

```bash
git clone https://github.com/Amohmade/NoteTakingApp.git
cd notetakingapp

composer install
cp .env .env.local  # then configure DATABASE_URL for your MySQL
symfony console doctrine:database:create
symfony console doctrine:migrations:migrate

yarn install
symfony server:start
```

---

## 🧩 Features

- CRUD (Create, Read, Update, Delete) notes

---

## 🛠 Configuration

### Database

Configure your database in `.env.local`:
```dotenv
DATABASE_URL="mysql://root:password@127.0.0.1:3306/notes?serverVersion=8.0.32"
```

## ✅ Commands

```bash
php bin/console make:entity
php bin/console make:form
php bin/console make:controller
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

---

## 🌐 Deployment

> Update `.env.local` for production and run:

```bash
composer install --no-dev --optimize-autoloader
php bin/console cache:clear --env=prod
```

---

## 👨‍💻 Author

Built by Mohamed Hassouba (https://github.com/Amohmade) – 2025

