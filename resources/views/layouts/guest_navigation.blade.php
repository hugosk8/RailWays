<nav x-data="{ open: false }">
    <ul>
        <li>
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                {{ __('Connexion') }}
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                {{ __('Creer un compte') }}
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                {{ __('Contact') }}
            </x-nav-link>
        </li>
    </ul>
</nav>
