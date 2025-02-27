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

## Creacion de estilos con tailwind
Para tener una pagina visual y colorida como por ejemplo la cabecera, footer y demás podemos
gracias a tailwind, crear colores personalizados para luego poder aplicarlos con clases a
los elementos que necesitemos.
Esto se consigue en el archivo de tailwind.config.js:
- Creando al igual que el tipo de texto, la configuracion 'colors'

## Inicio de sesión y registro de usuarios
En la ruta */resources/views/auth* se debe acceder a los archivos de login y register para 
adquirir los formulario para realizar los registros.
Este formulario puede ser editado para tener visualmente el formulario a gusto del usuario.

**IMPLEMENTACIÓN DE LOS REGISTROS EN NUESTRO CÓDIGO**
Para realizar esto, en los enlaces del desplegable ubicados en el header se añade la ruta
de estos archivos de la siguiente forma: href="{{route("login")}}".

Hay que tener en cuenta también que al realizar el inicio de sesión nos rediriga a la
página inicial, por lo que esto se conseguirá desde el controlador de la autenticación de 
usuario ubicado en *app/http/auth/AuthenticatedSessionController.php*

## CRUD de proyectos
### Creación del modelo y migración
El modelo junto con su migración sirve para crear tablas en la base de datos y poder modificarlas
e interactuar con ellas.
Pasos a seguir para esta configuración:
- Creación del modelo (php artisan make:Model Proyecto -a)
**Gracias al '-a' en el modelo ya se crean tanto el seeder, como el controller, el factory
y la migración**
- Configuración de la migración ubicada en *database/migrations/create_proyectos_table.php*
donde se crean los campos que va a tener la tabla en la base de datos 
- Se crea el modelo ubicado en *app/models/proyecto.php* para poder asignar todos los datos
- Una vez todo configurado, se ejecuta la migracion (php artisan migrate) para crear la tabla

### Creación del crud
1. Crear las rutas del crud para el controlador en *routes/web.php* para que solo los
usuarios autenticados puedan acceder.
- Route::resource('proyectos', ProyectoController::class)->middleware('auth');
2. Creación de la carpeta proyectos en *resources/views* para poder crear los archivos
dedicados a los proyectos, como la creación del formulario para añadir proyectos nuevos.
3. En la carpeta PROYECTOS se deben crear unos archivos para mostrar las tablas (index), 
crear proyectos (create), editar los proyectos existentes (edit)...
- Create: Creación de un formulario que recoge los datos y llama al store del controlador 
para poder guardarlos en la base de datos. 
- Index: Tabla donde se muestran todos los proyectos donde se podrán visualizar, editar, borrar y añadir.
4. Acceder al controlador para hacer que las funciones devuelvan la vista de estos archivos creados
anteriormente.
*Index*: Recoger de la base de datos los campos y las filas de la tabla para luego mostrarla.
*Create*: Devolver la vista de los arcivos de proyectos.
*Store*: Guarda los datos en la base de datos y redirecciona de vuelta al index con la tabla.
*Edit*: Devuelve el formulario de manera que puedas editar el proyecto especificado.
*Update*: Actualiza los datos del proyecto y guarda los nuevos datos en la base de datos.
*Destroy*: Elimina el proyecto seleccionado de la base de datos.
5. **CREAR UN NUEVO PROYECTO** - Para hacer esto, se crea tanto el archivo create, como la funcion
create y store del controlador.
Para que la función *store* funcine también debemos configrar el archivo *StoreProyectoRequest.php* para 
introducir los campos a la hora de crear el proyecto. Además también se podrá tanto autorizar los permisos 
como añadir en el archivo una función para poder mostrar los mensajes de error cuando un campo sea erróneo
a la hora de crearlo.
6.  **EDITAR UN NUEVO PROYECTO** - Para ello primero de todo creamos en el index (dentro de la tabla) un 
botón para poder editar específicamente uno de los proyectos.
Además, en el controler llamaremos a las funiones de edit y update para editar y actualizar la tabla, y
crearemos en la carpeta proyectos el *edit.blade.php*, donde se creará un formulario para poder cambiar
los datos. Junto a esto para que la funcion update funcione, se debe configurar el archivo 
*UpdateProyectoRequest.php* para que al igual que en el store, introduzca los datos, cree los mensajes de
error para los campos que sean erróneos y autorice los permisos.
7. Añadir la ruta para que al pulsar el boton *proyectos* del nav te redirija a proyectos.index
- Implementar el href a los botones para redirigirlos (nav.blade.php)
8. Junto a esto se implementarán también unos mensajes, que se mostrarán cuando se haya realizado una de
las acciones, esto se realiza a través del controller almacenado los valores y el mensaje, y llamandole 
desde el index para mostrarlo además de aplicarle una transición de desaparición con js.


