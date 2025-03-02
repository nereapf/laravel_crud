<x-layouts.layout>
    <x-layouts.nav />
    <div class="p-5">
        <h1 class="text-2xl font-bold text-moradoOscuro text-center flex-1">
            {{ __("Alumnos participantes de nuestros proyectos") }}
        </h1>
    </div>
    <div class="flex justify-center my-4">
        <input type="text" id="buscar" placeholder="🔍 Buscar alumno..."
               class="w-1/3 p-2 border border-gray-300 rounded-lg focus:ring focus:ring-moradoOscuro">
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
                <tr class="alumno border-t-2 border-moradoClaro first:border-none">
                    @foreach($campos as $campo)
                        <td class="py-2 pb-3 text-center">{{ $fila->$campo }}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        document.getElementById("buscar").addEventListener("input", function () {
            let texto = this.value.toLowerCase();
            document.querySelectorAll(".alumno").forEach((row) => {
                row.style.display = row.textContent.toLowerCase().includes(texto) ? "" : "none";
            });
        });
    </script>
</x-layouts.layout>
