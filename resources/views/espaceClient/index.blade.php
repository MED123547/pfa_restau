<x-head></x-head>
<x-header></x-header>
<section class="banniere" id="banniere">
    <div class="contenu">
        <h2>Que Des Plats Délicieux</h2>
        <p>A Tunis , le restaurant Resto vous accueille tous les jours de 9h a 19h sauf le Dimanche.
        </p>
        <a href="#" class="btn1">Notre Menu</a>
        <a href="{{ route('reservation.create') }}" class="btn2">Reservation</a>
    </div>
</section>
<section class="apropos" id="apropos">
    <div class="row">
        <div class="col50">
            <h2 class="titre-texte"><span>A</span> Propos De Nous</h2>
            <p>A Tunis , le restaurant Resto vous accueille tous les jours de 9h a 19h sauf le Dimanche.

                Nous vous proposons une cuisine exotique dans un cadre agréable et chaleureux, à deux pas des Grands magasins. Vous êtes tous les bienvenus !

                Le restaurant est également à votre disposition pour tous types d'évènements ( anniversaires, repas d'affaires...). N'hésitez pas à nous envoyer une demande si vous souhaitez le privatiser !
            </p>
        </div>
        <div class="col50">
            <div class="img">
                <img src="./images/plat3.jpg" alt="image">
            </div>
        </div>
    </div>
</section>
<x-menu></x-menu>
<x-chef></x-chef>

<x-contact></x-contact>

<script type="text/javascript">
    window.addEventListener('scroll', function(){
        const header =document.querySelector('header');
        header.classList.toggle("sticky", window.scrollY > 0 );
    });

    function toggleMenu(){
        const tmenuToggle = document.querySelector('.menuToggle');
        const navbar = document.querySelector('.navbar');
        navbar.classList.toggle('active');
        menuToggle.classList.toggle('active');
    }
</script>

@if(\Illuminate\Support\Facades\Session::has('success'))
    <script>
        swal("Congradulations", "{!! \Illuminate\Support\Facades\Session::get('success') !!}", "success", {
            button: "OK"
        })
    </script>
    @endif
</body>
</html>
