<?php
if($_SESSION['lang']=='en'):
    /***** Afficher cat/souscat [[SPECIALITES_EN]]
    */
    $catSpecialites = "SELECT * FROM view_souscat_cat_en
    WHERE id_mod_index_cat_footer = 1";

    $catSpecialites_request = $db_connect->query($catSpecialites);
    echo $db_connect->error;
    while($catSpec = $catSpecialites_request->fetch_object()):
      $allRowsCatSpec[] = $catSpec;
    endwhile;

    /***** Afficher cat/souscat [[ACTIVITES_EN]]
    */
    $catActivites = "SELECT * FROM view_souscat_cat_en
    WHERE id_mod_index_cat_footer = 2";

    $catActivites_request = $db_connect->query($catActivites);
    echo $db_connect->error;
    while($catAct = $catActivites_request->fetch_object()):
      $allRowsCatAct[] = $catAct;
    endwhile;

    /***** Afficher google map [[EN]]
    */
    $map = "SELECT * FROM mod_index_map_footers_en";

    $map_request = $db_connect->query($map);
    echo $db_connect->error;
    while($mapG = $map_request->fetch_object()):
      $allRowsMap[] = $mapG;
    endwhile;


    //-------------------------------------------------------------------------
    /***** Afficher footer [[EN]]
    */
    $footer = "SELECT * FROM mod_index_footers_en";

    $footer_request = $db_connect->query($footer);
    echo $db_connect->error;
    while($foot = $footer_request->fetch_object()):
      $allRowsFooter[] = $foot;
    endwhile;

else:
    /***** Afficher cat/souscat [[SPECIALITES_FR]]
    */
    $catSpecialites = "SELECT * FROM view_souscat_cat
    WHERE id_mod_index_cat_footer = 1";

    $catSpecialites_request = $db_connect->query($catSpecialites);
    echo $db_connect->error;
    while($catSpec = $catSpecialites_request->fetch_object()):
      $allRowsCatSpec[] = $catSpec;
    endwhile;

    /***** Afficher cat/souscat [[ACTIVITES_FR]]
    */
    $catActivites = "SELECT * FROM view_souscat_cat
    WHERE id_mod_index_cat_footer = 2";

    $catActivites_request = $db_connect->query($catActivites);
    echo $db_connect->error;
    while($catAct = $catActivites_request->fetch_object()):
      $allRowsCatAct[] = $catAct;
    endwhile;

    /***** Afficher google map [[FR]]
    */
    $map = "SELECT * FROM mod_index_map_footers";

    $map_request = $db_connect->query($map);
    echo $db_connect->error;
    while($mapG = $map_request->fetch_object()):
      $allRowsMap[] = $mapG;
    endwhile;


    //-------------------------------------------------------------------------
    /***** Afficher footer [[FR]]
    */
    $footer = "SELECT * FROM mod_index_footers";

    $footer_request = $db_connect->query($footer);
    echo $db_connect->error;
    while($foot = $footer_request->fetch_object()):
      $allRowsFooter[] = $foot;
    endwhile;

endif;//end get lang

?>

