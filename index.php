

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
	$PAGE_TITLE = "The MTG Source | Your Source for everything Magic: The Gathering";
	include($_SERVER["DOCUMENT_ROOT"] . "/includes/head-tag-contents.php");?>



<style>

/*mobile art title*/





  @media (min-width: 700px) {

      .mobileShow   { display:none !important; }

  }



	@media (max-width : 925px) {

		body {



			width:100%;

			height:100%;

		}

		#mainContent {



		}

	}



</style>


<meta name="description" content="Read the latest news, find the best prices, and learn about every card ruling. Our Magic: The Gathering databse makes it easy to find anything you need to know." />
<meta name="keywords" content="Magic: The Gathering, The MTG Source, MTG Source, MTG, MTG Cards, MTG Rulings, Magic Cards, Magic Card Prices, MTG Prices, MTG Card Market" />
<meta name="robots" content="index, follow" />

<link rel="canonical" href="<?php $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; echo $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">

</head>

<body style="line-height:24px;">

	<!-- Google Tag Manager (noscript) -->

	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=XXXXXXXX"

	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

	<!-- End Google Tag Manager (noscript) -->

<?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/navigation.php");?>

<!-- backgroudn art

	<div class="mobileHide">

	<video style="margin-top:60px;" class="mobileHide" autoplay muted loop id="bgVideo">

	<source data-src="https://themtgsource.com/media/living_cards/MoxTantalite_RyanPancoast.mp4" type="video/mp4">

	</video>

	</div>



Background Art Credits

<div class="container" id="mainContent" style="height:calc(100vh - 165px);">



		<div class="mobileHide" align="center" style="width:300px;height:25px;font-size:10px;margin:auto;">

			Living Card Background: <em>"Mox Tantalite"</em><br />

		Original Art: Ryan Pancoast&nbsp;&nbsp;|&nbsp;&nbsp;Animation: Geoffrey Palmer<br />

		<table border="0" cellspacing="0" cellpadding="0" width="215px;">

			<tr>

				<td align="left">

					ryanpancoast.com

				</td>

				<td align="right">@livingcardsmtg&nbsp;&nbsp;

				</td>

			</tr>

		</table>

		</div>

End Background Art Credits -->




<div style="max-height:500px;width:100%;overflow:hidden;display:inline-block;">

<div style="width:100%;text-align:center;position:absolute;z-index:0;top:140px;">
<div style="font-family:'Alata', Arial, sans-serif;color:#fff;font-weight:bold;text-align:center;background-color:#020202;width:40%;min-width:300px;max-width:500px;margin:auto;font-size:35px;padding-top:25px;padding-bottom:25px;border-radius:15px;">
The MTG Source<br />
<div style="padding-top:20px;font-size:18px;line-height:25px;font-weight:normal;padding-left:0px;">
	Your Source for Everything Magic:&nbsp;The&nbsp;Gathering
</div>
</div>


</div>
<img src="https://themtgsource.com/media/living_cards/moxTantalite.gif" style="z-index:-1;position:relative;width:100%;">
</div>

<div class="container" id="mainContent">


<div class="homeContentBlock1" style="display:block;margin:auto;width:95%;max-width:1100px;background-color:#ffffff;padding-top:45px;padding-bottom:20px;text-align:center;vertical-align:top;">

	<div class="mobileFullWidth paddingLR0" style="display:inline-block;width:40%;min-width:300px;max-width:350px;padding-left:15px;padding-right:15px;margin-bottom:25px;">

<?php

require_once ('connect.php');

// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
//if (!$conn) {
	//die("Connection failed: " . mysqli_connect_error());
//}

$stmt2 = $pdo2->prepare("SELECT DISTINCT id, publicationDate, title, author, category, summary, content, thumbnail, tags, banner FROM articles order by id desc");
$stmt2->execute();
$numRows = $stmt2->rowCount();
//$sql = "SELECT id, name, convertedManaCost, multiverseId, setCode, flavorText, text, type FROM cards where multiverseId IS NOT NULL and name like '".$cardSearch."'";
//$result = mysqli_query($conn, $sql);
$articleCount = 0;
	while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
			 $article_array[] = $row;
			 $articleCount++;
	}

