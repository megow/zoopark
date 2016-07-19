<?php 
/***** Afficher toutes les saisons
*/
$saisons = "SELECT * FROM zoo_saisons";

$saisons_request = $db_connect->query($saisons);
echo $db_connect->error;
while($sais = $saisons_request->fetch_object()):
  $allRowsSais[] = $sais;
endwhile;

/*****Afficher jours et heures [[ETE]]
*/
$planningEte = "SELECT * FROM view_horaires_ete";

$planningEte_request = $db_connect->query($planningEte);
echo $db_connect->error;
while($planE = $planningEte_request->fetch_object()):
  $allRowsEte[] = $planE;
endwhile;

/*****Afficher jours et heures [[AUTOMNE]]
*/
$planningAutomne = "SELECT * FROM view_horaires_automne";

$planningAutomne_request = $db_connect->query($planningAutomne);
echo $db_connect->error;
while($planA = $planningAutomne_request->fetch_object()):
  $allRowsAutomne[] = $planA;
endwhile;

/*****Afficher jours et heures [[HIVER]]
*/
$planningHiver = "SELECT * FROM view_horaires_hiver";

$planningHiver_request = $db_connect->query($planningHiver);
echo $db_connect->error;
while($planH = $planningHiver_request->fetch_object()):
  $allRowsHiver[] = $planH;
endwhile;

/*****Afficher heures
*/
$heures = "SELECT * FROM zoo_heures";

$heures_request = $db_connect->query($heures);
echo $db_connect->error;
while($heu = $heures_request->fetch_object()):
  $allRowsHeures[] = $heu;
endwhile;

/*****Afficher horaires
*/
$horaires = "SELECT * FROM zoo_horaires";

$horaires_request = $db_connect->query($horaires);
echo $db_connect->error;
while($hor = $horaires_request->fetch_object()):
  $allRowsHoraires[] = $hor;
endwhile;

?>

