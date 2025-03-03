<x-layouts.layout>
    @guest
        <div class="mx-28 my-16 px-16">
            <h1 class="text-moradoLogo text-4xl text-center font-bold">{{ __("Organización y gestión de proyectos académicos") }}</h1>
            <br>
            <p>{{ __("En esta web, tanto profesores como estudiantes podrán realizar un seguimiento de los proyectos realizados en el curso escolar.") }}</p>
            <br>
            <h2 class="text-moradoOscuro text-xl font-bold">{{ __("Características principales") }}</h2>
            <br>
            <div class="flex gap-16">
                <img src="images/tareas.png" alt="Tareas a realizar" class="h-64">
                <div>
                    <p>{{ __("Para mantener todos los trabajos al día contamos con la implementación de tablas para añadir, modificar o crear tareas para que realicen los alumnos.") }}</p>
                    <br>
                    <h2 class="text-moradoOscuro text-xl font-bold">{{ __("¿Como funciona?") }}</h2>
                    <ol class="list-disc list-inside">
                        <li>{{ __("Regístrate y crea tu usuario") }}</li>
                        <li>{{ __("Navega a través de los diferentes apartados") }}</li>
                        <li>{{ __("Crea tu proyecto") }}</li>
                        <li>{{ __("Administra los proyectos existentes") }}</li>
                        <li>{{ __("Mejora tu desempeño y tu organización diaria") }}</li>
                    </ol>
                </div>
            </div>
        </div>
    @endguest
    @auth
        <div class="mx-28 mb-20 mt-5 px-16">
            <x-layouts.nav />
            <div class="bg-white p-8 mt-16 rounded-lg shadow-[0px_10px_44px_14px_rgba(0,0,0,0.08)] text-center">
                <h1 class="text-4xl font-bold text-moradoLogo">¡{{ __("Bienvenido/a")}}, {{ auth()->user()->name }}!</h1>
                <p class="text-moradoOscuro mt-4">{{ __("Una vez registrado, ya puedes gestionar todos los proyectos y al alumnado.") }}</p>
            </div>
        </div>
    @endauth
</x-layouts.layout>


