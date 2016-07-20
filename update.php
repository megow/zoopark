<?php
if($_SESSION['lang']=='en'):
   /***** Update menu [[EN]]
   */
   if(isset($_POST['updateMenu'])):
    $upMenu = sprintf("UPDATE mod_index_menus_en SET nav='%s', sousnav='%s' WHERE id_mod_index_menus=%s ",
      addslashes($_POST['nav']),
      addslashes($_POST['sousnav']),
      $_POST['id_mod_index_menus']
      );
   $db_connect->query($upMenu);
   echo $db_connect->error;
   // echo $upMenu;
   header("location:index.php?lang=en");
   exit;
   endif;

   /***** Update banners [[EN]]
   */
   if(isset($_POST['updateBanners'])):
    $upBanners = sprintf("UPDATE mod_index_banners_en SET titre = '%s', src='%s', alt='%s' WHERE id_mod_index_banners =%s",
      addslashes($_POST['titre']),
      $_POST['src'],
      $_POST['alt'],
      $_POST['id_mod_index_banners']
      );
   $db_connect->query($upBanners);
   echo $db_connect->error;

   $Back = $_SERVER["HTTP_REFERER"];
   header("location:".$Back);
   
   exit;
   endif;

   /***** Update animaux [[EN]]
   */
   if(isset($_POST['updateAnimaux'])):
   $upAnimaux = sprintf("UPDATE mod_index_animaux_en SET animal='%s', continent='%s', description='%s', id_mod_index_animaux_flaticon=%s WHERE id_mod_index_animaux=%s",
      addslashes($_POST['animal']),
      addslashes($_POST['continent']),
      addslashes($_POST['description']),
      $_POST['id_mod_index_animaux_flaticon'],
      $_POST['id_mod_index_animaux']
      );
   $db_connect->query($upAnimaux);
   echo $db_connect->error;

   header("location:index.php?lang=en");
   exit;
   endif;

   /***** Update prix [[EN]]
   */
   if(isset($_POST['updatePrix'])):
   $upPrix = sprintf("UPDATE mod_index_pass_2_en SET zoopass='%s', duree='%s', prix=%s, id_mod_index_pass_1=%s WHERE id_mod_index_pass_2s=%s",
      addslashes($_POST['zoopass']),
      addslashes($_POST['duree']),
      $_POST['prix'],
      $_POST['id_mod_index_pass_1'],
      $_POST['id_mod_index_pass_2s']
      );
   $db_connect->query($upPrix);
   echo $db_connect->error;
   //echo $upPrix;
   header("location:index.php?lang=en");
   exit;
   endif;


   /***** Update horaires [[EN]]
   */
   if(isset($_POST['updateHoraires'])):
   $upHoraires = sprintf("UPDATE zoo_horaires_en SET id_heure=%s, id_saison=%s WHERE id_horaires=%s",
      $_POST['id_heures'],
      $_POST['id_saison'],
      $_POST['id_horaires']
      );
   $db_connect->query($upHoraires);
   echo $db_connect->error;
   //echo $upHoraires;
   header("location:index.php?lang=en");
   exit;
   endif;

   /*---------------------------------------------*/
   /***** Update sous-catégories [[FOOTER_EN]]
   */
   if(isset($_POST['updateCat'])):
   $upCat = sprintf("UPDATE mod_index_souscat_footers_en SET souscat='%s', href='%s' WHERE id_mod_index_souscat_footers=%s",
      addslashes($_POST['souscat']),
      addslashes($_POST['href']),
      $_POST['id_mod_index_souscat_footers']
      );
   $db_connect->query($upCat);
   echo $db_connect->error;
   //echo $upCat;
   header("location:index.php?lang=en");
   exit;
   endif;

   /***** Update map [[EN]]
   */
   if(isset($_POST['updateMap'])):
   $upMap = sprintf("UPDATE mod_index_map_footers_en SET src='%s'",
      addslashes($_POST['src'])
      );
   $db_connect->query($upMap);
   echo $db_connect->error;
   //echo $upMap;
   header("location:index.php?lang=en");
   exit;
   endif;

   /***** Update footer [[EN]]
   */
   if(isset($_POST['updateFooter'])):
   $upFooter = sprintf("UPDATE mod_index_footers_en SET ville='%s', rue='%s', localite='%s', sortie='%s'", 
      addslashes($_POST['ville']),
      addslashes($_POST['rue']),
      addslashes($_POST['localite']),
      addslashes($_POST['sortie'])
      );
   $db_connect->query($upFooter);
   echo $db_connect->error;
   //echo $upFooter;
   header("location:index.php?lang=en");
   exit;
   endif;

