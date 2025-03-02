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
Para instalarlo primero he hecho un update del composer para luego instalarlo con el 
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
6.  **EDITAR UN PROYECTO** - Para ello primero de todo creamos en el index (dentro de la tabla) un 
botón para poder editar específicamente uno de los proyectos.
Además, en el controler llamaremos a las funiones de edit y update para editar y actualizar la tabla, y
crearemos en la carpeta proyectos el *edit.blade.php*, donde se creará un formulario para poder cambiar
los datos. Junto a esto para que la funcion update funcione, se debe configurar el archivo 
*UpdateProyectoRequest.php* para que al igual que en el store, introduzca los datos, cree los mensajes de
error para los campos que sean erróneos y autorice los permisos.
- Junto a la actualización de un proyecto implementaremos una confirmación antes de realizar la acción con
la librería de sewwtalert.
  - Instalaremos la librería (npm install sweetalert --save)
  - Incluimos la libreria en app.js
  - Acceder a *edit.blade.php* para llamar a la funcion en el formulario y cuando haga click al boton de 
  "Guardar" pida la confirmación.
7. **ELIMINAR UN PROYECTO** - Para ello primero como al editar, creamos en el index (dentro de la tabla) un
botón para poder eliminar específicamente uno de los proyectos. Para borrarlo simplemente se crea un
formulario donde se ubica el boton para que cuando haga click confirme si se quiere borrar mediate una 
funcion de javascript y si esta se confirma se elimina de la base de datos y la tabla a través del id.
Además, necesitaremos en el controler a la funcion destroy para poder eliminarlo.
- Al igual que en la actualización, en la eliminación de un proyecto implementaremos una confirmación 
antes de realizar la acción con la librería de sewwtalert.
  - Como la librería ya esta intalada simplemente habría que crear el codigo de js para el alert de
  confirmación e implementarlo en la tabla ubicada en el index.
8. Añadir la ruta para que al pulsar el boton *proyectos* del nav te redirija a proyectos.index
- Implementar el href a los botones para redirigirlos (nav.blade.php)
9. Junto a esto se implementarán también unos mensajes, que se mostrarán cuando se haya realizado una de
las acciones, esto se realiza a través del controller almacenado los valores y el mensaje, y llamandole 
desde el index para mostrarlo además de aplicarle una transición de desaparición con js.


## Implementacion de cambio de idiomas en la página
Primero hay que instalar el paquete de los lenguajes, publicar los idiomas e ir instalando los idiomas
concretos que queremos en la página (todo esto a través de la consola):
- composer require laravel-lang/lang
- php artisan lang:publish
- php artisan lang:add es // php artisan lang:add en
Junto a esto pondremos como idioma local en el .env el español.
Creamos un layout para implementar la seleccion de los idiomas y este lo implementamos en la seccion del
inicio.
Ahora se crea en *config/languages.php* para ubicar el texto y banderas de los idiomas correspondientes y un
CONTROLLER para acceder a los contenidos.
Para tener un idioma por defecto y guardar el idioma establecido creamos un MIDDLEWARE, para verificar que
las reglas son correctas y pueda funcionar con normalidad. Para que el middleware se ejecute tenemos que 
añadirlo en *bootstrap/app.php*.
Finalmente añadimos en web.php la ruta para que recoja los lenguajes y para cambiar el texto escrito a otro
de los idiomas lo cambiaremos en los archivos json de cada idioma y a la hora de escribirlo en los layouts
en vez de poner el texto lo llamsremos con {{__("nombre_del texto")}}, excepto si se llama
al escribirlo dentro de un value que se llamara simplemente con __("nombre_del_texto").


## Relacion 1:N
Crearemos otra tabla de alumnos donde en un proyecto puedan trabajar N alumnos, pero un 
alumno solo pueda trabajar en 1 proyecto.
Para ello crearemos el modelo donde gracias al '-a' en el modelo ya se crean tanto el seeder,
como el controller, el factory y la migración (php artisan make:Model Alumno -a)
1. Primero hay que crear los campos de la tabla en la nueva *migración* añadiendo un campo 
como clave foranea, que en este caso será el id del proyecto para que estas tablas puedan
relaccionarse. (realizar un php artisan migrate para crear la tabla en la base de datos)
2. Hay que definir las relacciones y eso se realizará en los *modelos*:
- En Proyecto.php: Función para mostrar que un proyecto tiene muchos alumnos
- En Alumno.php: Función para mostrar que un alumno pertenece a un solo proyecto
3. Mostraremos los alumnos en la tabla de proyectos mediante un boton similar al de editar y
borrar proyectos. Se realiza en el index mediante la ruta proyectos.show del controller y 
creando *show.blade.php* dentro de la carpeta de proyectos (aqui se mostrarán los alumnos 
por pantalla).
4. Para automatizar la relacion de las tablas haremos que cada vez que se cree un proyecto,
se añadan a ese proyecto de 1 a 5 alumnos participantes. A través del *controlador* de 
Proyectos en la función STORE se añade la creación de un numero random de alumnos a ese
proyecto asignandole la clave foranea y a través del *factory* del alumno crearemos los datos
aleatorios.

### Visualización de los alumnos
Junto a la relación de las tablas también vamos a crear una sección para visualizar la tabla
de alumnos de la base de datos para ver todos los alumnos que participan en algun proyecto.
Para esto se crea una carpeta ALUMNOS y un *index.blade.php* para mostrar una tabla visual
de los alumnos de la base de datos.
Además en *AlumnoController.php* se debe añadir la funcion de index para obtener los alumnos
y poder mostrarlos y en *web.php* añadir la ruta con el controlador para poder acceder a 
ellos.
Y finalmente para poder accceder a esa tabla es decir ver el index, en el layout del nav, 
en el boton de alumnos implementamos la ruta alumnos.index.


## Implementación de funcionalidades
Para lograr una página más visual y organizada, vamos a agregar a las tablas tanto un
buscador por nombre de los proyectos y alumnos, como un contador de los mismos.

### Buscador de proyectos y alumnos
En el index donde se ubica la tabla se añade el input para introducir el proyecto o alumno
a buscar y junto a eso en ese mismo index se implementa un addEventListener de javascript
para que recoga el texto introducido en el input y ejecute una funcion para recoger todas
las filas de la tabla e ir comparandolas con el texto introducido cada vez que se escribe
en el input, para mostrarlo con display o por el contrario no mostrarlos.
Esto lo realizaremos tanto en la tabla de proyectos como en la de los alumnos.

### Contador de proyectos y alumnos
En el index de cada tabla implementaremos el contador visualmente, y este se realizará en el
*controller* del mismo creando unua variable que almacene el número de proyectos en la 
base de datos.
