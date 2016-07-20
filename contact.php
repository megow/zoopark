<?php require("config.php"); ?>
<?php require("function.php"); ?>
<?php include('update.php'); ?>
<?php include('insert.php'); ?>
<?php

if($_GET['lang']=='en'):
  /***** Afficher banners [[EN]]
  */
  $banners = "SELECT * FROM mod_index_banners_en";

  $banners_request = $db_connect->query($banners);
  echo $db_connect->error;
  while($bans = $banners_request->fetch_object()):
    $allRowsBanners[] = $bans;
  endwhile;

  /***** Afficher contact [[EN]]
  */
  $contact = "SELECT * FROM zoo_contacts_en";

  $contact_request = $db_connect->query($contact);
  echo $db_connect->error;
  while($cont = $contact_request->fetch_object()):
    $allRowsContact[] = $cont;
  endwhile;

else:
  /***** Afficher contact [[FR]]
  */
  $contact = "SELECT * FROM zoo_contacts";

  $contact_request = $db_connect->query($contact);
  echo $db_connect->error;
  while($cont = $contact_request->fetch_object()):
    $allRowsContact[] = $cont;
  endwhile;

  /***** Afficher banners [[FR]]
  */
  $banners = "SELECT * FROM mod_index_banners";

  $banners_request = $db_connect->query($banners);
  echo $db_connect->error;
  while($bans = $banners_request->fetch_object()):
    $allRowsBanners[] = $bans;
  endwhile;


endif;

  

?>
<?php include("modules/header.php"); ?>

<div class="ask section">
    <div class="container">
      <div class="row">
        <div class="header-forms col s12 center white-text">
          <i class="<?php echo $allRowsBanners[3]->material; ?>">contacts</i>
          <h3>
          <?php echo $allRowsBanners[3]->titre; ?>
          </h3>
        </div>
      </div>
    </div>
  </div>

<div class="container">
  <div class="row">
    <form class="col s12" method="post">
    <?php //if(isset($_SESSION['zoo_admins'])): ?>

    <?php //else: ?>
      <div class="row">
        <div class="input-field col s6">
          <input name="prenom" id="first_name" type="text" class="validate">
          <label for="first_name">Prénom</label>
        </div>
        <div class="input-field col s6">
          <input name="nom" id="last_name" type="text" class="validate">
          <label for="last_name">Nom de famille</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons grey-text">email</i>
          <input name="email" id="email" type="email" placeholder="email" class="validate">
        </div>
        <div class="input-field col s6">
          <i class="material-icons grey-text">today</i>
          <input name="calendrier" type="date" class="datepicker">
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <textarea name="demande" id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Votre demande</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s6">
          <input type="checkbox" id="test5" />
          <label for="test5">Je souhaite être contacter par téléphone</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input name="tel" id="icon_telephone" disabled value="/" id="disabled" type="tel" class="validate">
          <label for="icon_telephone">Téléphone</label>
        </div>
      </div>
      <input type="hidden" name="newContact" value="yes">
      <input class="btn-large waves-effect waves-light brown lighten-1" type="submit" value="envoyer">
    <?php //endif; ?>
    </form>
  </div>
</div>

<div class="company section">
    <div class="container">
      <div class="row">
        <div class="col s12">

        <?php if(isset($_SESSION['zoo_admins'])): ?>

          <form action="" method="post">
            <h3 class="white-text"><input type="text" name="titre" value="<?php echo $allRowsBanners[4]->titre; ?>"></h3>
            <p class="grey-text text-lighten-4"><textarea style="height: 100px;" name="description" ><?php echo $allRowsBanners[4]->description; ?></textarea></p>
            <input type="hidden" name="id_mod_index_banners" value="<?php echo $allRowsBanners[4]->id_mod_index_banners; ?>">
            <input type="hidden" name="src" value="<?php echo $allRowsBanners[4]->src; ?>">
            <input type="hidden" name="alt" value="<?php echo $allRowsBanners[4]->alt; ?>">

            <input type="hidden" name="updateBanners" value="yes">
            <input class="modif-button" type="submit" value="modifier">
            </form>

        <?php else: ?>
            <h3 class="white-text"><?php echo $allRowsBanners[4]->titre; ?></h3>
            <p class="grey-text text-lighten-4"><?php echo $allRowsBanners[4]->description; ?></p>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php include("modules/footer.php"); ?>