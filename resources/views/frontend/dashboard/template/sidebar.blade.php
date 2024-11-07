<aside id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-white p-4 shadow-lg border border-gray-300 hidden lg:block">
    <div class="flex items-center justify-between mb-8">
        <div class="text-center mb-3">
            <img src="{{ asset('images/Logo-com-Moldura-inovt.jpg') }}" alt="Company Logo" 
                class="logo h-20 object-contain">
        </div>
        <div class="md:hidden">
            <button id="menu-toggle" class="text-primary-bg lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        <!--- HUMBURGER -->
    </div>
    <nav>
        <ul>
            <li>
                @if(Request::is('client'))
                    <a href="{{ route('client.index') }}" class="block px-4 py-2 rounded 
                    bg-[#849f54] text-white" id="home-link">
                @else
                    <a href="{{ route('client.index') }}" class="block px-4 py-2 rounded 
                    text-primary-text hover:bg-[#849f54] hover:text-white" id="home-link">
                @endif
                Página inicial
                </a>
            </li>

            <li>
                @if(Request::is('client/perfil'))
                    <a href="{{ route('client.perfil') }}" class="block px-4 py-2 rounded 
                    bg-[#849f54] text-white" id="home-link">
                @else
                    <a href="{{ route('client.perfil') }}" class="block px-4 py-2 rounded 
                    text-primary-text hover:bg-[#849f54] hover:text-white" id="home-link">
                @endif
                <span>Perfil</span>
                </a>
            </li>

            <!----  CURSOS ---->
            <li>
                @if(Request::is('client/cursos') || Request::is('client/cursos/*'))
                    <a href="{{route('client.cursos.index')}}" class="block px-4 py-2 rounded 
                    bg-[#849f54] text-white" id="home-link">
                @else
                    <a href="{{route('client.cursos.index')}}" class="block px-4 py-2 
                        rounded text-primary-text
                    hover:bg-[#849f54] hover:text-white" id="home-link">
                @endif
                <span>Cursos</span>
                </a>
            </li>

            <!-- VIDEOS --> 
            <li>
                @if(Request::is('client/videos') || Request::is('client/videos/*'))
                    <a href="{{route('client.videos.index')}}" class="block px-4 py-2 rounded 
                    bg-[#849f54] text-white" id="home-link">
                @else
                    <a href="{{route('client.videos.index')}}" class="block px-4 py-2 
                        rounded text-primary-text
                    hover:bg-[#849f54] hover:text-white" id="home-link">
                @endif
                <span>Videos</span>
                </a>
            </li>

        </ul>
    </nav>
</aside>
