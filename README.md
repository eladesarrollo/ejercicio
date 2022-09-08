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

Verificar proyecto en:
http://localhost:8000

# Condigurar base de datos
Modificar variables en .env
```
DB_DATABASE=nombre
DB_USERNAME=usuario
DB_PASSWORD=password
```

php artisan migrate

php artisan db:seed (Opcional)

# Usando Tailwind CSS
npm install
npm run dev