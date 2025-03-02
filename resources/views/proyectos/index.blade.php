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
        <a class="btn btn-sm bg-moradoLogo text-white rounded-md hover:bg-moradoOscuro w-50"
           href="{{ route('proyectos.create') }}">{{ __('Nuevo Proyecto') }}</a>
        <h1 class="text-2xl font-bold text-moradoOscuro text-center mr-32 flex-1">
            {{ __('Administración de proyectos de la base de datos') }}</h1>
    </div>
    <div class="flex justify-center my-4">
        <input type="text" id="buscar" placeholder="🔍 Buscar proyecto..."
               class="w-1/3 p-2 border border-gray-300 rounded-lg focus:ring focus:ring-moradoOscuro">
    </div>
    <div class="flex justify-center mt-5 mb-20">
        <table class="w-3/4 border shadow-lg rounded-lg overflow-hidden">
            <thead>
            <tr class="bg-moradoOscuro text-white text-center">
                @foreach($campos as $campo)
                    <th class="px-4 py-2">{{ __($campo) }}</th>
                @endforeach
                <th></th><th></th><th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($filas as $fila)
                <tr class="proyecto border-t-2 border-moradoClaro first:border-none">
                    @foreach($campos as $campo)
                        <td class="py-2 pb-3 text-center">{{ $fila->$campo }}</td>
                    @endforeach
                    <td>
                        <a href="{{route('proyectos.show', $fila->id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hover:text-purple-900 size-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14c3.866 0 7 1.343 7 3v2H5v-2c0-1.657 3.134-3 7-3zm0-10a4 4 0 110 8 4 4 0 010-8z"/>
                            </svg>
                        </a>
                    </td>
                    <td>
                        <a href="{{route("proyectos.edit", $fila->id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hover:text-green-700 size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                    </td>
                    <td>
                        <form onsubmit=event.preventDefault() id="formulario{{$fila->id}}" action="{{route("proyectos.destroy",$fila->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button onclick="confirmDelete({{$fila->id}})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hover:text-red-800 size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
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

        function confirmDelete(id) {
            swal({
                title: "{{ __('¿Deseas eliminar este proyecto?') }}",
                text: "{{ __('Esta acción no se podrá deshacer') }}",
                icon: "warning",
                buttons: true
            }).then(function (ok) {
                if (ok) {
                    let formulario = document.getElementById("formulario" + id);
                    formulario.submit();
                }
            })
        }

        document.getElementById("buscar").addEventListener("input", function () {
            let texto = this.value.toLowerCase();
            document.querySelectorAll(".proyecto").forEach((row) => {
                row.style.display = row.textContent.toLowerCase().includes(texto) ? "" : "none";
            });
        });
    </script>
</x-layouts.layout>