?>


		<table border="0" cellspacing="0" cellpadding="0" width="100%">
			<tr>
				<td class="homeModuleTitle1" style="font-size:20px;text-align:center;padding-bottom:20px;padding-left:15px;padding-right:15px;"><strong>Featured Article</strong>
				</td>
			</tr>
			<tr>
				<td style="background-color:#f2f2f2;font-size:22px;line-height:30px;text-align:center;padding-top:25px;padding-left:15px;padding-right:15px;border-top-right-radius:5px;border-top-left-radius:5px;"><a href="https://themtgsource.com/article/<?php $titleBase = str_replace(" ", "-", $article_array[0]["title"]); echo $titleBase; ?>"><img border="0" src="<?php print_r($article_array[0]["thumbnail"]); ?>" style="width:100%;" /></a>
					<br /><a href="https://themtgsource.com/article/<?php $titleBase = str_replace(" ", "-", $article_array[0]["title"]); echo $titleBase; ?>"><strong><?php print_r($article_array[0]["title"]); ?></strong></a>
				</td>
			</tr>
			<tr>
				<td style="background-color:#f2f2f2;text-align:center;padding-top:10px;padding-bottom:30px;padding-left:15px;padding-right:15px;border-bottom: 1px solid #d2d2d2;"><a style="text-decoration:none;" href="https://themtgsource.com/article/<?php $titleBase = str_replace(" ", "-", $article_array[0]["title"]); echo $titleBase; ?>"><?php print_r($article_array[0]["summary"]); ?></a>
				</td>
			</tr>
			<tr>
				<td class="homeModuleTitle2" style="font-size:20px;text-align:center;padding-top:30px;padding-bottom:20px;padding-left:15px;padding-right:15px;"><strong>More Articles</strong>
				</td>
			</tr>
			<tr>
				<td style="background-color:#f2f2f2;font-size:16px;text-align:left;padding-top:12px;padding-bottom:12px;padding-left:15px;padding-right:15px;"><a href="https://themtgsource.com/article/<?php $titleBase = str_replace(" ", "-", $article_array[1]["title"]); echo $titleBase; ?>"><?php print_r($article_array[1]["title"]); ?></a>
				</td>
			</tr>
			<tr>
				<td style="font-size:16px;text-align:left;padding-top:12px;padding-bottom:12px;padding-left:15px;padding-right:15px;"><a href="https://themtgsource.com/article/<?php $titleBase = str_replace(" ", "-", $article_array[2]["title"]); echo $titleBase; ?>"><?php print_r($article_array[2]["title"]); ?></a>
				</td>
			</tr>
			<tr>
				<td style="background-color:#f2f2f2;font-size:16px;text-align:left;padding-top:12px;padding-bottom:12px;padding-left:15px;padding-right:15px;"><a href="https://themtgsource.com/article/<?php $titleBase = str_replace(" ", "-", $article_array[3]["title"]); echo $titleBase; ?>"><?php print_r($article_array[3]["title"]); ?></a>
				</td>
			</tr>
			<tr>
				<td style="font-size:16px;text-align:left;padding-top:12px;padding-bottom:12px;padding-left:15px;padding-right:15px;"><a href="https://themtgsource.com/article/<?php $titleBase = str_replace(" ", "-", $article_array[4]["title"]); echo $titleBase; ?>"><?php print_r($article_array[4]["title"]); ?></a>
				</td>
			</tr>
			<tr>
				<td style="background-color:#f2f2f2;font-size:16px;text-align:left;padding-top:12px;padding-bottom:12px;padding-left:15px;padding-right:15px;border-bottom-right-radius:5px;border-bottom-left-radius:5px;"><a href="https://themtgsource.com/article/<?php $titleBase = str_replace(" ", "-", $article_array[5]["title"]); echo $titleBase; ?>"><?php print_r($article_array[5]["title"]); ?></a>
				</td>
			</tr>
			<tr>
				<td style="font-size:16px;text-align:right;padding-top:12px;padding-bottom:12px;padding-left:15px;padding-right:15px;"><a href="https://themtgsource.com/articles.php">See all articles&nbsp;&raquo;</a>
				</td>
			</tr>
		</table>


	</div>



	<?php
	require_once ('connect.php');


	$stmt = $pdo->prepare("SELECT DISTINCT * from cards where setcode NOT REGEXP :regex1 and type NOT REGEXP :regex2 order by rand() limit 1");
	$stmt->bindValue(":regex1","OHOP|OPCA|OPC2|OARC|PVAN|PMOA|OE01|PSAL|PS11|REN|4BB|FBB|PPRO|PWAR|PHJ|PAST|RIN",PDO::PARAM_STR);
	$stmt->bindValue(":regex2","Basic Land|Basic Snow Land",PDO::PARAM_STR);
	$stmt->execute();
	$numRows = $stmt->rowCount();


	if ($numRows == 1) {
	while($row = $stmt->fetch(PDO::FETCH_ASSOC))  {
	$randomCardName = $row['name'];
	$randomCardID = $row['scryfallId'];
	$setCode = strtolower($row['setCode']);
	}

	} else {}

	?>

		<div class="mobileFullWidth paddingLR0" style="width:28%;display:inline-block;min-width:300px;max-width:350px;padding-left:15px;padding-right:15px;margin-bottom:25px;vertical-align:top;">

			<div style="width:100%;vertical-align:top;">
			<table border="0" cellspacing="0" cellpadding="0" width="100%" height="200" style="border-radius:11px;vertical-align:top;">
				<tr>
					<td class="homeModuleTitle" align="center" style="padding-top:10px;padding-bottom:8px;background-color:#000;border-top-right-radius:11px;border-top-left-radius:11px;color:#fff;"><strong>Random Card</strong>
					</td>
				</tr>
				<tr>
					<td align="center" class="currentCardTD" style="background-color:#f2f2f2;padding-top:20px;padding-bottom:25px;border-bottom-right-radius:11px;border-bottom-left-radius:11px;height:315px;border: 1px solid #d2d2d2;">
						<?php echo "<a href='https://themtgsource.com/card/";
						$finalCardNameBase1 = str_replace(" ", "-", $randomCardName);
						$finalCardNameBase2 = str_replace(",", "%2C", $finalCardNameBase1);
						$finalCardNameBase3 = str_replace("&", "%26", $finalCardNameBase2);
						$finalCardName = str_replace("'", "%27", $finalCardNameBase3);

						echo $finalCardName . "?set=" . $setCode . "'><img class='currentCard' style='border-radius:11px;max-width:223px;' src='https://www.themtgsource.com/media/cards/en/" . $randomCardID . ".jpg' width='100%' /></a>";?>
						</td>
					</tr>
				</table>
			</div>


			<div style="text-align:center;background-color:#f2f2f2;border-radius:11px;vertical-align:top;width:100%;display:block;margin-top:25px;">

				<table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-radius:11px;">
					<tr>
						<td class="homeModuleTitle" style="font-size:20px;text-align:center;padding-top:15px;padding-bottom:15px;padding-right:15px;"><strong>Random Ruling</strong>
						</td>
					</tr>

					<?php
					require_once ('connect.php');




					$stmt3 = $pdo->prepare("SELECT DISTINCT `text`, uuid from rulings where `text` is not null order by rand() limit 1");
					$stmt3->execute();
					$numRows3 = $stmt3->rowCount();


					if ($numRows3 == 1) {
					while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC))  {
					$rulingCardRuling = $row3['text'];
					$rulingCardUuid = $row3['uuid'];
					}

					} else {}

					$stmt = $pdo->prepare("SELECT DISTINCT name, setCode from cards where uuid like :regex1 limit 1");
					$stmt->bindValue(":regex1",$rulingCardUuid,PDO::PARAM_STR);
					$stmt->execute();
					$numRows = $stmt->rowCount();


					if ($numRows == 1) {
					while($row = $stmt->fetch(PDO::FETCH_ASSOC))  {
					$rulingCardName = $row['name'];
					}

					} else {}


					?>

					<tr>
						<td style="font-size:16px;line-height:22px;text-align:left;padding-bottom:5px;padding-left:15px;padding-right:15px;font-weight:bold;"><? echo $rulingCardName; ?>
						</td>
					</tr>
					<tr>
						<td style="font-size:15px;line-height:22px;text-align:left;padding-bottom:15px;padding-left:15px;padding-right:15px;"><em><? echo $rulingCardRuling; ?></em>
						</td>
					</tr>
					<tr>
						<td style="font-size:15px;line-height:22px;text-align:right;padding-bottom:20px;padding-left:15px;padding-right:20px;"><a href="
							<?php echo "https://themtgsource.com/card/";
							$finalCardNameBase1 = str_replace(" ", "-", $rulingCardName);
							$finalCardNameBase2 = str_replace(",", "%2C", $finalCardNameBase1);
							$finalCardNameBase3 = str_replace("&", "%26", $finalCardNameBase2);
							$finalCardName = str_replace("'", "%27", $finalCardNameBase3);

							echo $finalCardName; ?>


							">Go to page &raquo;</a>
						</td>
					</tr>

				</table>
			</div>

		</div>

		<div align="center" class="supportModuleFullWidth paddingLR0" style="vertical-align:top;width:28%;display:inline-block;min-width:300px;max-width:350px;margin-left:15px;padding-right:15px;text-align:center;">


			<div class="mobileFullWidth paddingLR0" style="width:100%;display:inline-block;:10px;margin-bottom:25px;">
				<table border="0" cellspacing="0" cellpadding="0" width="100%" height="225" style="border-radius:11px;">
					<tr>
						<td class="homeModuleTitle" style="font-size:20px;text-align:center;padding-bottom:20px;padding-left:15px;padding-right:15px;"><strong>Popular Cards</strong>
						</td>
					</tr>
					<tr>
						<td align="center" style="background-color:#f2f2f2;padding-top:12px;padding-bottom:12px;padding-left:15px;padding-right:15px;border-top-right-radius:5px;border-top-left-radius:5px;"><a href="https://themtgsource.com/card/Justice">Justice</a>
						</td>
					</tr>
					<tr>
						<td align="center" style="padding-top:12px;padding-bottom:12px;padding-left:15px;padding-right:15px;"><a href="https://themtgsource.com/card/Riddleform">Riddleform</a>
						</td>
					</tr>
					<tr>
						<td align="center" style="background-color:#f2f2f2;padding-top:12px;padding-bottom:12px;padding-left:15px;padding-right:15px;"><a href="https://themtgsource.com/card/Cliffside-Rescuer">Cliffside Rescuer</a>
						</td>
					</tr>
					<tr>
						<td align="center" style="padding-top:12px;padding-bottom:12px;padding-left:15px;padding-right:15px;"><a href="https://themtgsource.com/card/Mana-Echoes?set=ons">Mana Echoes</a>
						</td>
					</tr>
					<tr>
						<td align="center" style="background-color:#f2f2f2;padding-top:12px;padding-bottom:12px;padding-left:15px;padding-right:15px;"><a href="https://themtgsource.com/card/Cindervines">Cindervines</a>
						</td>
					</tr>
					<tr>
						<td align="center" style="padding-top:12px;padding-bottom:12px;padding-left:15px;padding-right:15px;"><a href="https://themtgsource.com/card/Sun-Droplet">Sun Droplet</a>
						</td>
					</tr>
					<tr>
						<td align="center" style="background-color:#f2f2f2;padding-top:12px;padding-bottom:12px;padding-left:15px;padding-right:15px;border-bottom-right-radius:5px;border-bottom-left-radius:5px;"><a href="https://themtgsource.com/card/Fencing-Ace">Fencing Ace</a>
						</td>
					</tr>
				</table>
			</div>

					<div style="text-align:center;background-color:#f2f2f2;border-radius:11px;vertical-align:top;height:200px;width:100%;display:block;margin-bottom:25px;">
						<table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-radius:11px;">
							<tr>
								<td style="font-size:12px;text-align:center;padding-top:10px;padding-bottom:10px;padding-right:15px;"><strong>Ad</strong>
								</td>
							</tr>
							<tr>
								<td>
									<table border="0" cellspacing="0" cellpadding="0" width="100%">
										<tr>
											<td>
												<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
												<!-- Ad_Full-W -->
												<ins class="adsbygoogle"
												     style="display:block"
												     data-ad-client="xxxxxxx"
												     data-ad-slot="xxxxxx"
												     data-ad-format="auto"
												     data-full-width-responsive="true"></ins>
												<script>
												     (adsbygoogle = window.adsbygoogle || []).push({});
												</script>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>


		</div>

