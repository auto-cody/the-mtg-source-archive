<?php
$searchTrimBase = trim($_SERVER['REQUEST_URI']);
$setCodeUrl = preg_match_all('#set=([^\s]+)#', $searchTrimBase, $setCodeUrl2);
$setCodeUrlFinal = $setCodeUrl2[1][0];
$regUrlPattern = preg_match('/\?set\=(.*)/', $searchTrimBase, $setParam);
$searchTrimSubBase = str_replace(strval($setParam[0]), "", $searchTrimBase);
$searchTrim = str_replace("/card/","",$searchTrimSubBase);
$cardSearchBase = str_replace("-","%",$searchTrim);
$cardSearchBase2 = str_replace("%2C",",",$cardSearchBase);
$cardSearchBaseA = str_replace("%26","%",$cardSearchBase2);
$cardSearchBase3 = str_replace("%27","%",$cardSearchBaseA);
$cardSearch = filter_var($cardSearchBase3, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//$cardSearchBase2 = str_replace("'", "''", $cardSearchBase);

if ($setCodeUrlFinal == ""){
	$setCodeUrlFinal = "%";
} else{}
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
})(window,document,'script','dataLayer','XXXXXXXX');</script>
<!-- End Google Tag Manager -->
	<?php

	require_once ('connect.php');
  // Create connection
  //$conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  //if (!$conn) {
    //die("Connection failed: " . mysqli_connect_error());
  //}

  $stmt = $pdo->prepare("SELECT DISTINCT isPromo, isDateStamped, isAlternative,`number`, tcgplayerProductId, scryfallId, rarity, uuid, name, manaCost, convertedManaCost, multiverseId, setCode, flavorText, power, toughness, text, names, originalText, loyalty, artist, isOnlineOnly, isReserved, printings, rarity, leadershipSkills, colorIdentity, type
    FROM cards
    where scryfallId IS NOT NULL and name like :name and setcode NOT REGEXP :regex1 and setCode like :setregex
    group by name order by name");
  $stmt->bindParam(":name",$cardSearch,PDO::PARAM_STR);
  $stmt->bindValue(":regex1","OHOP|OPCA|OPC2|OARC|PVAN|PMOA|OE01|PSAL|PS11|REN|4BB|FBB|PPRO|PWAR|PHJ|PAST|RIN",PDO::PARAM_STR);
  $stmt->bindValue(":setregex",$setCodeUrlFinal,PDO::PARAM_STR);
  $stmt->execute();
  $numRows = $stmt->rowCount();
  //$sql = "SELECT id, name, convertedManaCost, multiverseId, setCode, flavorText, text, type FROM cards where multiverseId IS NOT NULL and name like '".$cardSearch."'";
  //$result = mysqli_query($conn, $sql);

  if ($numRows == 0) {

  }
  else {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))  {

			$cardId = $row['uuid'];
      $cardId2 = $row['scryfallId'];
      $cardMultiverseId = $row['multiverseId'];
      $cardName = $row['name'];
      $cardDualFacedName = $row['names'];
      $cardManaCost = $row['manaCost'];
      $cardCMC = $row['convertedManaCost'];
      $cardType = $row['type'];
      $cardOriginalText = $row['originalText'];
      $cardOracleText = $row['text'];
      $cardFlavorText = $row['flavorText'];
      $cardPower = $row['power'];
      $cardToughness = $row['toughness'];
      $cardLoyalty = $row['loyalty'];
      $cardArtist = $row['artist'];
      $cardOnlineOnly = $row['isOnlineOnly'];
      $cardReservedList = $row['isReserved'];
      $cardSetCode = $row['setCode'];
      $cardPrintings = $row['printings'];
      $cardRarity = $row['rarity'];
      $cardLeadershipSkills = $row['leadershipSkills'];
      $cardColorIdentity = $row['colorIdentity'];
			$tcgPlayerId = $row['tcgplayerProductId'];

    }
  };

	$stmt6 = $pdo->prepare("SELECT name, isOnlineOnly
    FROM sets
    where code like :cardsetregex");
  $stmt6->bindValue(":cardsetregex",$cardSetCode,PDO::PARAM_STR);
  $stmt6->execute();
  $numRows6 = $stmt6->rowCount();
  //$sql = "SELECT id, name, convertedManaCost, multiverseId, setCode, flavorText, text, type FROM cards where multiverseId IS NOT NULL and name like '".$cardSearch."'";
  //$result = mysqli_query($conn, $sql);

  if ($numRows6 == 0) {
    echo "That Card Doesn't Exist...<br /><br />Please Check Your Spelling And Try Again";
  }
  else {
    while($row6 = $stmt6->fetch(PDO::FETCH_ASSOC))  {
				$fullSetName = $row6['name'];
				$isOnlineOnly = $row6['isOnlineOnly'];
		}
  };



$PAGE_TITLE = $cardName . " (" . $cardSetCode . ")";
include($_SERVER["DOCUMENT_ROOT"] . "/includes/head-tag-contents.php");?>
<?php echo '
<meta name="description" content="' . $cardName . ' - Set: ' . $fullSetName . '(' . $cardSetCode . ') - CMC:(' . $cardCMC . ') - Rarity:(' . $cardRarity . ') - Oracle Text: ' . $cardOracleText . ' // View the latest prices and rulings." />';
?>
<?php echo '
<meta name="keywords" content="Magic: The Gathering ' . $cardName . ', MTG ' . $cardName . ', '
. $cardName . ' ' . $fullSetName . ', ' . $cardName . ' ' . $cardSetCode . ', ' . $cardName . ' Rulings, ' . $cardName . ' Formats, ' . $cardName . ' ' . 'Prices" />';
?>
<meta name="robots" content="index, follow" />


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



// Connect to TCGplayer API and get Bearer Token
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.tcgplayer.com/token');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");

	$headers = array();
	$headers[] = 'Content-Type: application/x-www-form-urlencoded';
	$headers[] = 'Application-Name: The MTG Source';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	$array = json_decode($result, true);
	$bearerT = $array['access_token'];

	if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);


