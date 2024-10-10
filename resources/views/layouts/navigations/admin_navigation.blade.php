<nav x-data="{ open: false }">
    <ul>
        <li>
            <x-nav-link :href="route('home')" class="{{ request()->routeIs('home') ? 'active-link' : '' }}">
                {{ __('Accueil') }}
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('admin.dashboard')" class="{{ request()->routeIs('admin.dashboard') ? 'active-link' : '' }}">
                {{ __('Tableau de bord') }}
            </x-nav-link>
        </li>
        <li class="{{ request()->routeIs('admin.users_list', 'admin.users.create') ? 'nav-item dropdown active-link' : 'nav-item dropdown' }}">
            <x-nav-link :href="route('admin.users_list')" class="{{ request()->routeIs('admin.users_list') ? 'active-link' : '' }}">
                {{ __('Utilisateurs') }}
            </x-nav-link>
            <ul class="dropdown-menu">
                <li>
                    <x-nav-link :href="route('admin.users.create')" class="{{ request()->routeIs('admin.users.create') ? 'active-link' : '' }}">
                        {{ __('Ajouter') }}
                    </x-nav-link>
                </li>
            </ul>
        </li>
        <li class="{{ request()->routeIs('admin.services_list', 'admin.services.create') ? 'nav-item dropdown active-link' : 'nav-item dropdown' }}">
            <x-nav-link :href="route('admin.services_list')" class="{{ request()->routeIs('admin.services_list') ? 'active-link' : '' }}">
                {{ __('Services') }}
            </x-nav-link>
            <ul class="dropdown-menu">
                <li>
                    <x-nav-link :href="route('admin.services.create')" class="{{ request()->routeIs('admin.services.create') ? 'active-link' : '' }}">
                        {{ __('Ajouter') }}
                    </x-nav-link>
                </li>
            </ul>
        </li>
        <li class="{{ request()->routeIs('admin.appointments_list', 'admin.appointments.create') ? 'nav-item dropdown active-link' : 'nav-item dropdown' }}">
            <x-nav-link :href="route('admin.appointments_list')" class="{{ request()->routeIs('admin.appointments_list') ? 'active-link' : '' }}">
                {{ __('Rendez-vous') }}
            </x-nav-link>
            <ul class="dropdown-menu">
                <li>
                    <x-nav-link :href="route('admin.appointments.create')" class="{{ request()->routeIs('admin.appointments.create') ? 'active-link' : '' }}">
                        {{ __('Ajouter') }}
                    </x-nav-link>
                </li>
            </ul>
        </li>
        <li class="{{ request()->routeIs('admin.payments_list', 'admin.payments.create') ? 'nav-item dropdown active-link' : 'nav-item dropdown' }}">
            <x-nav-link :href="route('admin.payments_list')" class="{{ request()->routeIs('admin.payments_list') ? 'active-link' : '' }}">
                {{ __('Paiements') }}
            </x-nav-link>
            <ul class="dropdown-menu">
                <li>
                    <x-nav-link :href="route('admin.payments.create')" class="{{ request()->routeIs('admin.payments.create') ? 'active-link' : '' }}">
                        {{ __('Ajouter') }}
                    </x-nav-link>
                </li>
            </ul>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Déconnexion') }}
                </x-dropdown-link>
            </form>
        </li>
    </ul>
</nav>