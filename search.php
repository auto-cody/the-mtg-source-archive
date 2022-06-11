<?php
$searchTrim = trim($_GET['card']);
$cardSearchBase = str_replace("'","%",$searchTrim);
$cardSearchBase2 = "%" . $cardSearchBase . "%";
$cardSearch = filter_var($cardSearchBase2, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//$cardSearchBase2 = str_replace("'", "''", $cardSearchBase);
?>



<?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/a_config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TXN77XP');</script>
<!-- End Google Tag Manager -->
	<?php
  $PAGE_TITLE = "Search Results: " . $searchTrim;
	include($_SERVER["DOCUMENT_ROOT"] . "/includes/head-tag-contents.php");?>
	<link rel="canonical" href="<?php $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; echo $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">
</head>
<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TXN77XP"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
<?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/navigation.php");?>

<div class="container" id="mainContent">
	<div style="width:95%;max-width:1100px;margin-left:auto;margin-right:auto;margin-top:100px;">
	<h1>Results for <em>"<?php echo $searchTrim; ?>"</em></h1>
	<p>


<!-- Card Search PHP -->
    <?php

      require_once ('connect.php');
      // Create connection
      //$conn = mysqli_connect($servername, $username, $password, $dbname);
      // Check connection
      //if (!$conn) {
        //die("Connection failed: " . mysqli_connect_error());
      //}


      $stmt = $pdo->prepare("SELECT DISTINCT tcgplayerProductId, scryfallId, layout, rarity, id, name, manaCost, convertedManaCost, multiverseId, setCode, flavorText, power, toughness, `text`, type FROM cards where scryfallId IS NOT NULL and name like :name and setcode NOT REGEXP :regex1 and tcgplayerProductId is not null group by name order by name asc");
      $stmt->bindParam(":name",$cardSearch,PDO::PARAM_STR);
      $stmt->bindValue(":regex1","OHOP|OPCA|OPC2|OARC|PVAN|PMOA|OE01|PSAL|PS11|REN|4BB|FBB|PPRO|PWAR|PHJ|PAST|RIN",PDO::PARAM_STR);
      $stmt->execute();
      $numRows = $stmt->rowCount();
      //$sql = "SELECT id, name, convertedManaCost, multiverseId, setCode, flavorText, text, type FROM cards where multiverseId IS NOT NULL and name like '".$cardSearch."'";
      //$result = mysqli_query($conn, $sql);
      if ($numRows == 1) {
      echo "<em>Your search yielded " . $numRows . " result...</em>";
			} else if($numRows > 60) {
				echo "<em>Your search yielded " . $numRows . " results... Only the first 60 results are shown. Try narrowing down your search.</em>";
			} else {
			echo "<em>Your search yielded " . $numRows . " results...</em>";
			}
      echo "<div style='width:100%;text-align:center;padding-top:10px;overflow:hidden;'>";
      if ($numRows > 0) {
				while ($i < 60 and $numRows > $i) {
					$i++;
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $cardLayout = $row['layout'];
          echo "
          <div id='outer' class='outer paddingLeft0' style='display:inline-block;padding-left:15px;padding-top:10px;'>
                <div align='center' id='topMagGlass' class='topMagGlass mobileHide' style='color:#fff;'><i class='fa fa-search'></i>
                <div id='top' class='top' style='border:1px solid #D4AF37;background-color:#000;opacity:0.9;width:255px;height:330px;border-radius:11px;'>
                </div>
                <div valign='top' id='cardHoverText' class='top' style='color:#ffff;font-size:13px;line-height:17px;height:330px;padding-top:5px;'>
                <table valign='top' border='0' cellspacing='0' cellpadding='0' width='255' height='300'>
                <tr>
                <td valign='bottom' align='center' style='padding-bottom:10px;width:100%;height:10%;color:#ffff;'>" . $row["name"] . "&nbsp;&nbsp;&nbsp;" . $row["manaCost"] . "
                </td>
                </tr>";
                if (is_null($row["text"])) {
																	echo "
																	<tr>
																		<td>
																			<table border='0' cellspacing='0' cellpadding='0' style='width:100%;margin-left:0px;margin-right:7px;padding-left:7px;padding-right:5px;'>
																				<tr>
																					<td align='center'>&nbsp;
																					</td>
																				</tr>
																			</table>
																		</td>
																	</tr>";

                                      } else {
                                        echo "
                                        <tr>
                                          <td>
                                            <table border='0' cellspacing='0' cellpadding='0' style='width:100%;margin-left:0px;margin-right:7px;padding-left:7px;padding-right:5px;'>
                                              <tr>
                                                <td align='center' style='color:#ffff;'>";
                                                 $finalCardText = str_replace("\n", "\n\n", $row["text"]);
                                                 echo nl2br($finalCardText) . "
                                                </td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>";
                                      }
                echo "</table>
                </div>
                </div>
                <div id='below' class='below' style='width:100%;max-width:255px;' align='center'>
                <a href='card/";
								$finalCardNameBase1 = str_replace(" ", "-", $row["name"]);
                $finalCardNameBase2 = str_replace(",", "%2C", $finalCardNameBase1);
								$finalCardNameBase3 = str_replace("&", "%26", $finalCardNameBase2);
                $finalCardName = str_replace("'", "%27", $finalCardNameBase3);
                echo $finalCardName. "?set=" . strtolower($row['setCode']) . "'><img loading='lazy' style='border-radius:13px;max-width:223px;' src='https://www.themtgsource.com/media/cards/en/" . $row['scryfallId']. ".jpg' width='100%' /></a>
                </div>
          </div>";

			}
      } else {
        echo "Your search did not return any results";
      }
      echo "
			<div style='text-align:center;background-color:#f2f2f2;border-radius:11px;vertical-align:top;height:175px;width:100%;display:inline-block;margin-bottom:25px;margin-top:50px;'>
				<table border='0' cellspacing='0' cellpadding='0' width='100%' style='border-radius:11px;'>
					<tr>
						<td style='font-size:12px;text-align:center;padding-top:10px;padding-bottom:10px;padding-right:15px;'><strong>Ad</strong>
						</td>
					</tr>
					<tr>
						<td>
						<script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script>
						<!-- Ad_Full-W -->
						<ins class='adsbygoogle'
								 style='display:block'
								 data-ad-client='xxxxxxxxx'
								 data-ad-slot='xxxxxxxx'
								 data-ad-format='auto'
								 data-full-width-responsive='true'></ins>
						<script>
								 (adsbygoogle = window.adsbygoogle || []).push({});
						</script>
						</td>
					</tr>
				</table>
			</div>
			</div>";


    ?>

<?php $pdo=null; $pdo2=null; $pdo3=null; ?>
<!-- End Search PHP -->



  </p>
</div>
</div>

<?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php");?>

</body>
</html>
