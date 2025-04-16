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

## 🧭 Routes

| Method | Path               | Name         | Description           |
|--------|--------------------|--------------|-----------------------|
| GET    | /note              | note_index   | List all notes        |
| GET    | /note/new          | note_new     | Create a new note     |
| GET    | /note/{id}         | note_show    | Show single note      |
| GET    | /note/{id}/edit    | note_edit    | Edit a note form      |
| POST   | /note/{id}/delete  | note_delete  | Delete a note         |

---

## 🛠 Configuration

### Database

Configure your database in `.env.local`:
```dotenv
DATABASE_URL="mysql://root:password@127.0.0.1:3306/notes?serverVersion=8.0.32"
```

## ✅ Commands

```bash
symfony console make:entity
symfony console make:form
symfony console make:controller
symfony console make:migration
symfony console doctrine:migrations:migrate
```
---

## 👨‍💻 Author

Built by Mohamed Hassouba (https://github.com/Amohmade) – 2025

