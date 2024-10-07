<nav x-data="{ open: false }">
    <ul>
        <li>
            <x-nav-link :href="route('home')" class="{{ request()->routeIs('home') ? 'active-link' : '' }}">
                {{ __('Accueil') }}
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('login')" class="{{ request()->routeIs('login') ? 'active-link' : '' }}">
                {{ __('Connexion') }}
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('register')" class="{{ request()->routeIs('register') ? 'active-link' : '' }}">
                {{ __('Creer un compte') }}
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('contact')" class="{{ request()->routeIs('contact') ? 'active-link' : '' }}">
                {{ __('Contact') }}
            </x-nav-link>
        </li>
    </ul>
</nav>
