<nav x-data="{ open: false }">
    <ul>
        <li>
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Accueil') }}
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('admin.users_list')" :active="request()->routeIs('home')">
                {{ __('Liste') }}
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('admin.users.create')" :active="request()->routeIs('admin.users.create')">
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