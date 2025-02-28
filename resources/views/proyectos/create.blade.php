<x-layouts.layout>
    <x-layouts.nav />
    <div class="max-w-lg mx-auto my-10 p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center text-moradoOscuro">Crear Nuevo Proyecto</h1>
        <form action="{{ route('proyectos.store') }}" method="POST" class="mt-4">
            @csrf
            <div>
                <x-input-label for="titulo" value="Titulo:"/>
                <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" value="{{old('titulo')}}"/>
                @error("titulo")
                <div class="text-sm text-red-600">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <x-input-label for="horas_previstas" value="Horas previstas:"/>
                <x-text-input id="horas_previstas" class="block mt-1 w-full" type="number" name="horas_previstas" value="{{old('horas_previstas')}}"/>
                @error("horas_previstas")
                <div class="text-sm text-red-600">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <x-input-label for="fecha_de_comienzo" value="Fecha de comienzo:"/>
                <x-text-input id="fecha_de_comienzo" class="block mt-1 w-full" type="date" name="fecha_de_comienzo"/>
                @error("fecha_de_comienzo")
                <div class="text-sm text-red-600">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="mt-6 bg-moradoLogo text-white px-6 py-2 rounded-lg hover:bg-moradoOscuro w-full">
                    Añadir Proyecto
                </button>
            </div>
        </form>
    </div>
</x-layouts.layout>

