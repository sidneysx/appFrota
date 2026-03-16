    <aside class="fixed top-0 left-0 z-40 w-64 h-screen border-r border-gray-200 bg-white">
        <div class="h-full px-3 py-4 overflow-y-auto flex flex-col justify-between">
            
            <div>
                <div class="flex items-center ps-2.5 mb-10">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('img/logo.png') }}" class="h-10 w-auto object-contain" alt="Logo" />
                    </a>
                </div>

                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ route('dashboard') }}" 
                        class="flex items-center p-2 rounded-lg group {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-900 hover:bg-gray-100' }}">
                        <i class="fa-solid fa-house"></i>
                            <span class="ms-3">Pagina inicial</span>
                        </a>
                    </li>
                    @if(in_array(auth()->user()->role, ['user_controle', 'user_admin']))
                    <li>
                        <a href="/veiculos" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <i class="fa-solid fa-gear"></i>
                            <span class="ms-3">Manutenção</span>
                        </a>
                    </li>
                    @endif
                    @if(in_array(auth()->user()->role, ['user_multas', 'user_admin']))
                    <li>
                        <a href="/multas" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <i class="fa-solid fa-file-signature"></i>
                            <span class="ms-3">Multas</span>
                        </a>
                    </li>
                    @endif
                    
                    </ul>
            </div>

            <div class="border-t pt-4">
                <div class="px-2 mb-2">
                    <p class="text-sm font-bold text-gray-700 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                </div>
                
                <a href="{{ route('profile.edit') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <span class="text-sm">Meu Perfil</span>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left flex items-center p-2 text-red-600 rounded-lg hover:bg-red-50 group">
                        <span class="text-sm font-semibold italic">Sair do Sistema</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>