</div>




<div class="homeContentBlock2" style="display:block;margin:auto;width:100%;background-color:#f0f0f0;">

	<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

		<div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true, "autoPlay": true}' style="max-width:1100px;width:100%;position:relative;margin:auto;padding-top:45px;padding-bottom:45px;background-color:#f0f0f0;">

		  <div class="gallery-cell"><a href="https://themtgsource.com/article/Zendikar-Rising-Product-Guide"><img src="https://themtgsource.com/media/banners/2020_09/ZendikarRisingProductGuide.png" width="100%" /></a></div>

		  <div class="gallery-cell"><a href="https://themtgsource.com/article/Zendikar-Rising-Mechanic-Overview"><img src="https://themtgsource.com/media/articles/2020_09/ZendikarRisingMechanicOverview.png" width="100%" /></a></div>

		  <div class="gallery-cell"><a href="#"><img src="https://themtgsource.com/media/banners/2020_06/Banner_JudeAcademyJulyCards.jpg" width="100%" /></a></div>

		</div>
</div>



<div class="homeContentBlock3" style="display:block;margin:auto;width:95%;max-width:1100px;background-color:#ffffff;padding-top:55px;padding-bottom:25px;">
<div style="font-size:26px;line-height:32px;font-weight:bold;text-align:left;width:95%;max-width:1100px;padding-left:35px;margin-bottom:35px;"><h2>Decks</h2></div>
<?php
  require_once ('connect.php');



	$stmt = $pdo3->prepare("SELECT * FROM `decks` order by rand() limit 10");
	$stmt->execute();
	$numRows = $stmt->rowCount();
	//$sql = "SELECT id, name, convertedManaCost, multiverseId, setCode, flavorText, text, type FROM cards where multiverseId IS NOT NULL and name like '".$cardSearch."'";
	//$result = mysqli_query($conn, $sql);
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				 $deck_array[] = $row;
				 $deckCount++;
		}

