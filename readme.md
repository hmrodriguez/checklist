## Checklist (demo)

Registra usuarios y lleva las tecnologias que usan y su nivel de dominio. Incluye un modulo de catalogos que el usuario adminitrador puede accesar.

## Instalación

- Git clone
- En consola ejecutar "composer install"
- Copiar el archivo .env.example a .env "cp .env.example .env"
- Establecer la configuracion de la base de datos en el archivo .env
- Poner permisos de escritura en la carpeta storage "chmod 777 -R storage"
- En consola ejecutar "php artisan migrate --seed" para cargar las tablas en la base de datos