// Get TCGplayer API pricing by TCGplayer ID
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.tcgplayer.com/pricing/product/' . $tcgPlayerId);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


	$headers = array();
	$headers[] = 'Accept: application/json';
	$headers[] = "Authorization: bearer " . $bearerT;
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$resultPrice = curl_exec($ch);
	$array3 = json_decode($resultPrice, true);
	$array4 = json_decode($resultPrice, true);

	if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);


//Function for searching TCGplayer API price return for subTypeName of Foil (arguments passed below)
	function shapeSpace_search_array($needle, $haystack) {

		if (in_array($needle, $haystack)) {
			return true;
		}

		foreach ($haystack as $item) {
			if (is_array($item) && array_search($needle, $item))
			return true;
		}

		return false;

	}

//Remove each TCGplayer API price return where subTypeName is Foil
	for ($e = 0; $e < count($array3['results']); $e++) {
			if (shapeSpace_search_array('Foil', $array3['results'][$e])) {
				unset($array3['results'][$e]);
				$array3['results'] = array_values($array3['results']);
			}
	}

//Assign variables for TCGplayer Non-Foil prices (and set to retain two decimal places)
$tcgLow = number_format((float)$array3['results'][0]['lowPrice'], 2, '.', '');
$tcgMid = number_format((float)$array3['results'][0]['midPrice'], 2, '.', '');
$tcgHigh = number_format((float)$array3['results'][0]['highPrice'], 2, '.', '');
$tcgMarket = number_format((float)$array3['results'][0]['marketPrice'], 2, '.', '');



//Remove each TCGplayer API price return where subTypeName is Normal
	for ($e = 0; $e < count($array4['results']); $e++) {
			if (shapeSpace_search_array('Normal', $array4['results'][$e])) {
				unset($array4['results'][$e]);
				$array4['results'] = array_values($array4['results']);
			}
	}

