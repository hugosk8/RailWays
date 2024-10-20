<nav x-data="{ open: false }">
    <ul class="nav-links">
        <li>
            <x-nav-link :href="route('home')"  class="{{ request()->routeIs('home') ? 'active-link' : '' }}">
                {{ __('Accueil') }}
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('dashboard')"  class="{{ request()->routeIs('dashboard') ? 'active-link' : '' }}">
                {{ __('Tableau de bord') }}
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('contact')"  class="{{ request()->routeIs('contact') ? 'active-link' : '' }}">
                {{ __('Contact') }}
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
    <button class="burger">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>
