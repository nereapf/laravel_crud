<header>
    <div class="navbar bg-moradoFondo">
        <div class="flex-1">
            <h1 class="text-xl font-bold text-moradoLogo ml-5">{{__("Gestión de Proyectos Académicos")}}</h1>
        </div>
        <div class="mr-2">
            <div class="dropdown dropdown-content">
                <x-layouts.lang />
            </div>
        </div>
        <div class="mr-2">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        @auth
                            <img alt="{{ __('Usuario registrado')}}" src="/images/registrado.png" />
                        @else
                            <img alt="{{ __('Usuario invitado')}}" src="/images/usuario.png" />
                        @endauth
                    </div>
                </div>
                <div class="hidden md:flex flex-row space-x-3">
                    @auth
                        <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                            <span class="ml-3 text-moradoLogo"><b>{{ auth()->user()->name }}</b></span>
                            <li>
                                <form action="{{route("logout")}}" method="POST">
                                    @csrf
                                    <input type="submit" value="{{ __('Cerrar sesión') }}">
                                </form>
                            </li>
                        </ul>
                    @endauth
                    @guest
                        <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                            <li><a href="{{route("register")}}">{{ __('Registrarse')}}</a></li>
                            <li><a href="{{route("login")}}">{{ __('Iniciar sesión')}}</a></li>
                        </ul>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</header>
