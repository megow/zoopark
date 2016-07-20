<?php 
if($_GET['lang']=='en'):
  /***** Insérer contact [[EN]]
  */
  if(isset($_POST['newContact'])) :
      $newCont = sprintf("INSERT INTO zoo_contacts_en SET prenom='%s', nom='%s', email='%s', tel='%s', calendrier='%s', demande='%s'",
        addslashes($_POST['prenom']),
        addslashes($_POST['nom']),
        addslashes($_POST['email']),
        $_POST['tel'],
        addslashes($_POST['calendrier']),
        addslashes($_POST['demande'])
        );
    $db_connect->query($newCont);
    echo $db_connect->error;
    // echo $newCont;

    $Back = $_SERVER["HTTP_REFERER"];
    header("location:".$Back);
    exit;
    endif;

  else:
  /***** Insérer contact [[FR]]
  */
  if(isset($_POST['newContact'])) :
    $newCont = sprintf("INSERT INTO zoo_contacts SET prenom='%s', nom='%s', email='%s', tel='%s', calendrier='%s', demande='%s'",
      addslashes($_POST['prenom']),
      addslashes($_POST['nom']),
      addslashes($_POST['email']),
      $_POST['tel'],
      addslashes($_POST['calendrier']),
      addslashes($_POST['demande'])
      );
  $db_connect->query($newCont);
  echo $db_connect->error;
  // echo $newCont;

  $Back = $_SERVER["HTTP_REFERER"];
  header("location:".$Back);
  exit;
  endif;


  endif;
  ?>