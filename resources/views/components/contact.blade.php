<section class="contact" id="contact">
    <div class="titre noir">
        <h2 class="titre-text"><span>C</span>ontact</h2>
        <p>Pour nos contacter il suffit de remplir cette formulaire</p>
    </div>
    <form action="{{ route('sendMail') }}" method="post">
        @csrf
        @method('post')
        <div class="contactform">
            <h3>Envoyer un message</h3>
            <div class="inputboite">
                <input type="text" placeholder="Nom" name="name" id="name">
            </div>
            <div class="inputboite">
                <input type="text" placeholder="email" name="email" id="email">
            </div>
            <div class="inputboite">
                <textarea placeholder="message" name="msg" id="msg"></textarea>
            </div>
            <div class="inputboite">
                <input type="submit" value="envoyer">
            </div>
        </div>
    </form>
</section>
