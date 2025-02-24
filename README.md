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

Y ya que hemos configurado una nueva base de datos en Laravel debemos ejecutar las 
migraciones con: *php artisan migrate*.
### Daisyui
Para instalarlo primero he hecho un update del composer para liuego instalarlo con el 
comando **npm i -D daisyui@latest**.
Además de esto hay que añadirlo al tailwind como plugin.

## Creación de la página inicial
Para crear la base de este proyecto principalmente en *resources/views/components/layouts*
se ha de crear los layouts:
- Layout principal (layout.blade.php) -> El cual recoge el css y los demás layouts para
mostrarlos, añadiendo ahí también {{$slot}} para mostrar el contenido principal del index.
- Layout de cabecera (header.blade.php) -> Una cabecera que muestra el titulo de la página
y un icono de usuario que al pulsarlo se abre un desplegable para realizar el inicio de 
sesion o registro.
- Layout manu (nav.blade.php) -> Este, muestra un pequeño menú para navegar por la web.
- Layout de pie de página (footer.blade.php) -> Un pie de página para darle un cierre visual
a la página.

**Junto a esto...**
Situado en *resources/views* se encuentra el index.blade.php, mencionado anteriormente 
en el cual se ingresará la información desdeada a mostrar en la página inicial ya que se
configura para que esta página aparezca por defecto. Esto se consigue mediante el archivo
web.php añadiendo la ruta deseada.

## Inicio de sesión y registro de usuarios
En la ruta */resources/views/auth* se debe acceder a los archivos de login y register para 
adquirir los formulario para realizar los registros.
Este formulario puede ser editado para tener visualmente el formulario a gusto del usuario.

**IMPLEMENTACIÓN DE LOS REGISTROS EN NUESTRO CÓDIGO**
Para realizar esto, en los enlaces del desplegable ubicados en el header se añade la ruta
de estos archivos de la sigueinte forma: href="{{route("login")}}".


