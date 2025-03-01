<x-layouts.layout>
    <x-layouts.nav />
    <div class="max-w-lg mx-auto my-10 p-6 rounded-lg shadow-lg">
        <h1 class="text-moradoOscuro text-xl font-bold">{{$proyecto->titulo}}</h1>
        <hr class="my-3">
        <h2 class="font-bold mb-3">Alumnos que trabajan en este proyecto:</h2>
        @if($proyecto->alumnos->isEmpty())
            <p>Sin alumnos.</p>
        @else
            <ul class="bg-gray-100 p-4 rounded-lg shadow-md">
                @foreach($proyecto->alumnos as $alumno)
                    <li class="flex items-center justify-between px-2 py-2 border-b border-gray-300 last:border-none">
                        <span class="font-medium text-moradoLogo">{{$alumno->nombre}}</span>
                        <span class="text-gray-600">{{$alumno->edad}} años</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-layouts.layout>

