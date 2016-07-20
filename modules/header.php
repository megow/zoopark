<?php
if($_GET['lang']=='en'):
    /***** Afficher menu [[EN]]
    */
    $menu = "SELECT * FROM mod_index_menus_en";

    $menu_request = $db_connect->query($menu);
    echo $db_connect->error;
    while($menuIndex = $menu_request->fetch_object()):
      $allRowsMenu[] = $menuIndex;
    endwhile;

else:
    /***** Afficher menu [[FR]]
    */
    $menu = "SELECT * FROM mod_index_menus";

    $menu_request = $db_connect->query($menu);
    echo $db_connect->error;
    while($menuIndex = $menu_request->fetch_object()):
      $allRowsMenu[] = $menuIndex;
    endwhile;

endif;//end get lang
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Zoopark</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/styles.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="css/modifications.css">
</head>
<?php if(isset($_SESSION['zoo_admins'])): ?>
<body class="bodyBorder">
<?php else: ?>
<body>
<?php endif; ?>
    <section class="LOGIN">
        <?php if(isset($_SESSION['zoo_admins'])): ?>
        <section class="login">
          <p>Bienvenue <?php echo $_SESSION['zoo_admins']['user'] ?> | <a class="logout" href="connexion.php?delog">Log out</a></p>
          
        </section>
      <?php else: ?>
      <?php (isset($_GET['error']) == 'log')? "Erreur log/pass" : "" ?>
    <?php endif; ?>
    </section>

  <nav class=" ">
    <div class="search-bar nav-wrapper lighten-1 container">
      <form>
        <div class="input-field">
          <input id="search" type="search" required>
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
  <nav class="white nav-princip" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo"><h1 class="brand">ZooPark/<em>adventure</em></h1></a>
      <ul class="right hide-on-med-and-down">
      
      <?php if(isset($_SESSION['zoo_admins'])): ?>
         
         <div id="updateMenu">
            <h3 class="modif-nav-a" href="">modifier menu</h3>
            <div class="modif-nav group hidden">
            <?php for($i=0; $i<count($allRowsMenu); $i++): ?>
            <form class="flexMenu" action="" method="post">
              <input class="inputMenu" type="text" name="nav" value="<?php echo $allRowsMenu[$i]->nav; ?>">
              <input class="inputMenu" type="text" name="sousnav" value="<?php echo $allRowsMenu[$i]->sousnav; ?>">
              
              <input type="hidden" name="id_mod_index_menus" value="<?php echo $allRowsMenu[$i]->id_mod_index_menus; ?>">
              <input type="hidden" name="updateMenu" value="yes">
              <input class="modif-button-2" type="submit" value="modifier">
            </form>
            <?php endfor; ?>
            </div>
            
          
        </div>
      <?php else: ?>

      <?php for($i=0; $i<count($allRowsMenu); $i++): ?>
        <li><a href="<?php echo $allRowsMenu[$i]->href; ?>"><?php echo $allRowsMenu[$i]->nav; ?> <span><?php echo $allRowsMenu[$i]->sousnav; ?></span></a></li>
      <?php endfor; ?>
    <?php endif; ?>
        <li><a href="#" class="material-icons">search</a><li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
      <?php for($i=0; $i<count($allRowsMenu); $i++): ?>
        <li><a href="<?php echo $allRowsMenu[$i]->href; ?>"><?php echo $allRowsMenu[$i]->nav; ?></a></li>
      <?php endfor; ?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>