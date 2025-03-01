<x-layouts.layout>
    <x-layouts.nav />
    <div class="p-5">
        <h1 class="text-2xl font-bold text-moradoOscuro text-center flex-1">
            Alumnos participantes de nuestros proyectos</h1>
    </div>
    <div class="flex justify-center mt-5 mb-20">
        <table class="w-3/4 border shadow-lg rounded-lg overflow-hidden">
            <thead>
            <tr class="bg-moradoOscuro text-white text-center">
                @foreach($campos as $campo)
                    <th class="px-4 py-2">{{ __($campo) }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($filas as $fila)
                <tr class="border-t-2 border-moradoClaro first:border-none">
                    @foreach($campos as $campo)
                        <td class="py-2 pb-3 text-center">{{ $fila->$campo }}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.layout>
