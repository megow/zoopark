<?php
if($_SESSION['lang']=='en'):
    /***** Afficher animaux [[EN]]
    */
    $animaux = "SELECT * FROM view_animaux_flaticons_en";

    $animaux_request = $db_connect->query($animaux);
    echo $db_connect->error;
    while($anim = $animaux_request->fetch_object()):
      $allRowsAnimaux[] = $anim;
    endwhile;

    /***** Afficher flaticon [[EN]]
    */
    $flaticon = "SELECT * FROM mod_index_animaux_flaticons_en";

    $flaticon_request = $db_connect->query($flaticon);
    echo $db_connect->error;
    while($flat = $flaticon_request->fetch_object()):
      $allRowsFlaticon[] = $flat;
    endwhile;

else:
    /***** Afficher animaux [[FR]]
    */
    $animaux = "SELECT * FROM view_animaux_flaticons";

    $animaux_request = $db_connect->query($animaux);
    echo $db_connect->error;
    while($anim = $animaux_request->fetch_object()):
      $allRowsAnimaux[] = $anim;
    endwhile;

    /***** Afficher flaticon [[FR]]
    */
    $flaticon = "SELECT * FROM mod_index_animaux_flaticons";

    $flaticon_request = $db_connect->query($flaticon);
    echo $db_connect->error;
    while($flat = $flaticon_request->fetch_object()):
      $allRowsFlaticon[] = $flat;
    endwhile;

endif;//end get lang

?>

<!-- animaux promote-->
<div class="container">
  <div class="section">

    <!--   Icon Section   -->
    <div class="row">
      <?php if(isset($_SESSION['zoo_admins'])): ?>
        <?php for($i=0; $i<count($allRowsAnimaux); $i++): ?>
          <div class="col s12 m4">
            <div class="icon-block">
              <form action="" method="post">

                <select name="id_mod_index_animaux_flaticon" id="flaticon" style="display: block;">

                <?php for($f=0; $f<count($allRowsFlaticon); $f++): ?><!-- -->
                    <option value="<?php echo $allRowsFlaticon[$f]->id_mod_index_animaux_flaticons; ?>"><?php echo $allRowsFlaticon[$f]->icon; ?></option>
                  <?php //endif; ?>
                <?php endfor; ?><!-- -->

              </select>



              <h2 class="center brown-text"><i class="fi <?php echo $allRowsAnimaux[$i]->flaticon; ?>"></i></h2>
              <h3 class="center"><input type="text" name="animal" value="<?php echo $allRowsAnimaux[$i]->animal; ?>"><em> <input type="text" name="continent" value="<?php echo $allRowsAnimaux[$i]->continent; ?>"></em></h3>
              <p class="light"><textarea name="description" value="<?php echo $allRowsAnimaux[$i]->description; ?>"><?php echo $allRowsAnimaux[$i]->description; ?></textarea></p>


              <input type="hidden" name="id_mod_index_animaux" value="<?php echo $allRowsAnimaux[$i]->id_mod_index_animaux; ?>">
              <input type="hidden" name="updateAnimaux" value="yes">
              <input class="modif-button" type="submit" value="modifier">
            </form>
          </div>
        </div>
      <?php endfor; ?>

    <?php else : //PAS CONNECTE?>
      <?php for($i=0; $i<count($allRowsAnimaux); $i++): ?>
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="fi <?php echo $allRowsAnimaux[$i]->flaticon; ?>"><?php echo $allRowsAnimaux[$i]->icon; ?></i></h2>
            <h3 class="center"><?php echo $allRowsAnimaux[$i]->animal; ?><em>- <?php echo $allRowsAnimaux[$i]->continent; ?></em></h3>

            <p class="light"><?php echo $allRowsAnimaux[$i]->description; ?></p>
          </div>
        </div>
      <?php endfor; ?>
    <?php endif; ?>
  </div>
</div>
</div><!-- fin container -->