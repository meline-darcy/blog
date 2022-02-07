<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
</head>
  <body>
    <nav>
      <ul class="menu">
        <li>
        <a href="index.php">Accueil</a>
        </li>
        <li><a href="#">Actualités</a></li>
        <li>
        <a href="#">Articles▿</a>
          <ul class="sub-menu">
          <?php 
                            if (isset($_SESSION["id"])){
                            echo "<li><a href='afficher-articles.php'>Afficher article</a></li>";
                            echo "<li><a href='creer-article.php'>Créer article</a></li>";
                            } 
                            else {
                            echo "<li><a href='afficher-articles.php'>Afficher article</a></li>";
                          
                            };
                            ?>
          </ul>
        </li>
        
        <li><a href="#">Forums</a></li>
        <li><a href="#">Photos</a></li>
          
        <li>
        <a href="#">Espaces Membres▿</a>
          <ul class="sub-menu">
          <?php 
                            if (isset($_SESSION["id"])){
                            echo "<li><a href='crash.php'>Déconnexion</a></li>";
                            echo "<li><a href='profil.php'>Profil</a></li>"; 
                            } 
                            else {
                            echo "<li><a href='connexion.php'>Connexion</a></li>";
                            echo "<li><a href='inscription.php'>Sinscrire</a></li>";
                            };
                            ?>
          </ul>
        </li>
      </ul>
    </nav>
  </body>
</html>