<div class="opening container">
  <div class="section">
    <div class="row">
      <div class="col s12 center">
        <h3 class="orange-text">Horaires</h3>
        <h4>Jours d'ouverture et heures d'ouverture</h4>


        <ul class="tabs">
          <li class="tab col s3"><a href="#summer"><?php echo $allRowsSais[0]->periode; ?></a></li>
          <li class="tab col s3"><a href="#spring"><?php echo $allRowsSais[1]->periode; ?></a></li>
          <li class="tab col s3"><a href="#winter"><?php echo $allRowsSais[2]->periode; ?></a></li>
        </ul>
        
      </div>


      <!-- [[ETE]]-->
      <?php if(isset($_SESSION['zoo_admins'])): ?>

        <div id="summer" class="col s12">

          <p>du <?php echo dateAff($allRowsSais[0]->date_A,'/'); ?> 
            au <?php echo dateAff($allRowsSais[0]->date_Z, '/'); ?>
          </p>

          <div class="displayHoraires">
            <?php for($i=0; $i<count($allRowsEte); $i++): ?>

              <form action="" method="post" class="formHoraires">
                <p style="margin:0;"><?php echo $allRowsEte[$i]->jour; ?> de </p>

                <select class="selectHoraires" name="id_heures" style="display:block;">

                  <?php for($j=0; $j<count($allRowsHeures); $j++): ?>

                    <option value="<?php echo $allRowsHeures[$j]->id_heures; ?>">
                      <?php echo $allRowsHeures[$j]->ouverture; ?>-<?php echo $allRowsHeures[$j]->fermeture; ?>
                    </option>
                  <?php endfor; ?>

                </select>
                <?php if($allRowsEte[$i]->ferme == 1) : ?>
                  <p style="font-size:.7em; margin-top:2px; color:red;">Fermé</p>
                <?php else: ?>
                <p style="font-size:.7em; margin-top:2px; color:red;"><?php echo $allRowsEte[$i]->ouverture; ?>-<?php echo $allRowsEte[$i]->fermeture; ?></p>
                <?php endif; ?>

                
                <input type="hidden" name="id_horaires" value="<?php echo $allRowsEte[$i]->id_horaires; ?>">
                <input type="hidden" name="id_saison" value="<?php echo $allRowsEte[$i]->id_saison; ?>">
                <input type="hidden" name="updateHoraires" value="yes">
                <input class="modif-button" type="submit" value="modifier">

              </form>

            <?php endfor; ?>
          </div>
          <p>Fermeture exceptionnelle le
            <?php echo $allRowsEte[7]->jour; ?></p>
          </div>


        <?php else: ?>
          <div id="summer" class="col s12">
              <p>du <?php echo dateAff($allRowsSais[0]->date_A,'/'); ?> au <?php echo dateAff($allRowsSais[0]->date_Z, '/'); ?></p>

              <?php for($i=0; $i<7; $i++): ?>
                <?php if($allRowsEte[$i]->ferme == 1) : ?>
                  <p style="margin:0;"><?php echo $allRowsEte[$i]->jour; ?> : Fermé<br></p>
                <?php else: ?>
                  <p style="margin:0;"><?php echo $allRowsEte[$i]->jour; ?> de <?php echo $allRowsEte[$i]->ouverture; ?> à <?php echo $allRowsEte[$i]->fermeture; ?><br></p>
              <?php endif; ?>
            <?php endfor; ?>
            <p>Fermeture exceptionnelle le
            <?php echo $allRowsEte[7]->jour; ?></p>
            </div>
        <?php endif; ?>
        <!-- [[FIN ETE]]-->



        <!-- [[AUTOMNE]]-->
      <?php if(isset($_SESSION['zoo_admins'])): ?>

        <div id="spring" class="col s12">

          <p>du <?php echo dateAff($allRowsSais[1]->date_A,'/'); ?> 
            au <?php echo dateAff($allRowsSais[1]->date_Z, '/'); ?>
          </p>

          <div class="displayHoraires">
            <?php for($i=0; $i<count($allRowsAutomne); $i++): ?>

              <form action="" method="post" class="formHoraires">
                <p style="margin:0;"><?php echo $allRowsAutomne[$i]->jour; ?> de </p>

                <select class="selectHoraires" name="id_heures" style="display:block;">

                  <?php for($j=0; $j<count($allRowsHeures); $j++): ?>

                    <option value="<?php echo $allRowsHeures[$j]->id_heures; ?>">
                      <?php echo $allRowsHeures[$j]->ouverture; ?>-<?php echo $allRowsHeures[$j]->fermeture; ?>
                    </option>
                  <?php endfor; ?>

                </select>
                <?php if($allRowsAutomne[$i]->ferme == 1) : ?>
                  <p style="font-size:.7em; margin-top:2px; color:red;">Fermé</p>
                <?php else: ?>
                  <p style="font-size:.7em; margin-top:2px; color:red;"><?php echo $allRowsAutomne[$i]->ouverture; ?>-<?php echo $allRowsAutomne[$i]->fermeture; ?></p>
                <?php endif; ?>

                
                <input type="hidden" name="id_horaires" value="<?php echo $allRowsAutomne[$i]->id_horaires; ?>">
                <input type="hidden" name="id_saison" value="<?php echo $allRowsAutomne[$i]->id_saison; ?>">
                <input type="hidden" name="updateHoraires" value="yes">
                <input class="modif-button" type="submit" value="modifier">

              </form>

            <?php endfor; ?>
          </div>
          </div>


        <?php else: ?>
          <div id="spring" class="col s12">
              <p>du <?php echo dateAff($allRowsSais[1]->date_A,'/'); ?> au <?php echo dateAff($allRowsSais[1]->date_Z, '/'); ?></p>

              <?php for($i=0; $i<7; $i++): ?>
                <?php if($allRowsAutomne[$i]->ferme == 1) : ?>
                  <p style="margin:0;"><?php echo $allRowsAutomne[$i]->jour; ?> : Fermé<br></p>
                <?php else: ?>
                  <p style="margin:0;"><?php echo $allRowsAutomne[$i]->jour; ?> de <?php echo $allRowsAutomne[$i]->ouverture; ?> à <?php echo $allRowsAutomne[$i]->fermeture; ?><br></p>
              <?php endif; ?>
            <?php endfor; ?>
            </div>
        <?php endif; ?>
        <!-- [[FIN AUTOMNE]]-->



        <!-- [[HIVER]]-->
        <?php if(isset($_SESSION['zoo_admins'])): ?>

          <div id="winter" class="col s12">

            <p>du <?php echo dateAff($allRowsSais[2]->date_A,'/'); ?> 
              au <?php echo dateAff($allRowsSais[2]->date_Z, '/'); ?>
            </p>

            <div class="displayHoraires">
              <?php for($i=0; $i<count($allRowsHiver); $i++): ?>

                <form action="" method="post" class="formHoraires">
                  <p style="margin:0;"><?php echo $allRowsHiver[$i]->jour; ?> de </p>

                  <select class="selectHoraires" name="id_heures" style="display:block;">

                    <?php for($j=0; $j<count($allRowsHeures); $j++): ?>

                      <option value="<?php echo $allRowsHeures[$j]->id_heures; ?>">
                        <?php echo $allRowsHeures[$j]->ouverture; ?>-<?php echo $allRowsHeures[$j]->fermeture; ?>
                      </option>
                    <?php endfor; ?>

                  </select>
                  <?php if($allRowsHiver[$i]->ferme == 1) : ?>
                    <p style="font-size:.7em; margin-top:2px; color:red;">Fermé</p>
                  <?php else: ?>
                    <p style="font-size:.7em; margin-top:2px; color:red;"><?php echo $allRowsHiver[$i]->ouverture; ?>-<?php echo $allRowsHiver[$i]->fermeture; ?></p>
                  <?php endif; ?>

                  
                  <input type="hidden" name="id_horaires" value="<?php echo $allRowsHiver[$i]->id_horaires; ?>">
                  <input type="hidden" name="id_saison" value="<?php echo $allRowsHiver[$i]->id_saison; ?>">
                  <input type="hidden" name="updateHoraires" value="yes">
                  <input class="modif-button" type="submit" value="modifier">

                </form>

              <?php endfor; ?>
            </div>
            </div>



          <?php else: ?>

            <div id="winter" class="col s12">
              <p>du <?php echo dateAff($allRowsSais[2]->date_A,'/'); ?> au <?php echo dateAff($allRowsSais[2]->date_Z, '/'); ?></p>

              <?php for($i=0; $i<7; $i++): ?>
                <?php if($allRowsHiver[$i]->ferme == 1) : ?>
                  <p style="margin:0;"><?php echo $allRowsHiver[$i]->jour; ?> : Fermé<br></p>
                <?php else: ?>
                  <p style="margin:0;"><?php echo $allRowsHiver[$i]->jour; ?> de <?php echo $allRowsHiver[$i]->ouverture; ?> à <?php echo $allRowsHiver[$i]->fermeture; ?><br></p>
              <?php endif; ?>
            <?php endfor; ?>
            </div>

          <?php endif; ?>
          <!-- [[FIN HIVER]]-->


      </div><!-- fin row -->
    </div><!-- fin section -->
  </div><!-- fin opening container -->