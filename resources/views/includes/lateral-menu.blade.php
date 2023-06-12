<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header bg-primary">
        <nav class="navbar navbar-dark ">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <h4 class="text-white">CATEC</h4>
            </div>
        </div>
        </nav>
        <button type="button" class="btn-close " data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    
    <div class="offcanvas-body">

        <!-- PROFIFLE -->
        <div class="container d-flex">
            <a href="{{route('profile.show')}}" class="m-auto  text-white d-flex justify-content-center align-items-center">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                        <img class="h-20 w-20 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </button>
                @endif
            </a>
        </div>

        <!-- SECTION 1-->
        <aside id="aside" class="mt-3 d-flex flex-column" style="padding:0px 30px;">
            <div >
                <x-b-option-menu href="{{route('dashboard')}}"
                    class="{{request()->is('dashboard') ? 'bg-warning shadow-sm' : ''}}">
                    <i class='bx bxs-home'></i>
                    <span>Inicio</span>
                </x-b-option-menu>

                <x-b-option-menu href="{{route('profile.show')}}"
                    class="{{request()->is('user/profile') ? 'bg-warning shadow-sm' : ''}}">
                    <i class='bx bxs-phone-outgoing'></i>
                    <span>Profile</span>
                </x-b-option-menu>

                <x-b-option-menu href="{{route('services.index')}}"
                    class="{{request()->is('services') ? 'bg-warning shadow-sm' : ''}}">
                    <i class='bx bxs-category'></i>
                    <span>Categorias</span>
                </x-b-option-menu>

                <x-b-option-menu {{--href="{{route('report')}}"--}}
                    class="{{request()->is('report') ? 'bg-warning shadow-sm' : ''}}">
                    <i class='bx bxs-report'></i>
                    <span>Informes</span>
                </x-b-option-menu>
                
                <x-b-option-menu href="{{route('incidents.index')}}"
                    class="{{request()->is('incidents') ? 'bg-warning shadow-sm' : ''}}">
                    <i class='bx bx-history'></i>
                    <span>Historial</span>
                </x-b-option-menu>
            </div>
            
            @if (Auth::user()->roles->name == 'admin')    
            <hr>
            <div >
                <h5 class="text-secondary p-2">ADMINISTRAR</h5>
                <x-b-option-menu href="{{route('incidents.index')}}"
                    class="{{request()->is('incidents') ? 'bg-warning shadow-sm' : ''}}">
                    <i class='bx bx-history'></i>
                    <span>Incidentes</span>
                </x-b-option-menu>

                <x-b-option-menu href="{{route('users.index')}}"
                    class="{{request()->is('users') ? 'bg-warning shadow-sm' : ''}}">
                    <i class='bx bxs-user'></i>
                    <span>Usuarios</span>
                </x-b-option-menu>

                <x-b-option-menu {{--href="{{route('incidents.index')}}"--}}
                    class="{{request()->is('report') ? 'bg-warning shadow-sm' : ''}}">
                    <i class='bx bxs-report'></i>
                    <span>Informes</span>
                </x-b-option-menu>

                <x-b-option-menu href="{{route('servicecompanies.index')}}"
                    class="{{request()->is('services/companies') ? 'bg-warning shadow-sm' : ''}}">
                    <i class='bx bxs-briefcase-alt-2'></i>
                    <span>Companias de Servicio</span>
                </x-b-option-menu>
                
            </div>
            @endif
            <hr>
            <div class="container-svg">
                <a class="nav-link" type="button" onclick="document.getElementById('form-logout').submit();">
                    <i class='bx bx-log-out'></i>
                    <span>Cerrar Sesion</span>
                </a>
                <!-- Authentication -->
                <form id="form-logout" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            </div>
        </aside>
    </div>
    </div>