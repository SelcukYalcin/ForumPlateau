<body>
    

<h1>CONNEXION</h1>

<!-- FORMULAIRE DE CONNEXION -->
<form action="/ForumPlateau/index.php?ctrl=security&action=login" method="post">
    <div>
        <label for=""><b>E-Mail</b></label><br>
        <input type="email" name="email" placeholder="Enter E-mail" required/><br>
        <label for=""><b>Mot de Passe</b></label><br>
        <input type="password" name="password" placeholder="Enter Password" required/><br>
        <button class="btn" type="submit" name="subLogin">LOGIN</button><br>
    </div>
</form>

</body>