//Assign TCGplayer Foil Pricing
$tcgFoilMarket = number_format((float)$array4['results'][0]['midPrice'], 2, '.', '');



// Get TCGplayer API SKU details through TCGplayer ID and assign TCGplayer product URL
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.tcgplayer.com/catalog/products/' . $tcgPlayerId);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


	$headers = array();
	$headers[] = 'Accept: application/json';
	$headers[] = "Authorization: bearer " . $bearerT;
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$resultProduct = curl_exec($ch);
	$array5 = json_decode($resultProduct, true);
	$tcgLink = $array5['results'][0]['url'];

?>

<div class="container" id="mainContent">
	<div style="width:100%;margin-top:100px;margin-left:auto;margin-right:auto;margin-top:130px;">

	<p>

    <?php


            echo
           "<div class='mobileCenter' style='text-align:center;'>
              <div class='margin0' style='display:inline-block;height:100%;vertical-align:top;width:100%;max-width:275px;padding-bottom:30px;margin-right:25px;'>
              <img style='border-radius:13px;max-width:275px;height:100%;vertical-align:top;' src='https://www.themtgsource.com/media/cards/en/" . $cardId2 . ".jpg' width='100%' />
              </div>
              <div style='display:inline-block;text-align:left;'>
									<table cellspacing='0' cellpadding='0' style='height:380px;width:100%;min-width:325px;max-width:400px;'>
									<tr>
										<td style='height:50px;text-align:left;padding-left:15px;padding-right:10px;background-color:#000;color:#fff;border-top-right-radius:8px;border-top-left-radius:8px;border: 1px solid #000;'><strong><h1 style='font-size:18px;display:inline;letter-spacing:0.8px;'>";
										if ($cardDualFacedName != "") {
												 echo $cardDualFacedName;
												} else {
												 echo $cardName;
												}
										 echo "</h1></strong>&nbsp;&nbsp;" . $cardManaCost . "&nbsp;<span style='font-size:14px;'>(CMC:&nbsp;" . $cardCMC . ")</span>
										</td>
									</tr>
										<tr>
											<td style='color:#000;padding-left:15px;padding-right:10px;border-bottom: 1px solid #000;height:50px;background-color:#fff;border-left:1px solid #000;border-right:1px solid #000;'>" . $cardType . "
											</td>
										</tr>
										<tr>
											<td style='color:#000;padding-left:15px;padding-right:10px;border-bottom: 1px solid #000;height:50px;background-color:#fff;border-left:1px solid #000;border-right:1px solid #000;'>Set: " . $fullSetName ." (" . $cardSetCode . ")
											</td>
										</tr>";
										if (is_null($cardOracleText)) {}
											else {
												echo "
												<tr>
													<td style='line-height:22px;color:#000;padding-left:15px;padding-right:10px;border-bottom: 1px solid #000;padding-top:15px;padding-bottom:15px;background-color:#fff;border-left:1px solid #000;border-right:1px solid #000;'>";
													$finalOracleText = str_replace("\n", "\n\n", $cardOracleText);
													echo nl2br($finalOracleText) . "
													</td>
												</tr>";
											}
											if (is_null($cardFlavorText)) {}
												else {
													echo "
													<tr>
														<td style='line-height:22px;color:#000;padding-left:15px;padding-right:10px;border-bottom: 1px solid #000;padding-top:15px;padding-bottom:15px;background-color:#fff;border-left:1px solid #000;border-right:1px solid #000;'><em>";
														$finalFlavorText = str_replace("\n", "\n\n", $cardFlavorText);
														echo nl2br($finalFlavorText) . "
														</em></td>
													</tr>";
												}
												if (is_null($cardPower)) {}
													else {
														echo "
														<tr>
															<td style='color:#000;padding-left:15px;padding-right:10px;border-bottom: 1px solid #000;height:50px;background-color:#fff;border-left:1px solid #000;border-right:1px solid #000;'>" . $cardPower . "/" . $cardToughness . "
															</td>
														</tr>";
													}
													if (is_null($cardLoyalty)) {}
														else {
															echo "
															<tr>
																<td style='color:#000;padding-left:15px;padding-right:10px;border-bottom: 1px solid #000;height:50px;background-color:#fff;border-left:1px solid #000;border-right:1px solid #000;'>Starting Loyalty: " . $cardLoyalty . "
																</td>
															</tr>";
														}
														if (is_null($cardArtist)) {}
															else {
																echo "
																<tr>
																	<td style='color:#000;padding-left:15px;padding-right:10px;height:50px;background-color:#fff;border-bottom-right-radius:8px;border-bottom-left-radius:8px;border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;'>Art: " . $cardArtist . "
																	</td>
																</tr>";
															}
										echo "
									</table>
								</div>

								<div class='cardAd' style='text-align:center;background-color:#f2f2f2;border-radius:11px;vertical-align:top;height:250px;width:200px;display:inline-block;margin-left:25px;margin-bottom:25px;'>
									<table border='0' cellspacing='0' cellpadding='0' width='100%' style='border-radius:11px;'>
										<tr>
											<td style='font-size:12px;text-align:center;padding-top:10px;padding-bottom:10px;padding-right:15px;'><strong>Ad</strong>
											</td>
										</tr>
										<tr>
											<td>
											<script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script>
											<!-- Ad-Display-Square -->
											<ins class='adsbygoogle'
											     style='display:inline-block;width:200px;height:200px'
											     data-ad-client='xxxxxxxxx'
											     data-ad-slot='xxxxxxxxx'></ins>
											<script>
											     (adsbygoogle = window.adsbygoogle || []).push({});
											</script>
											</td>
										</tr>
									</table>
								</div>

								</div>
								<br /><br />
								<div style='margin:auto;width:100%;max-width:1100px;text-align:center;'>
								<div style='display:inline-block;vertical-align:top;'>
									<table border='0' cellspacing='0' cellpadding='0'>
										<tr>
											<td align='center' valign='top'><strong>Formats:</strong><br /><br />
											";
												$stmt2 = $pdo->prepare("SELECT format, status as legal_status
						              FROM legalities
						              where uuid like :uuid and format NOT REGEXP :regex2");
						            $stmt2->bindParam(":uuid",$cardId,PDO::PARAM_STR);
						            $stmt2->bindValue(":regex2","future|penny|duel|oldschool",PDO::PARAM_STR);
						            $stmt2->execute();
						            $numRows2 = $stmt2->rowCount();



						               while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))  {
						                 $cardFormat = $row2['format'];
						                 $cardFormatLegality = $row2['legal_status'];

						                  echo
						                    "<div style='border-radius:4px;height:28px;";
																if ($cardFormatLegality == "Banned"){
																echo "background-color:#850003;";
															} else if ($cardFormatLegality == "Restricted"){
																echo "background-color:#515151;";
															} else {
																echo "background-color:#067600;";
															}
																echo "
																text-align:center;line-height:28px;margin:auto;color:#fff;padding-left:15px;padding-right:15px;'>" . ucwords($cardFormat) . "&nbsp;-&nbsp;" . ucwords($cardFormatLegality) . "</div><br />";
						               }

											echo "
											</td>
										</tr>
									</table>
								</div>
								<a style='color:#fff;' href='" . $tcgLink . "' target='_blank'>
								<div style='display:inline-block;vertical-align:top;margin-left:50px;'>
									<table border='0' cellspacing='0' cellpadding='0' width='200'>
										<tr>
											<td style='vertical-align:middle;text-align:center;border-bottom: 1px solid #000000;height:50px;background-color:#4481c3;color:#fff;border:solid 1px #000000;border-top-right-radius:8px;border-top-left-radius:8px;'><img alt='Buy on TCGplayer' title='Buy on TCGplayer' style='display:block;width:90px;margin:auto;' src='https://themtgsource.com/media/icons/tcgplayerIcon.png' />
											</td>
											</tr>
											<tr>
											<td style='color:#000;line-height:23px;text-align:center;padding-top:15px;padding-bottom:10px;padding-left:5px;padding-right:5px;background-color:#fff;border-left:1px solid #000000;border-right:1px solid #000000;'><strong><i>";
											if ($cardDualFacedName != "") {
													 echo $cardDualFacedName;
													} else {
													 echo $cardName;
													}
											 echo "</i></strong><br />Set: " . $cardSetCode . "
											</td>
											</tr>
											<tr>
											<td style='color:#000;line-height:15px;padding-left:15px;padding-right:10px;padding-top:10px;padding-bottom:10px;background-color:#ededed;border-left:1px solid #000000;border-right:1px solid #000000;'>
											";

											 if ($tcgLow == "0.00"){echo "<strong style='color:#4481c3;'>Low:</strong>&nbsp;&nbsp;N/A";}else{echo "<strong style='color:#4481c3;'>Low:</strong>&nbsp;&nbsp;$" . $tcgLow;}
											 echo "
											</td>
										</tr>
										<tr>
										<td style='color:#000;line-height:15px;padding-left:15px;padding-right:10px;padding-top:10px;padding-bottom:10px;background-color:#fff;border-left:1px solid #000000;border-right:1px solid #000000;'>
										";

										 if ($tcgMid == "0.00"){echo "<strong style='color:#4481c3;'>Median:</strong>&nbsp;&nbsp;N/A";}else{echo "<strong style='color:#4481c3;'>Median:</strong>&nbsp;&nbsp;$" . $tcgMid;}
										 echo "
										</td>
										</tr>
										<tr>
										<td style='color:#000;line-height:15px;padding-left:15px;padding-right:10px;padding-top:10px;padding-bottom:10px;background-color:#ededed;border-left:1px solid #000000;border-right:1px solid #000000;'>
										";

										 if ($tcgMarket == "0.00"){echo "<strong style='color:#4481c3;'>Market:</strong>&nbsp;&nbsp;N/A";}else{echo "<strong style='color:#4481c3;'>Market:</strong>&nbsp;&nbsp;$"
											 . $tcgMarket;}
											 echo "
										</td>
										</tr>
										<tr>
										<td style='color:#000;line-height:15px;padding-left:15px;padding-right:10px;border-bottom: 1px solid #000000;padding-top:10px;padding-bottom:15px;background-color:#fff;border-left:1px solid #000000;border-right:1px solid #000000;border-bottom-right-radius:8px;border-bottom-left-radius:8px;'>
										";
										if ($tcgFoilMarket == "0.00"){echo "<strong style='color:#4481c3;'>Foil:</strong>&nbsp;&nbsp;N/A";}else{echo "<strong style='color:#4481c3;'>Foil:</strong>&nbsp;&nbsp;$" . $tcgFoilMarket;}
										echo "

										</td>
									</tr>
										<tr>
										<td style='padding-top:10px;'>
										<div class='tcgCTA' style='height:50px;text-align:center;border-radius:4px;background-color:#4481c3;text-align:center;line-height:50px;margin:auto;color:#fff;padding-left:15px;padding-right:15px;'>
										Buy on TCGplayer
										</div>
										</td>
										</tr>
									</table>
								</div>
								</a>
								</div>
							";

      ?>


      <?php

      $stmt3 = $pdo->prepare("SELECT name, scryfallId, setCode
        FROM cards
        where scryfallId IS NOT NULL and name like :name2 and setcode NOT REGEXP :regex3
        order by scryfallId");
      $stmt3->bindParam(":name2",$cardName,PDO::PARAM_STR);
      $stmt3->bindValue(":regex3","OHOP|OPCA|OPC2|OARC|PVAN|PMOA|OE01|PSAL|PS11|REN|4BB|FBB|PPRO|PWAR|PHJ|PAST|RIN",PDO::PARAM_STR);
      $stmt3->execute();
      $numRows3 = $stmt3->rowCount();
          echo "<br />
					<div style='width:95%;max-width:1100px;margin:auto;text-align:center;'>
          <div class='homeModuleTitle' style='padding-top:15px;padding-bottom:15px;margin-top:50px;background-color:#000;border-top-right-radius:8px;border-top-left-radius:8px;color:#fff;border:1px solid #000;'><strong>";
					if ($cardDualFacedName != "") {
							 echo $cardDualFacedName;
							} else {
							 echo $cardName;
							}

					echo " Card Printings</strong></div>
          <div style='background-color:#fff;border: 1px solid #000;border-bottom-right-radius:11px;border-bottom-left-radius:11px;text-align:center;padding-top:35px;padding-bottom:35px;'>
          <div style='display:inline-block;width:80%;'>
          ";

      if ($numRows > 0) {
        while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC))  {
           echo '
              <div class="zoom" id="innerPrintings" style="display:inline-block;">
							<a href="https://themtgsource.com/card/';
							$finalCardNameBase1 = str_replace(" ", "-", $row3["name"]);
							$finalCardNameBase2 = str_replace(",", "%2C", $finalCardNameBase1);
							$finalCardNameBase3 = str_replace("&", "%26", $finalCardNameBase2);
							$finalCardName = str_replace("'", "%27", $finalCardNameBase3);
							echo $finalCardName .
							'?set=' . strtolower($row3["setCode"]) . '">
              <img title="';
							if ($cardDualFacedName != "") {
									 echo $cardDualFacedName;
									} else {
									 echo $cardName;
									}
							echo ' - ' . $row3["setCode"] . '" alt="';
							if ($cardDualFacedName != "") {
									 echo $cardDualFacedName;
									} else {
									 echo $cardName;
									}
							echo ' - ' . $row3["setCode"] . '" style="border-radius:9px;max-width:115px;" src="https://www.themtgsource.com/media/cards/en/' . $row3["scryfallId"] . '.jpg" width="100%" />
							</a>
              </div>

           ';
        }
      }else{};
        echo "
        </div>
        </div>
        ";



				$stmt4 = $pdo->prepare("SELECT DISTINCT `text`, `date`
			    FROM rulings
			    where uuid like :uuidregex");
			  $stmt4->bindParam(":uuidregex",$cardId,PDO::PARAM_STR);
			  $stmt4->execute();
			  $numRows4 = $stmt4->rowCount();
			  //$sql = "SELECT id, name, convertedManaCost, multiverseId, setCode, flavorText, text, type FROM cards where multiverseId IS NOT NULL and name like '".$cardSearch."'";
			  //$result = mysqli_query($conn, $sql);
				echo "<div style='font-size:25px;text-align:center;margin-top:50px;'>Rulings for " . $cardName . "<br />&nbsp;";
			  if ($numRows4 == 0) {
			    echo "<br /><div style='font-size:16px;'>No Rulings Available</div>";
			  }
			  else {
			    while($row4 = $stmt4->fetch(PDO::FETCH_ASSOC))  {
							echo "<div style='font-size:16px;line-height:23px;border-bottom:dashed 1px #9c9c9c;text-align:left;padding-top:15px;padding-bottom:15px;'><strong><em>
							"
								.	$row4['date'] . "</em></strong> -<br />" . $row4['text'] .
								"</div>";
					}
				};
				echo "</div>

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
									 data-ad-client='xxxxxxxxxx'
									 data-ad-slot='xxxxxxxxx'
									 data-ad-format='auto'
									 data-full-width-responsive='true'></ins>
							<script>
									 (adsbygoogle = window.adsbygoogle || []).push({});
							</script>
							</td>
						</tr>
					</table>
				</div>
				</div>

				";

       ?>
<?php $pdo=null; $pdo2=null; $pdo3=null; ?>

	</p>
</div>
</div>

<?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php");?>

</body>
</html>
