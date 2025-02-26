<x-layouts.layout>
    <x-layouts.nav />
    <div class="p-5 flex">
        <a class="btn btn-sm bg-moradoLogo text-white rounded-md hover:bg-moradoOscuro"
           href="{{ route('proyectos.create') }}">Nuevo Proyecto</a>
        <h1 class="text-2xl font-bold text-moradoOscuro ml-56 flex-1">
            Administración de proyectos de la base de datos</h1>
    </div>
    <div class="flex justify-center mt-5 mb-20">
        <table class="w-3/4 border shadow-lg rounded-lg overflow-hidden">
            <thead>
            <tr class="bg-moradoOscuro text-white text-center">
                @foreach($campos as $campo)
                    <th class="px-4 py-2">{{$campo}}</th>
                @endforeach
                <th></th><th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($filas as $fila)
                <tr class="border-t-2 border-moradoClaro">
                    @foreach($campos as $campo)
                        <td class="px-4 py-2 text-center">{{$fila->$campo}}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.layout>
