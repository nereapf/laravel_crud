<header>
    <div class="navbar bg-[#EEEDED]">
        <div class="flex-1">
            <h1 class="text-xl font-bold text-gray-800 ml-5">Gestión de Proyectos Académicos</h1>
        </div>
        <div class="flex-none gap-2 mr-2">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img
                            alt="Tailwind CSS Navbar component"
                            src="images/usuario.png"/>
                    </div>
                </div>
                <div class="hidden md:flex flex-row space-x-3">
                    @auth
                        <span class="text-white">{{ auth()->user()->name }}
                        <form action="{{route("logout")}}" method="POST">
                            @csrf
                            <input class="btn  btn-glass" type="submit" value="Logout">
                        </form>
                    @endauth
                    @guest
                        <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                            <li><a href="{{route("register")}}">Registrarse</a></li>
                            <li><a href="{{route("login")}}">Iniciar sesión</a></li>
                        </ul>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</header>
