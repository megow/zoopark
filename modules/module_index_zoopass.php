<?php
if($_SESSION['lang']=='en'):
  /***** Afficher zoopass [[EN]]
  */
  $zoopass = "SELECT * FROM view_mod_zoopass_en";

  $zoopass_request = $db_connect->query($zoopass);
  echo $db_connect->error;
  while($zoop = $zoopass_request->fetch_object()):
    $allRowsZoopass[] = $zoop;
  endwhile;

  /***** Afficher prix [[EN]]
  */
  $prix = "SELECT * FROM mod_index_pass_2_en";

  $prix_request = $db_connect->query($prix);
  echo $db_connect->error;
  while($prix = $prix_request->fetch_object()):
    $allRowsPrix[] = $prix;
  endwhile; 

else:
  /***** Afficher zoopass [[FR]]
  */
  $zoopass = "SELECT * FROM view_mod_zoopass";

  $zoopass_request = $db_connect->query($zoopass);
  echo $db_connect->error;
  while($zoop = $zoopass_request->fetch_object()):
    $allRowsZoopass[] = $zoop;
  endwhile;

  /***** Afficher prix [[FR]]
  */
  $prix = "SELECT * FROM mod_index_pass_2";

  $prix_request = $db_connect->query($prix);
  echo $db_connect->error;
  while($prix = $prix_request->fetch_object()):
    $allRowsPrix[] = $prix;
  endwhile; 

endif;//end get lang
?>  

  <!-- Call-->
  <div class="call orange lighten-1">
    <div class="container">
      <div class="section">
        <div class="row">
          <div class="col s12 center">

          <?php if(isset($_SESSION['zoo_admins'])): ?>
            
            <p><?php echo $allRowsZoopass[0]->intro; ?></p>

            <div class="flex-out">
            <?php for($p=0; $p<count($allRowsPrix); $p++): ?>
            <div class="flex-in">
            <div id="download-button" class="call-btn btn-large brown lighten-1">

            <form action="" method="post">

            <input type="text" name="zoopass" value="<?php echo $allRowsPrix[$p]->zoopass; ?>"><strong> <input type="text" name="duree" value="<?php echo $allRowsPrix[$p]->duree; ?>"> </strong><span><input type="text" name="prix" value="<?php echo $allRowsPrix[$p]->prix; ?>">€*</span></div>


            <input type="hidden" name="id_mod_index_pass_1" value="<?php echo $allRowsPrix[$p]->id_mod_index_pass_1; ?>">
            <input type="hidden" name="id_mod_index_pass_2s" value="<?php echo $allRowsPrix[$p]->id_mod_index_pass_2s; ?>">
            <input type="hidden" name="updatePrix" value="yes">

            <input class="modif-button-zoopass" type="submit" value="modifier">
            </form>

           </div> 
          <?php endfor; ?>
          </div>
          
            <p>*<small><?php echo $allRowsZoopass[0]->asterix; ?></small></p>




          <?php else: ?>
            <p><?php echo $allRowsZoopass[0]->intro; ?></p>
              <?php for($i=0; $i<count($allRowsZoopass); $i++): ?>
              <a href="#" id="download-button" class="call-btn btn-large waves-effect waves-light brown lighten-1"><?php echo $allRowsZoopass[$i]->zoopass; ?><strong> <?php echo $allRowsZoopass[$i]->duree; ?> </strong><span><?php echo $allRowsZoopass[$i]->prix; ?>€*</span></a>
            <?php endfor; ?>
              <p>*<small><?php echo $allRowsZoopass[0]->asterix; ?></small></p>
          <?php endif; ?>

              

          </div>
        </div>
      </div>
    </div>
  </div><!-- fin Call -->