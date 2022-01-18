 <?php

session_start();


    $bdd = mysqli_connect("localhost", "root", "", "blog");


    $req = mysqli_query($bdd, "SELECT * FROM utilisateurs INNER JOIN droits ON utilisateurs.id_droits = droits.id");


    $res = mysqli_fetch_all($req);
    var_dump($res);


    if (isset($_POST['env'])) {
        $id1 = $_POST['id'];
        $login1 = $_POST['login'];
        $prenom1 = $_POST['prenom'];
        $email1 = $_POST['email'];
        if ($_POST['statut'] == "utilisateur") {
            $id_droit = 1;
        } elseif ($_POST['statut'] == "administrateur") {
            $id_droit = 1337;
        } elseif ($_POST['statut'] == "moderateur") {
            $id_droit = 42;
        }
        $requser = mysqli_query($bdd, "UPDATE utilisateurs SET login='$login1', prenom='$prenom1', email='$email1', id_droits='$id_droit' WHERE  id = $id1 ");
        header("Location: admin.php");
        
    }

    ?>

 <!DOCTYPE html>
 <html>

 <head>
     <title>Cours PHP / MySQL</title>
     <meta charset="utf-8">

 </head>

 <body>
     <h1>Bases de données MySQL</h1>

     <form action="#" method="post">




     </form>

     <h1>Info utilisateur</h1>
     <table>
         <thead>
             <th>id</th>
             <th>login</th>
             <th>prenom</th>
             <th>email</th>
             <th>rôle</th>
         </thead>
         <tbody>
             <?php

                foreach ($res as $utilisateur) {
                    echo '<tr><form method="post" action="">
                    <td> <input type="text" disabled="disabled"  value="' . $utilisateur[0] . '" name="id"></td>
                    <td> <input type="text" value="' . $utilisateur[1] . '" name="login"> </td>
                    <td> <input type="text" value="' . $utilisateur[2] . '" name="prenom"> </td>
                    <td> <input type="text" value="' . $utilisateur[4] . '" name="email"> </td>
                    <td> <select name="statut" >
                    <option name="uti" value="utilisateur">utilisateur</option>
                    <option name="modo" value="moderateur">moderateur</option>
                    <option name="administrateur" value="administrateur">administrateur</option>
               </select></td><
               <td>   <input type="submit" name="env"  Envoyer /> </td>
               
                    </form> </tr>';
                }


                ?>
         </tbody>
     </table>

     <?php
        $req2 = mysqli_query($bdd, "SELECT * FROM articles INNER JOIN utilisateurs ON utilisateurs.id = articles.id_utilisateur ");
        $res2 = mysqli_fetch_all($req2, MYSQLI_ASSOC);
        var_dump($res2);

        if (isset($_POST['envarticle'])) {
            $idarticle = $res2[0]['id'];
            $article = $_POST['article'];
            $titre = $_POST['titre'];




            $reqarticle = mysqli_query($bdd, "UPDATE articles SET login='', article='$idarticle', titre='$titre',  WHERE  id = $idarticle ");
            header("Location: admin.php");
            var_dump($reqarticle);

        //    if (isset($_POST['delete'])) {
            // $reqdelete = mysqli_query($bdd, "DELETE FROM articles WHERE id = $idarticle");
        }    
        // }
        ?>
     <h1>Info article</h1>
     <table>
         <thead>
             <th>titre</th>
             <th>articles</th>
             <th>Auter</th>
         </thead>
         <tbody>
             <?php

                foreach ($res2 as $articles) {
                    echo '<tr><form method="post" action="">
               <td> <input type="titre"  value="' . $articles['titre'] . '" name="id"></td>
               <td> <input type="article"  value="' . $articles['article'] . '" name="id"></td>
               <td> <input type="text" value="' . $articles['login'] . '" name="login"> </td>
               <td>   <input type="submit" name="envarticle"  Envoyer /> </td>
               </form> </tr>';
                }


                ?>
         </tbody>
     </table>

     </tbody>
     </table>

     <?php
        $req3 = mysqli_query($bdd, "SELECT * FROM categories");
        $res3 = mysqli_fetch_all($req3, MYSQLI_ASSOC);

        if (isset($_POST['envcategorie'])) {
            $idcategorie = $res3[0]['id'];
            $nomcategorie = $_POST['nomcategorie'];




            $reqcategorie = mysqli_query($bdd, "UPDATE categories SET nom='$nomcategorie', WHERE  id = $idcategorie ");
            header("Location: admin.php");
        }
        ?>

     <h1>categorie</h1>
     <table>
         <thead>
             <th>nom</th>
         </thead>
         <tbody>
             <?php

                foreach ($res3 as $categorie) {
                    echo '<tr><form method="post" action="">
               <td> <input type="titre"  value="' . $categorie['nom'] . '" name="id"></td>
               <td>   <input type="submit" name="envcategorie"  Envoyer /> </td>
          
               </form> </tr>';
                }


                ?>
         </tbody>
     </table>
 </body>

 </html>
