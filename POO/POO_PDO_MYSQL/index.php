<form action="bonjour.php" method="POST" enctype="multipart/form-data">
    <div>
        <label for="name">Nom</label>
        <input type="text" name="name" id="">
    </div>
    <div>
        <label for="Message">Message</label>
        <textarea placeholder="Tapez votre message ici" name="message" id=""></textarea>
    </div>
    <div>
        <label for="fichier">Votre cv </label>
        <input type="file" name="fichier"/>
    </div>
    <button type="submit">Envoyer</button>
   
</form>
