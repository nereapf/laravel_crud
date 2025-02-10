<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# DOCUMENTACIÓN LARAVEL
## Instalación y añadirlo a github

laravel new nombre
git init
git add .
git commit -m "nombre"
git branch -M main
git remote add origin "https o ssh"
git push origin main

## Primeros cambios generales
### Docker compose
Añadir el archivo docker-compose.yaml para poder orquestar los contenedores de docker 
y poder levantar el proyecto.
### Data Base
Cambiar la configuración del *.env* para que los datos de la base de datos en el
propio equipo se relaccionen con los datos del docker:
- DB_PORT=23306
- DB_USERNAME=usuario 
- DB_PASSWORD=usuario 
- DB_ROOT_PASSWORD=root12345
### Daisyui
Para instalarlo primero he hecho un update del composer para liuego instalarlo con el 
comando **npm i -D daisyui@latest**.
Además de esto hay que añadirlo al tailwind como plugin.