else:
   /***** Update menu [[FR]]
   */
   if(isset($_POST['updateMenu'])):
    $upMenu = sprintf("UPDATE mod_index_menus SET nav='%s', sousnav='%s' WHERE id_mod_index_menus=%s ",
      addslashes($_POST['nav']),
      addslashes($_POST['sousnav']),
      $_POST['id_mod_index_menus']
      );
   $db_connect->query($upMenu);
   echo $db_connect->error;
   // echo $upMenu;
   header("location:index.php");
   exit;
   endif;

   /***** Update banners [[FR]]
   */
   if(isset($_POST['updateBanners'])):
    $upBanners = sprintf("UPDATE mod_index_banners SET titre = '%s', src='%s', alt='%s' WHERE id_mod_index_banners =%s",
      addslashes($_POST['titre']),
      $_POST['src'],
      $_POST['alt'],
      $_POST['id_mod_index_banners']
      );
   $db_connect->query($upBanners);
   echo $db_connect->error;
    // echo $upBanners;

   $Back = $_SERVER["HTTP_REFERER"];
   header("location:".$Back);

   exit;
   endif;

   /***** Update animaux [[FR]]
   */
   if(isset($_POST['updateAnimaux'])):
   $upAnimaux = sprintf("UPDATE mod_index_animaux SET animal='%s', continent='%s', description='%s', id_mod_index_animaux_flaticon=%s WHERE id_mod_index_animaux=%s",
      addslashes($_POST['animal']),
      addslashes($_POST['continent']),
      addslashes($_POST['description']),
      $_POST['id_mod_index_animaux_flaticon'],
      $_POST['id_mod_index_animaux']
      );
   $db_connect->query($upAnimaux);
   echo $db_connect->error;

   header("location:index.php");
   exit;
   endif;

   /***** Update prix [[FR]]
   */
   if(isset($_POST['updatePrix'])):
   $upPrix = sprintf("UPDATE mod_index_pass_2 SET zoopass='%s', duree='%s', prix=%s, id_mod_index_pass_1=%s WHERE id_mod_index_pass_2s=%s",
      addslashes($_POST['zoopass']),
      addslashes($_POST['duree']),
      $_POST['prix'],
      $_POST['id_mod_index_pass_1'],
      $_POST['id_mod_index_pass_2s']
      );
   $db_connect->query($upPrix);
   echo $db_connect->error;
   //echo $upPrix;
   header("location:index.php");
   exit;
   endif;

   /***** Update horaires [[FR]]
   */
   if(isset($_POST['updateHoraires'])):
   $upHoraires = sprintf("UPDATE zoo_horaires SET id_heure=%s, id_saison=%s WHERE id_horaires=%s",
      $_POST['id_heures'],
      $_POST['id_saison'],
      $_POST['id_horaires']
      );
   $db_connect->query($upHoraires);
   echo $db_connect->error;
   //echo $upHoraires;
   header("location:index.php");
   exit;
   endif;


   /*---------------------------------------------*/
   /***** Update sous-catégories [[FOOTER_FR]] 
   */
   if(isset($_POST['updateCat'])):
   $upCat = sprintf("UPDATE mod_index_souscat_footers SET souscat='%s', href='%s' WHERE id_mod_index_souscat_footers=%s",
      addslashes($_POST['souscat']),
      addslashes($_POST['href']),
      $_POST['id_mod_index_souscat_footers']
      );
   $db_connect->query($upCat);
   echo $db_connect->error;
   //echo $upCat;
   header("location:index.php");
   exit;
   endif;

   /***** Update map [[FR]]
   */
   if(isset($_POST['updateMap'])):
   $upMap = sprintf("UPDATE mod_index_map_footers SET src='%s'",
      addslashes($_POST['src'])
      );
   $db_connect->query($upMap);
   echo $db_connect->error;
   //echo $upMap;
   header("location:index.php");
   exit;
   endif;

   /***** Update footer [[FR]]
   */
   if(isset($_POST['updateFooter'])):
   $upFooter = sprintf("UPDATE mod_index_footers SET ville='%s', rue='%s', localite='%s', sortie='%s'", 
      addslashes($_POST['ville']),
      addslashes($_POST['rue']),
      addslashes($_POST['localite']),
      addslashes($_POST['sortie'])
      );
   $db_connect->query($upFooter);
   echo $db_connect->error;
   //echo $upFooter;
   header("location:index.php");
   exit;
   endif;

endif;//end get lang
?>
