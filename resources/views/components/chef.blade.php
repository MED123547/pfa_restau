<section class="expert" id="expert">
    <div class="titre">
        <h2 class="titre-texte">Nos <span>E</span>xperts</h2>
        <p>Voici nos chef qui sont qualifié . </p>
    </div>
    <div class="contenu">
        @foreach($chefs as $chef)
        <div class="box">
            <div class="imbox">
                <img src="{{ asset('imageUploads/' . $chef->image) }}" alt="">
            </div>
            <div class="text">
                <h3>{{ $chef->full_name }}</h3>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</section>
