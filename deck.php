<?php
$deckTrimBase = trim($_SERVER['REQUEST_URI']);
$deckTrim = str_replace("/deck.php/","",$deckTrimBase);
$deckUrlArray = explode('/',$deckTrim);
$deckSearchBase = str_replace("%20","%",$deckUrlArray[1]);
$deckSearchBase2 = str_replace("%2C",",",$deckSearchBase);
$deckSearchBaseA = str_replace("%26","%",$deckSearchBase2);
$deckSearchBase3 = str_replace("%27","%",$deckSearchBaseA);
$deckUrlFormat = ucwords(filter_var($deckUrlArray[0], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$deckSearch = filter_var($deckSearchBase3, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','XXXXXXX');</script>
<!-- End Google Tag Manager -->
	<?php
  require_once ('connect.php');



         $stmt = $pdo3->prepare("SELECT DISTINCT deckId, deckName, deckFormat, mainCreatures, mainPlaneswalkers, mainSpells, mainArtifacts, mainEnchantments, mainLands, sideBoard, coverCardId, colorIdentity, deckDescription
           FROM decks
           where deckName like :name and deckFormat like :format limit 1");
         $stmt->bindParam(":name",$deckSearch,PDO::PARAM_STR);
         $stmt->bindParam(":format",$deckUrlFormat,PDO::PARAM_STR);
         $stmt->execute();
         $numRows = $stmt->rowCount();

         while($row = $stmt->fetch(PDO::FETCH_LAZY))  {

         			$deckId = $row['deckId'];
         			$deckName = $row['deckName'];
         			$deckFormat = $row['deckFormat'];
              $deckDescription = $row['deckDescription'];
         			$deckCreatures = $row['mainCreatures'];
         			$deckPlaneswalkers = $row['mainPlaneswalkers'];
         			$deckSpells = $row['mainSpells'];
         			$deckArtifacts = $row['mainArtifacts'];
         			$deckEnchantments = $row['mainEnchantments'];
         			$deckLands = $row['mainLands'];
         			$deckSideboard = $row['sideBoard'];
         			$coverCard = $row['coverCardId'];
         			$colorIdentity = $row['colorIdentity'];

         }


  $PAGE_TITLE = "Deck - " . $deckName . " | " . $deckFormat;
  include($_SERVER["DOCUMENT_ROOT"] . "/includes/head-tag-contents.php");?>
<link rel="canonical" href="<?php $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; echo $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">
</head>
<body style="line-height:24px;">
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=XXXXXX"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
<?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/navigation.php");?>

<?php

         $deckListCreatureArrayBaseCardCount = explode(PHP_EOL,$deckCreatures);
         $deckListCreatureArrayBaseNames = explode(PHP_EOL,$deckCreatures);

         foreach ($deckListCreatureArrayBaseNames as &$f) {
           $f = substr($f, 2);
         }

         foreach ($deckListCreatureArrayBaseCardCount as &$f) {
           $f = substr($f,0,2);
         }

         $deckListPlaneswalkerArrayBaseCardCount = explode(PHP_EOL,$deckPlaneswalkers);
         $deckListPlaneswalkerArrayBaseNames = explode(PHP_EOL,$deckPlaneswalkers);

         foreach ($deckListPlaneswalkerArrayBaseNames as &$f) {
           $f = substr($f, 2);
         }

         foreach ($deckListPlaneswalkerArrayBaseCardCount as &$f) {
           $f = substr($f,0,2);
         }

         $deckListSpellsArrayBaseCardCount = explode(PHP_EOL,$deckSpells);
         $deckListSpellsArrayBaseNames = explode(PHP_EOL,$deckSpells);

         foreach ($deckListSpellsArrayBaseNames as &$f) {
           $f = substr($f, 2);
         }

         foreach ($deckListSpellsArrayBaseCardCount as &$f) {
           $f = substr($f,0,2);
         }

         $deckListArtifactsArrayBaseCardCount = explode(PHP_EOL,$deckArtifacts);
         $deckListArtifactsArrayBaseNames = explode(PHP_EOL,$deckArtifacts);

         foreach ($deckListArtifactsArrayBaseNames as &$f) {
           $f = substr($f, 2);
         }

         foreach ($deckListArtifactsArrayBaseCardCount as &$f) {
           $f = substr($f,0,2);
         }

         $deckListEnchantmentsArrayBaseCardCount = explode(PHP_EOL,$deckEnchantments);
         $deckListEnchantmentsArrayBaseNames = explode(PHP_EOL,$deckEnchantments);

         foreach ($deckListEnchantmentsArrayBaseNames as &$f) {
           $f = substr($f, 2);
         }

         foreach ($deckListEnchantmentsArrayBaseCardCount as &$f) {
           $f = substr($f,0,2);
         }

         $deckListLandsArrayBaseCardCount = explode(PHP_EOL,$deckLands);
         $deckListLandsArrayBaseNames = explode(PHP_EOL,$deckLands);

         foreach ($deckListLandsArrayBaseNames as &$f) {
           $f = substr($f, 2);
         }

         foreach ($deckListLandsArrayBaseCardCount as &$f) {
           $f = substr($f,0,2);
         }

         $deckListSideboardArrayBaseCardCount = explode(PHP_EOL,$deckSideboard);
         $deckListSideboardArrayBaseNames = explode(PHP_EOL,$deckSideboard);

         foreach ($deckListSideboardArrayBaseNames as &$f) {
           $f = substr($f, 2);
         }

         foreach ($deckListSideboardArrayBaseCardCount as &$f) {
           $f = substr($f,0,2);
         }



     ?>

     <div class="container" id="mainContent">
       <div class="deckContentBlock1" style="display:block;margin:auto;width:95%;max-width:1100px;background-color:#ffffff;padding-top:100px;padding-bottom:20px;text-align:center;">
     <h1 style="text-align:left;"><?php echo $deckName . "&nbsp;&nbsp;" . $colorIdentity . "<span style='font-size:16px;font-weight:normal;'>&nbsp;-&nbsp;" . $deckFormat . "</span>"; ?></h1>

     <div style="width:100%;text-align:center;top:0;vertical-align:top;display:inline-block;">
     <?php

     echo '
     <div style="text-align:left;vertical-align:top;display:inline-block;width:100%;border-top:1px solid #000;padding-top:20px;margin-bottom:60px;">';
     echo $deckDescription;
     echo'
     </div>
     <div style="vertical-align:top;display:inline-block;width:300px;margin-right:45px;margin-bottom:45px;">
     <img style="width:100%;border-radius:13px;" src="https://themtgsource.com/media/cards/en/' . $coverCard . '.jpg" />
     </div>
     <div style="display:inline-block;width:100%;max-width:550px;text-align:center;margin:auto;">
     <div style="vertical-align:top;display:inline-block;width:48%;max-width:275px;text-align:left;line-height:27px;">';
     if ($deckCreatures == ""){}
       else{


         echo '<strong>Creatures</strong><br />';

         $k = 0;
         for ($j = 0; $j >= 0 && $j <= 99; $j++) {
           if(empty($deckListCreatureArrayBaseNames[$j])){
             } else {
             $k++;
           }
         }


         for ($i = 0; $i <= $k; $i++) {
             echo $deckListCreatureArrayBaseCardCount[$i] . " <a href='https://themtgsource.com/card/";
             $finalCardNameBase1 = str_replace(" ", "-", $deckListCreatureArrayBaseNames[$i]);
             $finalCardNameBase2 = str_replace(",", "%2C", $finalCardNameBase1);
             $finalCardNameBase3 = str_replace("&", "%26", $finalCardNameBase2);
             $finalCardName = str_replace("'", "%27", $finalCardNameBase3);

              echo $finalCardName . "'>" . $deckListCreatureArrayBaseNames[$i];



              $cardSearchBase = str_replace("-","%",$finalCardName);
              $cardSearchBase2 = str_replace("%2C","%",$cardSearchBase);
              $cardSearchBaseA = str_replace("%26","%",$cardSearchBase2);
              $cardSearchBase3 = str_replace("%27","%",$cardSearchBaseA);
              $cardSearchBase4 = trim($cardSearchBase3);
              $cardSearch = filter_var($cardSearchBase4, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
              $searchParamLength = strlen($cardSearch);


              $stmt2 = $pdo->prepare("SELECT DISTINCT scryfallId FROM cards USE INDEX (`name`) where scryfallId IS NOT NULL and LEFT(name, :nameCount) like :name and isPromo like 0 and setcode NOT REGEXP :regex1 limit 1");
              $stmt2->bindParam(":name",$cardSearch,PDO::PARAM_STR);
              $stmt2->bindParam(":nameCount",$searchParamLength,PDO::PARAM_STR);
              $stmt2->bindValue(":regex1","OHOP|OPCA|OPC2|OARC|PVAN|PMOA|OE01|PSAL|PS11|REN|4BB|FBB|PPRO|PWAR|PHJ|PAST|RIN",PDO::PARAM_STR);
              $stmt2->execute();

              while($row2 = $stmt2->fetch(PDO::FETCH_LAZY))  {
                      $cardId2 = $row2['scryfallId'];
                    }


              echo "<div class='cardFloatingImage' style='position:absolute;'><img class='mobileHide' width='250' style='border-radius:13px;' src='https://www.themtgsource.com/media/cards/en/" . $cardId2 . ".jpg' /></div></a><br />";
         }

       }
     if ($deckPlaneswalkers == ""){}
       else{



         echo '<strong>Planeswalkers</strong><br />';

         $k = 0;
         for ($j = 0; $j >= 0 && $j <= 99; $j++) {
           if(empty($deckListPlaneswalkerArrayBaseNames[$j])){
             } else {
             $k++;
           }
         }
                  for ($i = 0; $i <= $k; $i++) {
                      echo $deckListPlaneswalkerArrayBaseCardCount[$i] . " <a href='https://themtgsource.com/card/";
                      $finalCardNameBase1 = str_replace(" ", "-", $deckListPlaneswalkerArrayBaseNames[$i]);
                      $finalCardNameBase2 = str_replace(",", "%2C", $finalCardNameBase1);
                      $finalCardNameBase3 = str_replace("&", "%26", $finalCardNameBase2);
                      $finalCardName = str_replace("'", "%27", $finalCardNameBase3);

                       echo $finalCardName . "'>" . $deckListPlaneswalkerArrayBaseNames[$i];



                       $cardSearchBase = str_replace("-","%",$finalCardName);
                       $cardSearchBase2 = str_replace("%2C",",",$cardSearchBase);
                       $cardSearchBaseA = str_replace("%26","%",$cardSearchBase2);
                       $cardSearchBase3 = str_replace("%27","%",$cardSearchBaseA);
                       $cardSearchBase4 = trim($cardSearchBase3);
                       $cardSearch = filter_var($cardSearchBase4, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                       $searchParamLength = strlen($cardSearch);


                       $stmt2 = $pdo->prepare("SELECT DISTINCT scryfallId FROM cards USE INDEX (`name`) where scryfallId IS NOT NULL and LEFT(name, :nameCount) like :name and isPromo like 0 and setcode NOT REGEXP :regex1");
                       $stmt2->bindParam(":name",$cardSearch,PDO::PARAM_STR);
                       $stmt2->bindParam(":nameCount",$searchParamLength,PDO::PARAM_STR);
                       $stmt2->bindValue(":regex1","OHOP|OPCA|OPC2|OARC|PVAN|PMOA|OE01|PSAL|PS11|REN|4BB|FBB|PPRO|PWAR|PHJ|PAST|RIN",PDO::PARAM_STR);
                       $stmt2->execute();

                       while($row2 = $stmt2->fetch(PDO::FETCH_LAZY))  {
                               $cardId2 = $row2['scryfallId'];
                             }


                       echo "<div class='cardFloatingImage' style='position:absolute;'><img class='mobileHide' width='250' style='border-radius:13px;' src='https://www.themtgsource.com/media/cards/en/" . $cardId2 . ".jpg' /></div></a><br />";
                  }

       }
     if ($deckSpells == ""){}
       else{


         echo '<strong>Spells</strong><br />';

         $k = 0;
         for ($j = 0; $j >= 0 && $j <= 99; $j++) {
           if(empty($deckListSpellsArrayBaseNames[$j])){
             } else {
             $k++;
           }
         }


                  for ($i = 0; $i <= $k; $i++) {
                      echo $deckListSpellsArrayBaseCardCount[$i] . " <a href='https://themtgsource.com/card/";
                      $finalCardNameBase1 = str_replace(" ", "-", $deckListSpellsArrayBaseNames[$i]);
                      $finalCardNameBase2 = str_replace(",", "%2C", $finalCardNameBase1);
                      $finalCardNameBase3 = str_replace("&", "%26", $finalCardNameBase2);
                      $finalCardName = str_replace("'", "%27", $finalCardNameBase3);

                       echo $finalCardName . "'>" . $deckListSpellsArrayBaseNames[$i];



                       $cardSearchBase = str_replace("-","%",$finalCardName);
                       $cardSearchBase2 = str_replace("%2C",",",$cardSearchBase);
                       $cardSearchBaseA = str_replace("%26","%",$cardSearchBase2);
                       $cardSearchBase3 = str_replace("%27","%",$cardSearchBaseA);
                       $cardSearchBase4 = trim($cardSearchBase3);
                       $cardSearch = filter_var($cardSearchBase4, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                       $searchParamLength = strlen($cardSearch);


                       $stmt2 = $pdo->prepare("SELECT DISTINCT scryfallId FROM cards USE INDEX (`name`) where scryfallId IS NOT NULL and LEFT(name, :nameCount) like :name and isPromo like 0 and setcode NOT REGEXP :regex1");
                       $stmt2->bindParam(":name",$cardSearch,PDO::PARAM_STR);
                       $stmt2->bindParam(":nameCount",$searchParamLength,PDO::PARAM_STR);
                       $stmt2->bindValue(":regex1","OHOP|OPCA|OPC2|OARC|PVAN|PMOA|OE01|PSAL|PS11|REN|4BB|FBB|PPRO|PWAR|PHJ|PAST|RIN",PDO::PARAM_STR);
                       $stmt2->execute();

                       while($row2 = $stmt2->fetch(PDO::FETCH_LAZY))  {
                               $cardId2 = $row2['scryfallId'];
                             }


                       echo "<div class='cardFloatingImage' style='position:absolute;'><img class='mobileHide' width='250' style='border-radius:13px;' src='https://www.themtgsource.com/media/cards/en/" . $cardId2 . ".jpg' /></div></a><br />";
                  }

       }
     if ($deckArtifacts == ""){}
       else{


         echo '<strong>Artifacts</strong><br />';

         $k = 0;
         for ($j = 0; $j >= 0 && $j <= 99; $j++) {
           if(empty($deckListArtifactsArrayBaseNames[$j])){
             } else {
             $k++;
           }
         }

                  for ($i = 0; $i <= $k; $i++) {
                      echo $deckListArtifactsArrayBaseCardCount[$i] . " <a href='https://themtgsource.com/card/";
                      $finalCardNameBase1 = str_replace(" ", "-", $deckListArtifactsArrayBaseNames[$i]);
                      $finalCardNameBase2 = str_replace(",", "%2C", $finalCardNameBase1);
                      $finalCardNameBase3 = str_replace("&", "%26", $finalCardNameBase2);
                      $finalCardName = str_replace("'", "%27", $finalCardNameBase3);

                       echo $finalCardName . "'>" . $deckListArtifactsArrayBaseNames[$i];



                       $cardSearchBase = str_replace("-","%",$finalCardName);
                       $cardSearchBase2 = str_replace("%2C",",",$cardSearchBase);
                       $cardSearchBaseA = str_replace("%26","%",$cardSearchBase2);
                       $cardSearchBase3 = str_replace("%27","%",$cardSearchBaseA);
                       $cardSearchBase4 = trim($cardSearchBase3);
                       $cardSearch = filter_var($cardSearchBase4, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                       $searchParamLength = strlen($cardSearch);


                       $stmt2 = $pdo->prepare("SELECT DISTINCT scryfallId FROM cards USE INDEX (`name`) where scryfallId IS NOT NULL and LEFT(name, :nameCount) like :name and isPromo like 0 and setcode NOT REGEXP :regex1");
                       $stmt2->bindParam(":name",$cardSearch,PDO::PARAM_STR);
                       $stmt2->bindParam(":nameCount",$searchParamLength,PDO::PARAM_STR);
                       $stmt2->bindValue(":regex1","OHOP|OPCA|OPC2|OARC|PVAN|PMOA|OE01|PSAL|PS11|REN|4BB|FBB|PPRO|PWAR|PHJ|PAST|RIN",PDO::PARAM_STR);
                       $stmt2->execute();

                       while($row2 = $stmt2->fetch(PDO::FETCH_LAZY))  {
                               $cardId2 = $row2['scryfallId'];
                             }


                       echo "<div class='cardFloatingImage' style='position:absolute;'><img class='mobileHide' width='250' style='border-radius:13px;' src='https://www.themtgsource.com/media/cards/en/" . $cardId2 . ".jpg' /></div></a><br />";
                  }
       }
     if ($deckEnchantments == ""){}
       else{


         echo '<strong>Enchantments</strong><br />';

         $k = 0;
         for ($j = 0; $j >= 0 && $j <= 99; $j++) {
           if(empty($deckListEnchantmentsArrayBaseNames[$j])){
             } else {
             $k++;
           }
         }


                  for ($i = 0; $i <= $k; $i++) {
                      echo $deckListEnchantmentsArrayBaseCardCount[$i] . " <a href='https://themtgsource.com/card/";
                      $finalCardNameBase1 = str_replace(" ", "-", $deckListEnchantmentsArrayBaseNames[$i]);
                      $finalCardNameBase2 = str_replace(",", "%2C", $finalCardNameBase1);
                      $finalCardNameBase3 = str_replace("&", "%26", $finalCardNameBase2);
                      $finalCardName = str_replace("'", "%27", $finalCardNameBase3);

                       echo $finalCardName . "'>" . $deckListEnchantmentsArrayBaseNames[$i];



                       $cardSearchBase = str_replace("-","%",$finalCardName);
                       $cardSearchBase2 = str_replace("%2C",",",$cardSearchBase);
                       $cardSearchBaseA = str_replace("%26","%",$cardSearchBase2);
                       $cardSearchBase3 = str_replace("%27","%",$cardSearchBaseA);
                       $cardSearchBase4 = trim($cardSearchBase3);
                       $cardSearch = filter_var($cardSearchBase4, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                       $searchParamLength = strlen($cardSearch);


                       $stmt2 = $pdo->prepare("SELECT DISTINCT scryfallId FROM cards USE INDEX (`name`) where scryfallId IS NOT NULL and LEFT(name, :nameCount) like :name and isPromo like 0 and setcode NOT REGEXP :regex1");
                       $stmt2->bindParam(":name",$cardSearch,PDO::PARAM_STR);
                       $stmt2->bindParam(":nameCount",$searchParamLength,PDO::PARAM_STR);
                       $stmt2->bindValue(":regex1","OHOP|OPCA|OPC2|OARC|PVAN|PMOA|OE01|PSAL|PS11|REN|4BB|FBB|PPRO|PWAR|PHJ|PAST|RIN",PDO::PARAM_STR);
                       $stmt2->execute();

                       while($row2 = $stmt2->fetch(PDO::FETCH_LAZY))  {
                               $cardId2 = $row2['scryfallId'];
                             }


                       echo "<div class='cardFloatingImage' style='position:absolute;'><img class='mobileHide' width='250' style='border-radius:13px;' src='https://www.themtgsource.com/media/cards/en/" . $cardId2 . ".jpg' /></div></a><br />";
                  }
       }


     echo '
     </div>
     <div style="vertical-align:top;display:inline-block;width:48%;max-width:275px;text-align:left;line-height:27px;">';


              echo '<strong>Lands</strong><br />';

              $k = 0;
              for ($j = 0; $j >= 0 && $j <= 99; $j++) {
                if(empty($deckListLandsArrayBaseNames[$j])){
                  } else {
                  $k++;
                }
              }

              for ($i = 0; $i <= $k; $i++) {
                  echo $deckListLandsArrayBaseCardCount[$i] . " <a href='https://themtgsource.com/card/";
                  $finalCardNameBase1 = str_replace(" ", "-", $deckListLandsArrayBaseNames[$i]);
                  $finalCardNameBase2 = str_replace(",", "%2C", $finalCardNameBase1);
                  $finalCardNameBase3 = str_replace("&", "%26", $finalCardNameBase2);
                  $finalCardName = str_replace("'", "%27", $finalCardNameBase3);

                   echo $finalCardName . "'>" . $deckListLandsArrayBaseNames[$i];



                   $cardSearchBase = str_replace("-","%",$finalCardName);
                   $cardSearchBase2 = str_replace("%2C",",",$cardSearchBase);
                   $cardSearchBaseA = str_replace("%26","%",$cardSearchBase2);
                   $cardSearchBase3 = str_replace("%27","%",$cardSearchBaseA);
                   $cardSearchBase4 = trim($cardSearchBase3);
                   $cardSearch = filter_var($cardSearchBase4, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                   $searchParamLength = strlen($cardSearch);


                   $stmt2 = $pdo->prepare("SELECT DISTINCT scryfallId FROM cards USE INDEX (`name`) where scryfallId IS NOT NULL and LEFT(name, :nameCount) like :name and isPromo like 0 and setcode NOT REGEXP :regex1");
                   $stmt2->bindParam(":name",$cardSearch,PDO::PARAM_STR);
                   $stmt2->bindParam(":nameCount",$searchParamLength,PDO::PARAM_STR);
                   $stmt2->bindValue(":regex1","OHOP|OPCA|OPC2|OARC|PVAN|PMOA|OE01|PSAL|PS11|REN|4BB|FBB|PPRO|PWAR|PHJ|PAST|RIN",PDO::PARAM_STR);
                   $stmt2->execute();

                   while($row2 = $stmt2->fetch(PDO::FETCH_LAZY))  {
                           $cardId2 = $row2['scryfallId'];
                         }


                   echo "<div class='cardFloatingImage' style='position:absolute;'><img class='mobileHide' width='250' style='border-radius:13px;' src='https://www.themtgsource.com/media/cards/en/" . $cardId2 . ".jpg' /></div></a><br />";
              }



     echo '<strong>Sideboard</strong><br />';

     $k = 0;
     for ($j = 0; $j >= 0 && $j <= 99; $j++) {
       if(empty($deckListSideboardArrayBaseNames[$j])){
         } else {
         $k++;
       }
     }


              for ($i = 0; $i <= $k; $i++) {
                  echo $deckListSideboardArrayBaseCardCount[$i] . " <a href='https://themtgsource.com/card/";
                  $finalCardNameBase1 = str_replace(" ", "-", $deckListSideboardArrayBaseNames[$i]);
                  $finalCardNameBase2 = str_replace(",", "%2C", $finalCardNameBase1);
                  $finalCardNameBase3 = str_replace("&", "%26", $finalCardNameBase2);
                  $finalCardName = str_replace("'", "%27", $finalCardNameBase3);

                   echo $finalCardName . "'>" . $deckListSideboardArrayBaseNames[$i];



                   $cardSearchBase = str_replace("-","%",$finalCardName);
                   $cardSearchBase2 = str_replace("%2C",",",$cardSearchBase);
                   $cardSearchBaseA = str_replace("%26","%",$cardSearchBase2);
                   $cardSearchBase3 = str_replace("%27","%",$cardSearchBaseA);
                   $cardSearchBase4 = trim($cardSearchBase3);
                   $cardSearch = filter_var($cardSearchBase4, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                   $searchParamLength = strlen($cardSearch);


                   $stmt2 = $pdo->prepare("SELECT DISTINCT scryfallId FROM cards USE INDEX (`name`) where scryfallId IS NOT NULL and LEFT(name, :nameCount) like :name and isPromo like 0 and setcode NOT REGEXP :regex1");
                   $stmt2->bindParam(":name",$cardSearch,PDO::PARAM_STR);
                   $stmt2->bindParam(":nameCount",$searchParamLength,PDO::PARAM_STR);
                   $stmt2->bindValue(":regex1","OHOP|OPCA|OPC2|OARC|PVAN|PMOA|OE01|PSAL|PS11|REN|4BB|FBB|PPRO|PWAR|PHJ|PAST|RIN",PDO::PARAM_STR);
                   $stmt2->execute();


                   while($row2 = $stmt2->fetch(PDO::FETCH_LAZY))  {
                           $cardId2 = $row2['scryfallId'];
                         }


                   echo "<div class='cardFloatingImage' style='position:absolute;'><img class='mobileHide' width='250' style='border-radius:13px;' src='https://www.themtgsource.com/media/cards/en/" . $cardId2 . ".jpg' /></div></a><br />";
              }

     echo '</div>
     </div>
     <div style="text-align:center;background-color:#f2f2f2;border-radius:11px;vertical-align:top;height:175px;width:100%;display:inline-block;margin-bottom:25px;margin-top:50px;">
       <table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-radius:11px;">
         <tr>
           <td style="font-size:12px;text-align:center;padding-top:10px;padding-bottom:10px;padding-right:15px;"><strong>Ad</strong>
           </td>
         </tr>
				 <tr>
					 <td>
					 <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					 <!-- Ad_Full-W -->
					 <ins class="adsbygoogle"
								style="display:block"
								data-ad-client="ca-pub-9801940726420504"
								data-ad-slot="6450205192"
								data-ad-format="auto"
								data-full-width-responsive="true"></ins>
					 <script>
								(adsbygoogle = window.adsbygoogle || []).push({});
					 </script>
					 </td>
				 </tr>
       </table>
     </div>
     ';

     ?>


<?php $pdo=null; $pdo2=null; $pdo3=null; ?>


     </div>

      </div>
     </div>

     <?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php");?>

     </body>
     </html>
