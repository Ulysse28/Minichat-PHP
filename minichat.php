<!--
minichat.php file
By Ulysse Valdenaire
04/10/2021
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minichat</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <!--form with an input for the pseudo and a textarea for the message-->
    <div class="container-fluid">
        <h1 class="text-center my-5">Minichat en PHP</h1>
        <form class="mb-5" method="POST" action="minichat_post.php">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <label class="form-label" for="pseudo">Pseudo : </label>
                    <input class="form-control" type="text" name="pseudo" required="required"><br />
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-floating col-12 col-lg-6">
                    <textarea class="form-control" name="message"></textarea><br>
                    <label class="floatingTextarea" for="message">Votre Message</label>
                    <button class="btn btn-dark justify-content-center" type="submit">Envoyer</button>
                </div>

            </div>
        </form>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <h2 class="text-center mb-3">Derniers messages</h2>

        <?php
            //dispaly the last 10th message with the author 
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
            }
            catch (Exeption $e)
            {
                die('Erreur : ' .$e->getMessage());
            }

            $req = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');
            while($donnee = $req -> fetch())
            {
                echo '<p> <strong>'. htmlspecialchars($donnee['pseudo']). '</strong> : '. htmlspecialchars($donnee['message']). '</p><br/>';
            }

            $req->closeCursor();
        ?>
            </div>
        </div>
    </div>
</body>

</html>