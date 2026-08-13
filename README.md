# CMS Portal — Core PHP MVC Content Management System

Production-ready CMS built with **Core PHP 8.2+**, MVC architecture, MySQL (PDO), Bootstrap 5 admin, and a dynamic public frontend.

## Requirements

- XAMPP / PHP 8.2+ (PDO MySQL, mbstring, openssl, fileinfo, gd, zip)
- MySQL 5.7+ / MariaDB 10.3+
- Apache with `mod_rewrite`

## Installation

1. Place the project in `C:\xampp\htdocs\p` (or update `BASE_PATH` and `config/app.php` `url`).
2. Configure database in `config/database.php` (default: `cms_portal`, user `root`, empty password).
3. Install Composer dependencies:

```bash
C:\xampp\php\php.exe composer.phar install
```

4. Import schema and seed:

```bash
C:\xampp\mysql\bin\mysql.exe -u root -e "SOURCE C:/xampp/htdocs/p/database/schema.sql"
C:\xampp\php\php.exe database/seed.php
```

5. Open:

- Frontend: http://localhost/p/
- Admin: http://localhost/p/admin/login

### Default admin login

| Email | Password |
|-------|----------|
| `admin@cms.local` | `Admin@123` |
| `editor@cms.local` | `Editor@123` |

## Project structure

```
app/Controllers|Models|Views|Helpers|Libraries|Middleware|Core
config/          Application, database, mail
routes/          web.php, admin.php, api.php
public/          Assets & uploads
database/        schema.sql, seed.php
storage/         logs, cache, backups
```

## Features

- Secure auth (login, logout, forgot/reset password, bcrypt, CSRF, RBAC)
- Roles: Super Admin, Admin, Editor
- Dashboard with stats & charts
- Menus (unlimited nesting), Categories, Posts, Pages
- Banners, Gallery, Videos, Events, Announcements
- Media library, Users, Settings, SEO (sitemap, robots, RSS)
- Contact form + Newsletter + CSV export
- Activity log, DB backup/restore
- Frontend: dynamic menus, news, search, gallery, events, contact

## Security

PDO prepared statements, CSRF tokens, XSS escaping (`e()`), auth/authorization middleware, secure uploads with MIME checks.

## Configuration

- `config/app.php` — URL, debug, session, uploads
- `config/database.php` — MySQL credentials
- `config/mail.php` — SMTP (overridable from Admin → Settings)
- `config/constants.php` — `BASE_PATH` (set to `/p` for subdirectory)

## License

Proprietary / project use.
