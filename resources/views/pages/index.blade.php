@extends(auth()->check() && auth()->user()->role === 'admin' ? 'layouts.admin' : (auth()->check() ? 'layouts.app' : 'layouts.guest'))

@section('title', 'Accueil')

@section('content')
<div class="container">

</div>
<section class="head">
    <h1>De quelle prestation avez vous besoin<br>aujourd'hui?</h1>
    <div class="input">
        <input type="text" placeholder="Recherchez une prestation..">
        <button>Rechercher</button>
    </div>
</section>

<section class="presentation">
    <div class="title">
        <h2>Nom du salon</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, similique?</p>
    </div>
    
    <div class="infos">
        <div class="img-container">
            <img src="{{ asset('images/store-front.jpg') }}" alt="">
        </div>
        <div class="text-container">
            <h3>Lorem ipsum dolor sit amet consectetur.</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque magnam ratione hic, eaque quibusdam deserunt officia alias dolor, iste aliquid, qui repellendus recusandae aperiam eius. Voluptatibus, deserunt cum enim consectetur dolores, modi id nobis quia, facere natus omnis temporibus animi expedita debitis maxime in. Praesentium ipsum incidunt iusto quisquam! Deserunt, molestiae commodi necessitatibus delectus dolorem at sunt asperiores iure pariatur..</p>
        </div>
    </div>

    <div class="infos">
        <div class="text-container">
            <h3>Lorem ipsum dolor sit amet consectetur.</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque magnam ratione hic, eaque quibusdam deserunt officia alias dolor, iste aliquid, qui repellendus recusandae aperiam eius. Voluptatibus, deserunt cum enim consectetur dolores, modi id nobis quia, facere natus omnis temporibus animi expedita debitis maxime in. Praesentium ipsum incidunt iusto quisquam! Deserunt, molestiae commodi necessitatibus delectus dolorem at sunt asperiores iure pariatur..</p>
        </div>
        <div class="img-container">
            <img src="{{ asset('images/store-inside.webp') }}" alt="">
        </div>
    </div>
</section>

<section class="services">
    <a href="{{ route('prestations') }}">
        <h2>Nos préstations</h2>
    </a>
</section>

<section class="carousel">
    <div class="slick-carousel">
        <div><img src="{{ asset('images/home/carousel1.jpg') }}" alt=""></div>
        <div><img src="{{ asset('images/home/carousel2.jpg') }}" alt=""></div>
        <div><img src="{{ asset('images/home/carousel3.jpg') }}" alt=""></div>
        <div><img src="{{ asset('images/home/carousel4.jpg') }}" alt=""></div>
        <div><img src="{{ asset('images/home/carousel5.jpg') }}" alt=""></div>
        <div><img src="{{ asset('images/home/carousel6.jpg') }}" alt=""></div>
        <div><img src="{{ asset('images/home/carousel7.jpg') }}" alt=""></div>
    </div>
</section>
@endsection