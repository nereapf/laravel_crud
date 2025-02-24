<x-layouts.layout>
    <div class="mx-16 px-16">
        @guest
            <h1 class="text-moradoLogo text-4xl text-center font-bold">Organización y gestión de proyectos académicos</h1>
            <br>
            <p class="text-center">En está web, tanto profesores como estudiantes podrán realizar un seguimiento
            de los proyectos realizados en el curso escolar.</p>
            <section>
                <h2>Características principales</h2>
                <img src="images/tareas.png" alt="Tareas a realizar">
                <p>Para mantener todos los trabajos al día contamos con la implementacion de
                tablas para añadir, modificar o crear tareas para que realicen los alumos.</p>
            </section>
            <section>
                <h2>¿Como funciona?</h2>
                <ol>
                    <li>Regístrate y crea tu usuario</li>
                    <li>Navega a través de los diferentes apartados</li>
                    <li>Crea tu proyecto</li>
                    <li>Administra los proyectos existentes</li>
                    <li>Mejora tu desempeño y tu organización diaria</li>
                </ol>
            </section>
        @endguest
        @auth
            <p>registrado</p>
        @endauth
    </div>
</x-layouts.layout>

