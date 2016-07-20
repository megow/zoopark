<?php require("config.php"); ?>
<?php require("function.php"); ?>
<?php include('update.php'); ?>
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

else:
    /***** Afficher banners [[FR]]
    */
    $banners = "SELECT * FROM mod_index_banners";

    $banners_request = $db_connect->query($banners);
    echo $db_connect->error;
    while($bans = $banners_request->fetch_object()):
      $allRowsBanners[] = $bans;
    endwhile;

endif;//end get lang

?>
<?php include("modules/header.php"); ?>

  <!-- BANNER 1 -->
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="slogan container">

        <?php if(isset($_SESSION['zoo_admins'])): ?>
        <div class="row center">
        <form action="" method="post">
            <input type="text" name="titre" value="<?php echo $allRowsBanners[0]->titre; ?>">
            <input type="text" name="src" value="<?php echo $allRowsBanners[0]->src; ?>">
            <input type="text" name="alt" value="<?php echo $allRowsBanners[0]->alt; ?>">

            <input type="hidden" name="id_mod_index_banners" value="<?php echo $allRowsBanners[0]->id_mod_index_banners; ?>">
            <input type="hidden" name="updateBanners" value="yes">
            <input class="modif-button" type="submit" value="modifier">
            </form>
        </div>
          
      <?php else: ?>
        <div class="row center">
          <h2 class="header col s12 light"><?php echo $allRowsBanners[0]->titre; ?></h2>
        </div>
      <?php endif; ?>

        <div class="row center">
          <a href="#" id="download-button" class="btn-large waves-effect waves-light brown lighten-1">Billeterie</a>
        </div>
      
      </div><!-- fin container -->
    </div><!-- fin no-pad-bot -->
    <div class="parallax"><img src="content/images/<?php echo $allRowsBanners[0]->src; ?>" alt="Unsplashed background img <?php echo $allRowsBanners[0]->alt; ?>">
    </div>
  </div>
  <!-- FIN BANNER 1-->


  <?php include("modules/module_index_animaux.php"); ?>
  <?php include("modules/module_index_zoopass.php"); ?>


  <!-- BANNER 2 -->
  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">

      <?php if(isset($_SESSION['zoo_admins'])): ?>
        <div class="row center">
        <form method="post">
            <input name="titre" value="<?php echo $allRowsBanners[1]->titre; ?>">
            <input type="text" name="src" value="<?php echo $allRowsBanners[1]->src; ?>">
            <input type="text" name="alt" value="<?php echo $allRowsBanners[1]->alt; ?>">

            <input type="hidden" name="id_mod_index_banners" value="<?php echo $allRowsBanners[1]->id_mod_index_banners; ?>">

            <!--<select name="alt">
              <option value="1"><?php //echo $allRowsBanners[1]->alt; ?></option>
            </select>-->

            <input type="hidden" name="updateBanners" value="yes">
            <input class="modif-button" type="submit" value="modifier">
            </form>
        </div>
          
      <?php else: ?>
        <div class="row center">
          <h3 class="header col s12 light"><?php echo $allRowsBanners[1]->titre; ?></h3>
        </div>
      <?php endif; ?>


      </div><!-- fin container -->
    </div><!-- fin no-pad-bot -->
    <div class="parallax"><img src="content/images/<?php echo $allRowsBanners[1]->src; ?>" alt="Unsplashed background img <?php echo $allRowsBanners[1]->alt; ?>">
    </div>
  </div>
  <!-- FIN BANNER 2 -->


  <?php include('modules/module_index_horaires.php') ?>


  <!-- BANNER 3 -->
  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
      <?php if(isset($_SESSION['zoo_admins'])): ?>
        <div class="row center">
      
          <form action="" method="post">
            <input name="titre" value="<?php echo $allRowsBanners[2]->titre; ?>">
            <input type="text" name="src" value="<?php echo $allRowsBanners[2]->src; ?>">
            <input type="text" name="alt" value="<?php echo $allRowsBanners[2]->alt; ?>">

            <input type="hidden" name="updateBanners" value="yes">
            <input class="modif-button" type="submit" value="modifier">
          </form>
        </div>

      <?php else: ?>
        <div class="row center">
          <h3 class="header col s12 light"><?php echo $allRowsBanners[2]->titre; ?></h3>
        </div>
      <?php endif; ?>

      </div>
    </div>
    <div class="parallax"><img src="content/images/<?php echo $allRowsBanners[2]->src; ?>" alt="Unsplashed background img <?php echo $allRowsBanners[2]->alt; ?>"></div>
  </div>
  <!-- FIN BANNER 3 -->


  <?php include("modules/footer.php"); ?>