?>

<div class="paddingLR0" align="center" style="width:100%;display:inline-block;min-width:350px;max-width:1100px;padding-left:10px;padding-right:10px;margin-bottom:25px;display:inline-block;">
<?php
	for ($x = 0; $x <= $deckCount - 1; $x++) {
		echo '
		<a style="color:#fff;text-decoration:none;" href="https://themtgsource.com/deck.php/';
		print_r($deck_array[$x]["deckFormat"]); echo '/';
		$finalDeckEdit = strval(print_r($deck_array[$x]["deckName"]));
		$finalDeckNameBase1 = str_replace(" ", "-", $finalDeckEdit);
		$finalDeckNameBase2 = str_replace(",", "%2C", $finalDeckNameBase1);
		$finalDeckNameBase3 = str_replace("&", "%26", $finalDeckNameBase2);
		$finalDeckName = str_replace("'", "%27", $finalDeckNameBase3);

		 echo $finalDeckname . '">
			<div align="center" style="width:25%;display:inline-block;min-width:200px;max-width:200px;margin-left:5px;margin-right:5px;margin-bottom:25px;">
				<table border="0" cellspacing="0" cellpadding="0" width="100%" height="100" style="background-color:#fff;border-radius:11px;">
					<tr>
						<td align="center" style="height:187px;background-image: url(https://themtgsource.com/media/cards/en/'; print_r($deck_array[$x]["coverCardId"]); echo '.jpg);background-size:cover;">
						</td>
					</tr>
					<tr>
					<td style="text-align:center;font-size:16px;width:180px;display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;padding-left:10px;padding-right:10px;padding-bottom:11px;padding-top:8px;background-color:#000;color:#fff;border-left: 1px solid #000;border-right: 1px solid #000;">'; print_r($deck_array[$x]["deckName"]); echo '
					</td>
					</tr>
						<tr>
						<td style="color:#000;text-align:center;padding-top:5px;padding-bottom:15px;font-size:16px;line-height:23px;padding-left:15px;padding-right:15px;border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-bottom-right-radius:11px;border-bottom-left-radius:11px;">'; print_r($deck_array[$x]["colorIdentity"]);
						echo '<br />'; print_r($deck_array[$x]["deckFormat"]); echo '
						</td>
						</tr>
				</table>
			</div>
			</a>
		';
	}

