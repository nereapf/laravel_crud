<x-dropdown>
    <x-slot name="trigger">
        <div tabindex="0" class="btn btn-ghost btn-circle avatar">
            <div class="w-9 rounded-full bg-moradoOscuro">
                <div class="text-white text-center pt-2.5">
                    <span> {{config("languages")[App::getLocale()]['name']}} </span>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="hidden md:flex flex-row space-x-3">
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                @foreach(config("languages") as $code =>$lang)
                    <li>
                        <a href="{{route('language',$code)}}" class ="hover:bg-gray-300">
                            {{$lang['idioma']}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </x-slot>
</x-dropdown>
