<x-layouts.layout>
    <h1>PROYECTO {{$proyecto->titulo}}</h1>
    <hr>
    <h2><b>Alumnos que trabajan en este proyecto:</b></h2>
    @if($proyecto->alumnos->isEmpty())
        <p>No hay alumnos asignados a este proyecto.</p>
    @else
        @foreach($proyecto->alumnos as $alumno)
            <p>
                <span>{{$alumno->nombre}}</span> -
                <span>{{$alumno->edad}} años</span>
            </p>
        @endforeach
    @endif
</x-layouts.layout>

