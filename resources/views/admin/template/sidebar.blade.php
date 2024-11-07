<aside id="sidebar" class="bg-white p-4 shadow-lg border border-gray-300 hidden lg:block 
        fixed top-0 left-0 h-full w-64 overflow-y-auto" style="z-index: 99999;">
        <div class="flex items-center justify-between mb-8">
            <div class="text-center mb-3">
                <img src="{{ asset('images/Logo-com-Moldura-inovt.jpg') }}" alt="Company Logo" 
                    class="logo h-20 object-contain">
            </div>
            <div>
                <button id="menu-toggle-2" class="bg-red-500 text-white px-2 py-2 md:hidden">
                    X
                </button>
            </div>
            <!--- HUMBURGER -->
        </div>
        <nav>
            <ul>
                <li>
                    @if(Request::is('admin'))
                    <a href="{{route('admin.index')}}" class="block px-4 py-2 rounded 
                     bg-[#849f54] text-white hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @else
                    <a href="{{route('admin.index')}}" class="block px-4 py-2 rounded text-primary-text
                    hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @endif
                    Pagina inicial
                    </a>
                </li>

                <li>
                    @if(Request::is('admin/duvidas') || Request::is('comentarios/admin/resposta/*'))
                        <a href="{{ route('admin.perguntas.index') }}" class="block px-4 py-2 rounded 
                        bg-[#849f54] text-white active hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @else
                        <a href="{{ route('admin.perguntas.index') }}" class="block px-4 py-2 
                            rounded text-primary-text
                        hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @endif
                    
                    <span>Dúvidas e comentários</span>
                    
                    @if(isset($perguntasNaoRespondidas) && $perguntasNaoRespondidas > 0)
                        <span class="ml-2 inline-flex items-center justify-center px-2 
                            py-1 text-xs font-bold leading-none text-white bg-red-600 
                            rounded-full">
                            {{$perguntasNaoRespondidas}}
                        </span>
                    @endif
                    
                    </a>
                </li>

                <!----  Register users ---->
                <li>
                    @if(Request::is('admin/users') || Request::is('admin/users/*'))
                        <a href="{{ route('admin.users') }}" class="block px-4 py-2 rounded 
                        bg-[#849f54] text-white active hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @else
                        <a href="{{ route('admin.users') }}" class="block px-4 py-2 
                            rounded text-primary-text
                        hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @endif
                    
                    <span>Usuarios</span>
                    
                    </a>
                </li>
                <!--- Register groups --->
                <li>
                    @if(Request::is('admin/grupos') || Request::is('/admin/grupos/*'))
                        <a href="{{ route('admin.groups.index') }}" class="block px-4 py-2 rounded 
                        bg-[#849f54] text-white active hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @else
                        <a href="{{ route('admin.groups.index') }}" class="block px-4 py-2 
                            rounded text-primary-text
                        hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @endif
                    
                    <span>Grupos</span>
                    
                    </a>
                </li>

                 <!--- Register Origem --->
                 <li>
                    @if(Request::is('admin/client/origem') || Request::is('/admin/client/origem/*'))
                        <a href="{{ route('admin.origem.index') }}" class="block px-4 py-2 rounded 
                        bg-[#849f54] text-white active hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @else
                        <a href="{{ route('admin.origem.index') }}" class="block px-4 py-2 
                            rounded text-primary-text
                        hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @endif
                    
                    <span>Origem dos clientes</span>
                    
                    </a>
                </li>
                <!----  Register courses ---->
                
                <li>
                    @if(Request::is('admin/cursos'))
                        <a href="{{ route('admin.cursos.index') }}" class="block px-4 py-2 rounded 
                        bg-[#849f54] text-white active hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @else
                        <a href="{{ route('admin.cursos.index') }}" class="block px-4 py-2 
                            rounded text-primary-text
                        hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @endif
                    
                    <span>Cursos</span>
                    
                    </a>
                </li>
                <!----  Register videos ---->
                <li>
                    @if(Request::is('admin/videos') || Request::is('admin/videos/*'))
                        <a href="{{ route('admin.videos.index') }}" class="block px-4 py-2 rounded 
                        bg-[#849f54] text-white active hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @else
                        <a href="{{ route('admin.videos.index') }}" class="block px-4 py-2 
                            rounded text-primary-text
                        hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @endif
                    
                    <span>Videos</span>
                    
                    </a>
                </li>
                
               
                   <!-- Divisor para "Configurações" -->
                   <div class="mt-4 mb-2 p-4 text-sm font-semibold text-gray-500 uppercase">
                    Configurações
                </div>
                <hr class="border-t border-gray-200 mb-4">

                <li>
                     @if(Request::is('admin/roles'))
                        <a href="{{ route('admin.roles.index') }}" class="block px-4 py-2 rounded 
                        bg-[#849f54] text-white active hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @else
                        <a href="{{ route('admin.roles.index') }}" class="block px-4 py-2 
                            rounded text-primary-text
                        hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @endif
                    
                    <span>Tipo de acesso</span>
                    
                    </a>
                </li>

                <li>
                     @if(Request::is('admin/permissions') ||  Request::is('admin/roles/permissions/*'))
                        <a href="{{ route('admin.permissions.index') }}" class="block px-4 py-2 rounded 
                        bg-[#849f54] text-white active hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @else
                        <a href="{{ route('admin.permissions.index') }}" class="block px-4 py-2 
                            rounded text-primary-text hover:bg-[#6b9677] hover:text-white" id="home-link">
                    @endif
                    <span>Permissões</span>
                    </a>
                </li>
                {{-- 
                      <!-- Settings Template -->
                    <li>
                        @if(Request::is('admin/settings/template') ||  Request::is('admin/settings/template/*'))
                            <a href="{{ route('admin.settings.template.index') }}" class="block px-4 py-2 rounded 
                            bg-[#849f54] text-white active hover:bg-[#6b9677] hover:text-white" id="home-link">
                        @else
                            <a href="{{ route('admin.settings.template.index') }}" class="block px-4 py-2 
                                rounded text-primary-text hover:bg-[#6b9677] hover:text-white" id="home-link">
                        @endif
                        <span>Gerir tema</span>
                        </a>
                    </li>
                --}}
              
                
            </ul>
        </nav>
    </aside>
