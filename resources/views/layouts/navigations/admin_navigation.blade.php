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
        <li>
            <x-nav-link :href="route('admin.users_list')" class="{{ request()->routeIs('admin.users_list') ? 'active-link' : '' }}">
                {{ __('Liste') }}
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('admin.users.create')" class="{{ request()->routeIs('admin.users.create') ? 'active-link' : '' }}">
                {{ __('Ajouter') }}
            </x-nav-link>
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