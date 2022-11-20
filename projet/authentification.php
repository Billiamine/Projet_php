<?php
  /*****************************************
  *  Constantes et variables
  *****************************************/
  require_once ('connect.php');
  define('LOGIN','caux');  // Login correct
  define('PASSWORD','caux');  // Mot de passe correct
  $message = '';      // Message à afficher à l'utilisateur
 
  /*****************************************
  *  Vérification du formulaire
  *****************************************/
  // Si le tableau $_POST existe alors le formulaire a été envoyé
  if(!empty($_POST))
  {
    // Le login est-il rempli ?
    if(empty($_POST['login']))
    {
      $message = 'Veuillez indiquer votre login svp !';
    }
      // Le mot de passe est-il rempli ?
      elseif(empty($_POST['motDePasse']))
    {
      $message = 'Veuillez indiquer votre mot de passe svp !';
    }
      // Le login est-il correct ?
      elseif($_POST['login'] !== LOGIN)
    {
      $message = 'Votre login est incorrecte !';
    }
      // Le mot de passe est-il correct ?
      elseif($_POST['motDePasse'] !== PASSWORD)
    {
      $message = 'Votre mot de passe est incorrecte !';
    }
      else
    {
      // L'identification a réussi
	    $message = 'Bienvenue '. LOGIN .' !';
	     header('Location: affichage_saisie_libre.php');
    }
  }
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
  <head>
    <title>Formulaire d'identification</title>
  </head>
  <body>
    <?php if(!empty($message)) : ?>
      <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>" method="post">
      <fieldset>
        <legend>Identifiants</legend>
          <p>
             <label for="login">Login :</label> 
	    <input type="text" name="login" id="login" value="<?php if(!empty($_POST['login'])) { echo htmlspecialchars($_POST['login'], ENT_QUOTES); } ?>" />

          </p>
          <p>
            <label for="password">Mot de passe :</label> 
	    <input type="password" name="motDePasse" id="password" value="" /> 
	    <input type="submit" name="submit" value="Connexion" />


          </p>
      </fieldset>
    </form>




</html>
