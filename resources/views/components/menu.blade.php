<section class="menu" id="menu">
    <div class="titre">
        <h2 class="titre-texte"><span>M</span>enu</h2>
        <p>Voici notre plat qui sont trés délicieux. </p>
    </div>
    <div class="contenu">
        @foreach($menus as $menu)
            <div class="box">
                <div class="imbox">
                    <a href="#">
                        <img src="{{ asset('imageUploads/' . $menu->image) }}" alt="">
                    </a>
                </div>
                <div class="text">
                    <h3>{{ $menu->name }}</h3>
                </div>
                <div class="text">
                    {{ $menu->description }}
                </div>
                <div class="text">
                    <h5>{{ $menu->price }} TND</h5>
                </div>
            </div>
        @endforeach
    </div>
    </div>
{{--    <div class="titre">--}}
{{--        <a href="#" class="btn1">Voir Plus</a>--}}
{{--    </div>--}}
</section>
