<nav>
    <div class="container pt-6">
        <div class="flex justify-center">
            <div class="text-3xl font-bold">
                <h1>МойЛивр</h1>
            </div>
        </div>
        <div>
            <h2 class="font-bold text-xl md:text-2xl py-2">Содержание</h2>
            @guest @include('partials.navbar.guest') @endguest
            @auth @include('partials.navbar.user') @endauth
        </div>
        <div class="py-6">
            <hr>
        </div>
    </div>
</nav>