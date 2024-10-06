<nav x-data="{ open: false }">
    <ul>
        <li>
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Accueil') }}
            </x-nav-link>
        </li>
        <li>
            {{-- Compte
            <ul>
                <li>
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                </li>
                <li> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Déconnexion') }}
                        </x-dropdown-link>
                    </form>
                {{-- </li>
            </ul> --}}
        </li>
    </ul>
</nav>