# My Hello Kitty

Tienda de demostración en Laravel para mostrar merch inspirada en Hello Kitty. Incluye catálogo, páginas de detalle, carrito visual y una base de datos MySQL con productos de ejemplo.

> Esta aplicación es una demostración académica: el carrito no procesa pagos reales ni representa una tienda oficial.

## Qué incluye el repositorio

- Catálogo y detalle de productos en Laravel.
- Migración de la tabla `products`.
- Seeder con 6 productos de ejemplo.
- Configuración de ejemplo para MySQL en `.env.example`.
- Script SQL para crear la base de datos: `database/create_my_hello_kitty.sql`.
- Estilos y JavaScript listos en `public/css/store.css` y `public/js/store.js`.

No se suben archivos personales o generados localmente: `.env`, `vendor`, `node_modules`, registros y la base SQLite temporal están excluidos mediante `.gitignore`.

## Requisitos en otra computadora

- [Git](https://git-scm.com/)
- PHP **8.2 o superior** con `pdo_mysql` habilitado
- [Composer](https://getcomposer.org/)
- MySQL o MariaDB. En Windows se puede usar XAMPP o Laragon.
- DBeaver (opcional, para administrar y consultar la base de datos)

Node.js/NPM no es necesario para abrir esta versión de la tienda, porque sus estilos y scripts ya están en la carpeta `public`.

## Instalación desde GitHub

Abre PowerShell o una terminal y ejecuta:

```powershell
git clone https://github.com/Karlavanessa18/MISHELLOKITTY.git
Set-Location MISHELLOKITTY
Copy-Item .env.example .env
composer install
```

En macOS o Linux, reemplaza el tercer comando por:

```bash
cp .env.example .env
```

## Crear la base de datos con DBeaver

Primero inicia MySQL/MariaDB desde XAMPP, Laragon o el servicio que uses. Luego, en DBeaver:

1. Pulsa **Nueva conexión de base de datos** y elige **MySQL**.
2. Usa estos datos (son los mismos de `.env`):

   | Campo | Valor |
   | --- | --- |
   | Host | `127.0.0.1` |
   | Puerto | `3306` |
   | Base de datos | `my_hello_kitty` |
   | Usuario | `root` |
   | Contraseña | Vacía en una instalación predeterminada de XAMPP |

3. Si DBeaver solicita el controlador MySQL, permite su descarga.
4. Abre un editor SQL y ejecuta el contenido de [database/create_my_hello_kitty.sql](database/create_my_hello_kitty.sql):

```sql
CREATE DATABASE IF NOT EXISTS `my_hello_kitty`
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;
```

5. Actualiza la conexión en DBeaver.

Si tu servidor usa otro puerto, usuario o contraseña, cambia esos mismos valores tanto en DBeaver como en el archivo `.env` local. Nunca subas el archivo `.env` a GitHub.

## Crear las tablas y productos

Después de crear la base de datos, vuelve a la terminal del proyecto y ejecuta:

```powershell
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

La tienda quedará disponible en:

```text
http://127.0.0.1:8000
```

La migración crea las tablas de Laravel y `products`. El seeder agrega estos seis productos de demostración:

- Mochila Kitty Pop
- Buzo Pink Mood
- Termo Sweet Day
- Agenda Mini Dreams
- Llavero Cherry Bow
- Set de stickers Kawaii

Para verlos en DBeaver, expande:

```text
my_hello_kitty → Tables → products
```

También puedes abrir un editor SQL y ejecutar:

```sql
USE my_hello_kitty;
SELECT * FROM products;
```

## Verificación rápida

Desde la carpeta del proyecto:

```powershell
php artisan test
```

El proyecto incluye pruebas para el catálogo y la ficha de detalle del producto.

## Problemas frecuentes

| Problema | Solución |
| --- | --- |
| `Connection refused` o error en el puerto 3306 | Inicia MySQL/MariaDB y confirma el puerto en `.env`. |
| `Access denied for user root` | Escribe la contraseña correcta en `DB_PASSWORD` y en la conexión de DBeaver. |
| No aparece la tabla `products` | Ejecuta `php artisan migrate --seed` y actualiza/refresca el esquema en DBeaver. |
| Error por `APP_KEY` | Ejecuta `php artisan key:generate`. |
| No se ven productos | Ejecuta otra vez `php artisan migrate --seed`; el seeder actualiza los seis productos de ejemplo. |
