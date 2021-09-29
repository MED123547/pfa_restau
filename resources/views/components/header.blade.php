<header>
    <a href="#" class="logo"><span>R</span>esto</a>
    <div class="menuToggle" onclick="toggleMenu();"></div>
    <ul class="navbar">
        <li><a href="#banniere" onclick="toggleMenu();">Accueil</a></li>
        <li><a href="#apropos" onclick="toggleMenu();">A propos</a></li>
        <li><a href="#menu" onclick="toggleMenu();">Menu</a></li>
        <li><a href="#expert" onclick="toggleMenu();">Expert</a></li>
{{--        <li><a href="#temoignage" onclick="toggleMenu();">Temoignage</a></li>--}}
        <li><a href="#contact" onclick="toggleMenu();">Contact</a></li>
        <a href="{{ route('reservation.create') }}" class="btn-reserve"onclick="toggleMenu();">Reservation</a>
    </ul>
</header>