<footer class="page-footer brown lighten-1">
    <div class="container">
      <div class="row">
      
      <!-- [[SPECIALITES]] -->
      <?php if(isset($_SESSION['zoo_admins'])): ?>

        <?php for($i=0; $i<count($allRowsCatSpec); $i++): ?> <!-- corriger -->
          <div class="col l3 m6 s12">
            <h3 class="white-text"><?php echo $allRowsCatSpec[$i]->cat; ?></h3>
            
            <?php for($i=0; $i<count($allRowsCatSpec); $i++): ?>
              <form action="" method="post">
                <input style="color: white;" type="text" name="souscat" value="<?php echo $allRowsCatSpec[$i]->souscat; ?>">
                <input style="color: white;" type="text" name="href" value="<?php echo $allRowsCatSpec[$i]->href; ?>">

                <input type="hidden" name="id_mod_index_souscat_footers" value="<?php echo $allRowsCatSpec[$i]->id_mod_index_souscat_footers; ?>">
                <input type="hidden" name="updateCat" value="yes">
                <input class="modif-button" type="submit" value="modifier">
              </form>
            <?php endfor; ?>
            

            
          </div>
        <?php endfor; ?>

      <?php else: ?>
        <?php for($i=0; $i<count($allRowsCatSpec); $i++): ?> <!-- corriger -->
          <div class="col l3 m6 s12">
            <h3 class="white-text"><?php echo $allRowsCatSpec[$i]->cat; ?></h3>
            <ul class="footer-links">
            <?php for($i=0; $i<count($allRowsCatSpec); $i++): ?>
              <li><a href="#!"><?php echo $allRowsCatSpec[$i]->souscat; ?></a></li>
            <?php endfor; ?>
            </ul>
          </div>
        <?php endfor; ?>
      <?php endif; ?>
      <!-- [[FIN SPECIALITES]] -->
      

      <!-- [[CATEGORIES]] -->
      <?php if(isset($_SESSION['zoo_admins'])): ?>

        <?php for($i=0; $i<count($allRowsCatAct); $i++): ?>
        <div class="col l3 m6 s12">
          <h3 class="white-text"><?php echo $allRowsCatAct[$i]->cat; ?></h3>
          
          <?php for($i=0; $i<count($allRowsCatAct); $i++): ?>
            <form action="" method="post">
            <input style="color: white;" type="text" value="<?php echo $allRowsCatAct[$i]->souscat; ?>">
              <input style="color: white;" type="text" value="<?php echo $allRowsCatAct[$i]->href; ?>">

              <input type="hidden" name="id_mod_index_souscat_footers" value="<?php echo $allRowsCatAct[$i]->id_mod_index_souscat_footers; ?>">
                <input type="hidden" name="updateCat" value="yes">
                <input class="modif-button" type="submit" value="modifier">
              </form>
          <?php endfor; ?>
          
        </div>
      <?php endfor; ?>
 
    <?php else: ?>
      <?php for($i=0; $i<count($allRowsCatAct); $i++): ?>
        <div class="col l3 m6 s12">
          <h3 class="white-text"><?php echo $allRowsCatAct[$i]->cat; ?></h3>
          <ul class="footer-links">
          <?php for($i=0; $i<count($allRowsCatAct); $i++): ?>
            <li><a href="#!"><?php echo $allRowsCatAct[$i]->souscat; ?></a></li>
          <?php endfor; ?>
          </ul>
        </div>
      <?php endfor; ?>
    <?php endif; ?>
    <!-- [[FIN ACTIVITES]] -->



        <!-- [[MAP]] -->
        <?php if(isset($_SESSION['zoo_admins'])): ?>
          <form action="" method="post">          
            <textarea class="textareaFooter" name="src" value="<?php echo $allRowsMap[0]->src; ?>"><?php echo $allRowsMap[0]->src; ?></textarea>
            <input type="hidden" name="updateMap" value="yes">
            <input class="modif-button" type="submit" value="modifier">
          </form>
        <?php else: ?>
        <div class="gmap col l6 m12 s12" style="padding:0">
          <iframe src="<?php echo $allRowsMap[0]->src; ?>" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <?php endif; ?>
        <!-- [[FIN MAP]] -->
        
      </div><!-- fin container -->
    </div><!-- fin row -->


    <div class="section white">
      <div class="access-map container">
        <div class="row">
          <div class="col s12 center">
            <h3 class="brown-text">Adresse</h3>
            
            <?php if(isset($_SESSION['zoo_admins'])): ?>
              <form class="formFooter" action="" method="post">
                <h4><em><input type="text" name="ville" value="<?php echo $allRowsFooter[0]->ville; ?>"></em> <img src="img/<?php echo $allRowsFooter[0]->logo; ?>" alt="logo"></h4>
                <input type="text" name="rue" value="<?php echo $allRowsFooter[0]->rue; ?>">
                <input type="text" name="localite" value="<?php echo $allRowsFooter[0]->localite; ?>">
                <input type="text" name="sortie" value="<?php echo $allRowsFooter[0]->sortie; ?>">

                <input type="hidden" name="updateFooter" value="yes">
                <input class="modif-button" type="submit" value="modifier">
              </form>

            <?php else: ?>
              <h4><em><?php echo $allRowsFooter[0]->ville; ?></em> <img src="img/<?php echo $allRowsFooter[0]->logo; ?>" alt="logo"></h4>
              <span itemprop="streetAddress"><?php echo $allRowsFooter[0]->rue; ?> -</span>
              <span itemprop="addressLocality"><?php echo $allRowsFooter[0]->localite; ?> -</span>
              (<span itemprop="addressRegion"><?php echo $allRowsFooter[0]->region; ?></span> - BE)
              <p><?php echo $allRowsFooter[0]->sortie; ?></p>
            <?php endif; ?>


          </div>
        </div>
      </div>
    </div>
    <div class="section version grey darken-3">
      <div class="row">
        <div class="col s6 center">
          <a class="waves-effect text waves-orange btn-flat" href="?lang=fr">Français</a>
        </div>
        <div class="col s6 center">
          <a class="waves-effect waves-orange btn-flat" href="?lang=en">English</a>
        </div>
      </div>
    </div>
    <div class="footer-copyright center grey darken-4">
      <div class="container">
        ZooPark <a class="brown-text text-lighten-3" href="#">2016</a>
      </div>
    </div>
  </footer>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/modifications.js"></script>

</body>
</html>

<?php //myPrint_r($_SESSION) ?>
