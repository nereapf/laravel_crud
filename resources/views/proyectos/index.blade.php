<x-layouts.layout>
    <x-layouts.nav />
    @if (session("mensaje"))
        <div id="message" role="alert" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-800 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
                <span class="text-center">{{ session("mensaje") }}</span>
            </div>
        </div>
    @endif
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
                    <td>
                        <a href="{{route("proyectos.edit", $fila->id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hover:text-green-700 size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        setTimeout(() => {
            var message = document.getElementById("message");
            if (message) {
                message.style.transition = "opacity 0.5s";
                message.style.opacity = '0';
                setTimeout(() => {
                    message.remove();
                }, 500);
            }
        }, 4000);
    </script>

</x-layouts.layout>
