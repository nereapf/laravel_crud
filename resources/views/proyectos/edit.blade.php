<x-layouts.layout>
    <x-layouts.nav />
    <div class="max-w-lg mx-auto my-10 p-6 rounded-lg shadow-lg">
        <form onsubmit=event.preventDefault() action="{{route("proyectos.update", $proyecto->id)}}" id="formulario{{$proyecto->id}}" method="POST" class="mt-4">
            @method('PUT')
            @csrf
            <div>
                <x-input-label for="titulo" value="Titulo:"/>
                <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo"
                              value="{{ $proyecto->titulo}}"/>
                @error("titulo")
                <div class="text-sm text-red-600">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <x-input-label for="horas_previstas" value="Horas previstas:"/>
                <x-text-input id="horas_previstas" class="block mt-1 w-full" type="number" name="horas_previstas"
                              value="{{ $proyecto->horas_previstas}}"/>
                @error("horas_previstas")
                <div class="text-sm text-red-600">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <x-input-label for="fecha_de_comienzo" value="Fecha de comienzo:"/>
                <x-text-input id="fecha_de_comienzo" class="block mt-1 w-full" type="date" name="fecha_de_comienzo"
                              value="{{ $proyecto->fecha_de_comienzo}}"/>
                @error("fecha_de_comienzo")
                <div class="text-sm text-red-600">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="p-2 flex space-x-2">
                <button type="button" onclick="confirmUpdate({{$proyecto->id}})" class="mt-6 bg-moradoLogo text-white px-6 py-2 rounded-lg hover:bg-moradoOscuro">
                    Guardar
                </button>
                <a class="mt-6 bg-gray-300 text-black px-6 py-2 rounded-lg hover:bg-gray-400" href="{{ route('proyectos.index') }}">Cancelar</a>
            </div>
        </form>
    </div>
    <script>
        function confirmUpdate (id){
            swal({
                title:"¿Deseas actualizar este proyecto?",
                text:"Esta acción no se podrá deshacer",
                icon: "warning",
                buttons:true
            }).then(function (ok){
                if (ok) {
                    let formulario = document.getElementById("formulario" + id);
                    formulario.submit();
                }
            })
        }
    </script>
</x-layouts.layout>
