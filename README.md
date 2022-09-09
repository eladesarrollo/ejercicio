# Ejercicio ELA, requiere PHP 8+

# Clonar
git clone https://github.com/eladesarrollo/ejercicio.git

# Ingresar al proyecto
cd ejercicio

# Instalar dependiencias
composer install

# Copiar variables por defecto
cp .env.example .env

# Crear llave
php artisan key:generate

# Iniciar servicio
php artisan serve

# Exportar Base de Datos por Laravel Migrations
php artisan migrate

### Alternativa usar SQL para importar Base de datos en MySQL
db.sql

# Lanzar proyecto
Verificar proyecto en:
http://localhost:8000
