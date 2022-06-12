<?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/a_config.php");?>
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
	$PAGE_TITLE = "Decks - Magic: The Gathering";
	include($_SERVER["DOCUMENT_ROOT"] . "/includes/head-tag-contents.php");
	?>
<link rel="canonical" href="<?php $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; echo $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">
</head>
<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=XXXXXXXX"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
<?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/design-top.php");?>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/navigation.php");?>

<?php
  require_once ('connect.php');


       $stmt = $pdo3->prepare("SELECT * FROM `decks`");
       $stmt->execute();
       $numRows = $stmt->rowCount();
       //$sql = "SELECT id, name, convertedManaCost, multiverseId, setCode, flavorText, text, type FROM cards where multiverseId IS NOT NULL and name like '".$cardSearch."'";
       //$result = mysqli_query($conn, $sql);
         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $deck_array[] = $row;
              $deckCount++;
         }


     ?>

     <div class="container" id="mainContent">
		 <div style="width:95%;max-width:1100px;margin-left:auto;margin-right:auto;margin-top:100px;">
     <h1>Decks</h1>
     <p><a style="" href="#Standard">Standard</a>&nbsp;&nbsp;/&nbsp;
       <a style="" href="#Pioneer">Pioneer</a>&nbsp;&nbsp;/&nbsp;
       <a style="" href="#Modern">Modern</a>&nbsp;&nbsp;/&nbsp;
       <a style="" href="#Pauper">Pauper</a>&nbsp;&nbsp;/&nbsp;
       <a style="" href="#Legacy">Legacy</a>&nbsp;&nbsp;/&nbsp;
       <a style="" href="#Commander">Commander</a></p>

       <div style="border-radius:10px;background-color:#333;color:#fff;padding:20px 30px 20px 30px;margin-top:35px;line-height:23px;"><p>Here you will find a selection of decks from across the formats of Magic: The Gathering. We are working to improve this page and bring you more decks, tools, and useful information &mdash; including a dedicated Commander platform. Bookmark this page and come back to see what the future&nbsp;holds!</p></div>

     <div style="width:100%;text-align:center;top:0;vertical-align:top;display:inline-block;">
     <?php


     echo "<h2 style='font-size:35px;padding-top:25px;'><a id='Standard' style='text-decoration:none;'>Standard Decks</a></h2><br /><br />";
     for ($x = 0; $x <= $deckCount - 1; $x++) { if ($deck_array[$x]["deckFormat"] == 'Standard') {
       echo '
       <a style="color:#fff;text-decoration:none;" href="https://themtgsource.com/deck.php/';
       print_r($deck_array[$x]["deckFormat"]); echo '/';
       $finalDeckEdit = strval(print_r($deck_array[$x]["deckName"]));
       $finalDeckNameBase1 = str_replace(" ", "-", $finalDeckEdit);
       $finalDeckNameBase2 = str_replace(",", "%2C", $finalDeckNameBase1);
       $finalDeckNameBase3 = str_replace("&", "%26", $finalDeckNameBase2);
       $finalDeckName = str_replace("'", "%27", $finalDeckNameBase3);

        echo $finalDeckname . '">
         <div style="width:25%;display:inline-block;min-width:225px;max-width:225px;margin-left:5px;margin-right:5px;margin-bottom:25px;">
           <table border="0" cellspacing="0" cellpadding="0" width="100%" height="100" style="background-color:#222;border-radius:11px;">
             <tr>
               <td align="center" style="height:187px;border-top: 1px solid #ededed;border-left: 1px solid #ededed;border-right: 1px solid #ededed;background-image: url(https://themtgsource.com/media/cards/en/'; print_r($deck_array[$x]["coverCardId"]); echo '.jpg);background-size:cover;">
               </td>
             </tr>
             <tr>
             <td style="font-size:16px;width:205px;display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;padding-left:10px;padding-right:10px;padding-bottom:11px;padding-top:8px;background-color:#000;color:#fff;border-left: 1px solid #000;border-right: 1px solid #000;">'; print_r($deck_array[$x]["deckName"]); echo '
             </td>
             </tr>
               <tr>
               <td style="background-color:#fff;color:#000;padding-top:5px;padding-bottom:15px;font-size:16px;line-height:23px;padding-left:15px;padding-right:15px;border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-bottom-right-radius:11px;border-bottom-left-radius:11px;">'; print_r($deck_array[$x]["colorIdentity"]);
               echo '<br />'; print_r($deck_array[$x]["deckFormat"]); echo '
               </td>
               </tr>
           </table>
         </div>
         </a>
       ';
     }
     }

     echo "<br /><br /><h2 style='font-size:35px;'><a id='Pioneer' style='text-decoration:none;'>Pioneer Decks</a></h2><br /><br />";
     for ($x = 0; $x <= $deckCount - 1; $x++) { if ($deck_array[$x]["deckFormat"] == 'Pioneer') {
       echo '
       <a style="color:#fff;text-decoration:none;" href="https://themtgsource.com/deck.php/';
       print_r($deck_array[$x]["deckFormat"]); echo '/';
       $finalDeckEdit = strval(print_r($deck_array[$x]["deckName"]));
       $finalDeckNameBase1 = str_replace(" ", "-", $finalDeckEdit);
       $finalDeckNameBase2 = str_replace(",", "%2C", $finalDeckNameBase1);
       $finalDeckNameBase3 = str_replace("&", "%26", $finalDeckNameBase2);
       $finalDeckName = str_replace("'", "%27", $finalDeckNameBase3);

        echo $finalDeckname . '">
         <div style="width:25%;display:inline-block;min-width:225px;max-width:225px;margin-left:5px;margin-right:5px;margin-bottom:25px;">
           <table border="0" cellspacing="0" cellpadding="0" width="100%" height="100" style="background-color:#222;border-radius:11px;">
           <tr>
             <td align="center" style="height:187px;border-top: 1px solid #ededed;border-left: 1px solid #ededed;border-right: 1px solid #ededed;background-image: url(https://themtgsource.com/media/cards/en/'; print_r($deck_array[$x]["coverCardId"]); echo '.jpg);background-size:cover;">
             </td>
           </tr>
           <tr>
           <td style="font-size:16px;width:205px;display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;padding-left:10px;padding-right:10px;padding-bottom:11px;padding-top:8px;background-color:#000;color:#fff;border-left: 1px solid #000;border-right: 1px solid #000;">'; print_r($deck_array[$x]["deckName"]); echo '
           </td>
           </tr>
               <tr>
               <td style="background-color:#fff;color:#000;padding-top:5px;padding-bottom:15px;font-size:17px;line-height:23px;padding-left:15px;padding-right:15px;border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-bottom-right-radius:11px;border-bottom-left-radius:11px;">'; print_r($deck_array[$x]["colorIdentity"]);
               echo '<br />'; print_r($deck_array[$x]["deckFormat"]);echo '
               </td>
               </tr>
           </table>
         </div>
         </a>
       ';
     }
     }

     echo "<br /><br /><h2 style='font-size:35px;'><a id='Modern' style='text-decoration:none;'>Modern Decks</a></h2><br /><br />";
     for ($x = 0; $x <= $deckCount - 1; $x++) { if ($deck_array[$x]["deckFormat"] == 'Modern') {
       echo '
       <a style="color:#fff;text-decoration:none;" href="https://themtgsource.com/deck.php/';
       print_r($deck_array[$x]["deckFormat"]); echo '/';
       $finalDeckEdit = strval(print_r($deck_array[$x]["deckName"]));
       $finalDeckNameBase1 = str_replace(" ", "-", $finalDeckEdit);
       $finalDeckNameBase2 = str_replace(",", "%2C", $finalDeckNameBase1);
       $finalDeckNameBase3 = str_replace("&", "%26", $finalDeckNameBase2);
       $finalDeckName = str_replace("'", "%27", $finalDeckNameBase3);

        echo $finalDeckname . '">
         <div style="width:25%;display:inline-block;min-width:225px;max-width:225px;margin-left:5px;margin-right:5px;margin-bottom:25px;">
           <table border="0" cellspacing="0" cellpadding="0" width="100%" height="100" style="background-color:#222;border-radius:11px;">
           <tr>
             <td align="center" style="height:187px;border-top: 1px solid #ededed;border-left: 1px solid #ededed;border-right: 1px solid #ededed;background-image: url(https://themtgsource.com/media/cards/en/'; print_r($deck_array[$x]["coverCardId"]); echo '.jpg);background-size:cover;">
             </td>
           </tr>
           <tr>
           <td style="font-size:16px;width:205px;display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;padding-left:10px;padding-right:10px;padding-bottom:11px;padding-top:8px;background-color:#000;color:#fff;border-left: 1px solid #000;border-right: 1px solid #000;">'; print_r($deck_array[$x]["deckName"]); echo '
           </td>
           </tr>
               <tr>
               <td style="background-color:#fff;color:#000;padding-top:5px;padding-bottom:15px;font-size:17px;line-height:23px;padding-left:15px;padding-right:15px;border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-bottom-right-radius:11px;border-bottom-left-radius:11px;">'; print_r($deck_array[$x]["colorIdentity"]);
               echo '<br />'; print_r($deck_array[$x]["deckFormat"]);echo '
               </td>
               </tr>
           </table>
         </div>
         </array>
       ';
     }
     }

     echo "<br /><br /><h2 style='font-size:35px;'><a id='Pauper' style='text-decoration:none;'>Pauper Decks</a></h2><br /><br />";
     for ($x = 0; $x <= $deckCount - 1; $x++) { if ($deck_array[$x]["deckFormat"] == 'Pauper') {
       echo '
       <a style="color:#fff;text-decoration:none;" href="https://themtgsource.com/deck.php/';
       print_r($deck_array[$x]["deckFormat"]); echo '/';
       $finalDeckEdit = strval(print_r($deck_array[$x]["deckName"]));
       $finalDeckNameBase1 = str_replace(" ", "-", $finalDeckEdit);
       $finalDeckNameBase2 = str_replace(",", "%2C", $finalDeckNameBase1);
       $finalDeckNameBase3 = str_replace("&", "%26", $finalDeckNameBase2);
       $finalDeckName = str_replace("'", "%27", $finalDeckNameBase3);

        echo $finalDeckname . '">
         <div style="width:25%;display:inline-block;min-width:225px;max-width:225px;margin-left:5px;margin-right:5px;margin-bottom:25px;">
           <table border="0" cellspacing="0" cellpadding="0" width="100%" height="100" style="background-color:#222;border-radius:11px;">
           <tr>
             <td align="center" style="height:187px;border-top: 1px solid #ededed;border-left: 1px solid #ededed;border-right: 1px solid #ededed;background-image: url(https://themtgsource.com/media/cards/en/'; print_r($deck_array[$x]["coverCardId"]); echo '.jpg);background-size:cover;">
             </td>
           </tr>
           <tr>
           <td style="font-size:16px;width:205px;display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;padding-left:10px;padding-right:10px;padding-bottom:11px;padding-top:8px;background-color:#000;color:#fff;border-left: 1px solid #000;border-right: 1px solid #000;">'; print_r($deck_array[$x]["deckName"]); echo '
           </td>
           </tr>
               <tr>
               <td style="background-color:#fff;color:#000;padding-top:5px;padding-bottom:15px;font-size:17px;line-height:23px;padding-left:15px;padding-right:15px;border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-bottom-right-radius:11px;border-bottom-left-radius:11px;">'; print_r($deck_array[$x]["colorIdentity"]);
               echo '<br />'; print_r($deck_array[$x]["deckFormat"]);echo '
               </td>
               </tr>
           </table>
         </div>
         </a>
       ';
     }
     }


     echo "<br /><br /><h2 style='font-size:35px;'><a id='Legacy' style='text-decoration:none;'>Legacy Decks</a></h2><br /><br />";
     for ($x = 0; $x <= $deckCount - 1; $x++) { if ($deck_array[$x]["deckFormat"] == 'Legacy') {
       echo '
       <a style="color:#fff;text-decoration:none;" href="https://themtgsource.com/deck.php/';
       print_r($deck_array[$x]["deckFormat"]); echo '/';
       $finalDeckEdit = strval(print_r($deck_array[$x]["deckName"]));
       $finalDeckNameBase1 = str_replace(" ", "-", $finalDeckEdit);
       $finalDeckNameBase2 = str_replace(",", "%2C", $finalDeckNameBase1);
       $finalDeckNameBase3 = str_replace("&", "%26", $finalDeckNameBase2);
       $finalDeckName = str_replace("'", "%27", $finalDeckNameBase3);

        echo $finalDeckname . '">
         <div style="width:25%;display:inline-block;min-width:225px;max-width:225px;margin-left:5px;margin-right:5px;margin-bottom:25px;">
           <table border="0" cellspacing="0" cellpadding="0" width="100%" height="100" style="background-color:#222;border-radius:11px;">
           <tr>
             <td align="center" style="height:187px;border-top: 1px solid #ededed;border-left: 1px solid #ededed;border-right: 1px solid #ededed;background-image: url(https://themtgsource.com/media/cards/en/'; print_r($deck_array[$x]["coverCardId"]); echo '.jpg);background-size:cover;">
             </td>
           </tr>
           <tr>
           <td style="font-size:16px;width:205px;display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;padding-left:10px;padding-right:10px;padding-bottom:11px;padding-top:8px;background-color:#000;color:#fff;border-left: 1px solid #000;border-right: 1px solid #000;">'; print_r($deck_array[$x]["deckName"]); echo '
           </td>
           </tr>
               <tr>
               <td style="background-color:#fff;color:#000;padding-top:5px;padding-bottom:15px;font-size:17px;line-height:23px;padding-left:15px;padding-right:15px;border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-bottom-right-radius:11px;border-bottom-left-radius:11px;">'; print_r($deck_array[$x]["colorIdentity"]);
               echo '<br />'; print_r($deck_array[$x]["deckFormat"]);echo '
               </td>
               </tr>
           </table>
         </div>
         </a>
       ';
     }
     }


     echo "<br /><br /><h2 style='font-size:35px;'><a id='Commander' style='text-decoration:none;'>Commander Decks</a></h2><br /><br />";
     for ($x = 0; $x <= $deckCount - 1; $x++) { if ($deck_array[$x]["deckFormat"] == 'Commander') {
       echo '
       <a style="color:#fff;text-decoration:none;" href="https://themtgsource.com/deck.php/';
       print_r($deck_array[$x]["deckFormat"]); echo '/';
       $finalDeckEdit = strval(print_r($deck_array[$x]["deckName"]));
       $finalDeckNameBase1 = str_replace(" ", "-", $finalDeckEdit);
       $finalDeckNameBase2 = str_replace(",", "%2C", $finalDeckNameBase1);
       $finalDeckNameBase3 = str_replace("&", "%26", $finalDeckNameBase2);
       $finalDeckName = str_replace("'", "%27", $finalDeckNameBase3);

        echo $finalDeckname . '">
         <div style="width:25%;display:inline-block;min-width:225px;max-width:225px;margin-left:5px;margin-right:5px;margin-bottom:25px;">
           <table border="0" cellspacing="0" cellpadding="0" width="100%" height="100" style="background-color:#222;border-radius:11px;">
           <tr>
             <td align="center" style="height:187px;border-top: 1px solid #ededed;border-left: 1px solid #ededed;border-right: 1px solid #ededed;background-image: url(https://themtgsource.com/media/cards/en/'; print_r($deck_array[$x]["coverCardId"]); echo '.jpg);background-size:cover;">
             </td>
           </tr>
           <tr>
           <td style="font-size:16px;width:205px;display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;padding-left:10px;padding-right:10px;padding-bottom:11px;padding-top:8px;background-color:#000;color:#fff;border-left: 1px solid #000;border-right: 1px solid #000;">'; print_r($deck_array[$x]["deckName"]); echo '
           </td>
           </tr>
               <tr>
               <td style="background-color:#fff;color:#000;padding-top:5px;padding-bottom:15px;font-size:17px;line-height:23px;padding-left:15px;padding-right:15px;border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-bottom-right-radius:11px;border-bottom-left-radius:11px;">'; print_r($deck_array[$x]["colorIdentity"]);
               echo '<br />'; print_r($deck_array[$x]["deckFormat"]);echo '
               </td>
               </tr>
           </table>
         </div>
         </a>
       ';
     }
     }
     ?>


<?php $pdo=null; $pdo2=null; $pdo3=null; ?>


     </div>
	 </div>
     </div>

     <?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php");?>

     </body>
     </html>