?>
<div style="font-size:18px;line-height:24px;text-align:right;width:95%;max-width:1100px;"><a  href="https://themtgsource.com/decks.php">See all decks&nbsp;&raquo;</a></div>
</div>




<div style="text-align:center;background-color:#f2f2f2;border-radius:11px;vertical-align:top;height:150px;width:100%;display:block;margin-top:35px;margin-bottom:25px;">
	<table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-radius:11px;">
		<tr>
			<td style="font-size:12px;text-align:center;padding-top:10px;padding-bottom:10px;padding-right:15px;"><strong>Ad</strong>
			</td>
		</tr>
		<tr>
			<td align="center">
				<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- Ad-Display_horizontal -->
				<ins class="adsbygoogle"
				     style="display:block;text-align:center"
				     data-ad-client="xxxxxxxxxx"
				     data-ad-slot="xxxxxxxxx"
				     data-ad-format="auto"
				     data-full-width-responsive="true"></ins>
				<script>
				     (adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</td>
		</tr>
	</table>
</div>


</div>



<div class="homeContentBlock4" style="display:block;margin:auto;width:100%;background-color:#f0f0f0;padding-top:20px;padding-bottom:40px;">

	<div style="width:95%;max-width:1100px;margin:auto;text-align:center;">

		<div style="font-size:26px;line-height:40px;font-weight:bold;text-align:left;width:95%;padding-left:35px;margin-bottom:35px;"><h2>Community Spotlight</h2></div>

<div class="spotlightRow1" style="width:98%;text-align:center;margin-top:5px;margin-bottom:5px;">

	<div style="background-color:#fff;width:100%;max-width:500px;display:inline-block;margin-left:5px;margin-right:5px;margin-top:10px;margin-bottom:10px;text-align:center;">
		<iframe width="100%" height="315" src="https://www.youtube.com/embed/wif9ppH5JpI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<div style="padding:5px 10px 15px 10px;font-size:20px;line-height:30px;color:#000;text-align:left;display:block;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">
			<strong>How To Play Magic: The Gathering (MTG) Learn To Play In About 15 Minutes!</strong>
			<br />Tolarian Community College
		</div>
	</div>


		<div style="background-color:#fff;width:100%;max-width:500px;display:inline-block;margin-left:5px;margin-right:5px;margin-top:10px;margin-bottom:10px;text-align:center;">
			<iframe width="100%" height="315" src="https://www.youtube.com/embed/9Mq4lEB3z-4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<div style="padding:5px 10px 15px 10px;font-size:20px;line-height:30px;color:#000;text-align:left;display:block;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">
			<strong>Walking Dead Secret Lair: EXPOSED | The Command Zone # 354 | Magic: The Gathering EDH</strong>
			<br />The Command Zone
			</div>
		</div>

</div>

<div class="spotlightRow2" style="width:98%;text-align:center;margin-top:10px;margin-bottom:10px;">

	<div style="background-color:#fff;width:100%;max-width:500px;display:inline-block;margin-left:5px;margin-right:5px;margin-top:5px;margin-bottom:10px;text-align:center;">
		<iframe width="100%" height="315" src="https://www.youtube.com/embed/An7EqbIlrL8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<div style="padding:5px 10px 15px 10px;font-size:20px;line-height:30px;color:#000;text-align:left;display:block;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">
		<strong>15 Decks for a Post-Ban Standard (Mtg)</strong>
		<br />Strictly Better MtG
		</div>
	</div>


	<div style="background-color:#fff;width:100%;max-width:500px;display:inline-block;margin-left:5px;margin-right:5px;margin-top:10px;margin-bottom:10px;text-align:center;">
		<iframe width="100%" height="315" src="https://www.youtube.com/embed/K84Qlnrw-f4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<div style="padding:5px 10px 15px 10px;font-size:20px;line-height:30px;color:#000;text-align:left;display:block;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">
			<strong>LOLWUT? Modern Oops All Spells with a side of Goblin Charblecher - MTG Modern Deck Tech and Gameplay</strong>
			<br />PleasantKenobi
			</div>
		</div>

</div>

	</div>

</div>



</div>

<?php $pdo=null; $pdo2=null; $pdo3=null; ?>


<?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php");?>



</body>

</html>
