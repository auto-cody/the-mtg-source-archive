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
  $PAGE_TITLE = "All Articles";
	include($_SERVER["DOCUMENT_ROOT"] . "/includes/head-tag-contents.php");?>
<link rel="canonical" href="<?php $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; echo $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">
</head>
<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TXN77XP"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
<?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/design-top.php");?>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/navigation.php");?>

<?php


  require_once ('connect.php');

  // Create connection
  //$conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  //if (!$conn) {
    //die("Connection failed: " . mysqli_connect_error());
  //}

  $stmt2 = $pdo2->prepare("SELECT DISTINCT id, publicationDate, title, author, category, summary, content, thumbnail, tags, banner FROM articles order by id asc");
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

<div class="container" id="mainContent">
	<div class="mw100" style="width:95%;max-width:1100px;margin-left:auto;margin-right:auto;margin-top:100px;text-align:center;">
	<h1 style="margin-left:25px;margin-bottom:35px;text-align:left;">Articles</h1>
	<p style="text-align:left;margin-left:25px;">Sort by:&nbsp;
		<a style="" href="#Standard">Newest</a>&nbsp;&nbsp;/&nbsp;
		<a style="" href="#Pioneer">Oldest</a>&nbsp;&nbsp;/&nbsp;
		<a style="" href="#Modern">Category</a>&nbsp;&nbsp;/&nbsp;
		<a style="" href="#Pauper">Sets</a>
		</p>

</div/>

	<div class="mw100" style="width:95%;max-width:1100px;margin-left:auto;margin-right:auto;margin-top:40px;text-align:center;">
<?php

  for ($x = 0; $x <= $articleCount - 1; $x++) {
		echo '
		<a style="color:#fff;text-decoration:none;" href="https://themtgsource.com/article/'; $titleBase = str_replace(" ", "-", $article_array[$x]["title"]);echo $titleBase; echo '">
			<div class="w225" style="width:25%;display:inline-block;min-width:250px;max-width:250px;margin-left:5px;margin-right:5px;margin-bottom:25px;vertical-align:top;">
				<table class="w225" border="0" cellspacing="0" cellpadding="0" width="100%" style="background-color:#fff;border-left:1px solid #000;border-right:1px solid #000;border-bottom-right-radius:11px;border-bottom-left-radius:11px;border-bottom:1px solid #000;">
					<tr>
						<td class="w225" align="center" style="background-color:#fff;">
						<img class="w225" style="width:100%;display:block;" border="0" src="'; print_r($article_array[$x]["thumbnail"]); echo '" />
						</td>
					</tr>
					<tr>
						<td valign="top" style="vertical-align:top;" height="251">
						<table valign="top" style="vertical-align:top;" border="0" cellspacing="0" cellpadding="0" width="100%">
						<tr>
						<td valign="top" class="w205" style="padding-top:10px;padding-bottom:10px;text-align:left;font-family:\'Alata\', Arial, sans-serif;font-size:18px;line-height:24px;padding-left:10px;padding-right:10px;background-color:#000;color:#fff;">'; print_r($article_array[$x]["title"]); echo '
						</td>
						</tr>
						<tr>
						<td class="w205" style="padding-top:8px;padding-bottom:8px;vertical-align:middle;text-align:center;font-size:13px;padding-left:10px;padding-right:10px;background-color:#fff;border-top:1px solid #000;border-bottom:1px solid #000;color:#000;font-weight:bold;">'; print_r($article_array[$x]["author"]); echo '&nbsp;&nbsp;|&nbsp;&nbsp;'; print_r(date('d M, Y', strtotime($article_array[$x]['publicationDate']))) ;echo '
						</td>
						</tr>
						<tr>
						<td valign="top" class="w205" height="105" style="overflow:hidden;text-align:left;font-size:16px;line-height:22px;width:230px;background-color:#fff;color:#000;padding-top:8px;padding-left:10px;padding-right:10px;border-bottom-right-radius:11px;border-bottom-left-radius:11px;">
						<div style="display: -webkit-box;-webkit-line-clamp: 5;-webkit-box-orient: vertical;  max-height: 50px;">';
						print_r($article_array[$x]["summary"]);
						echo '
						</div>
						</td>
						</tr>
						<tr>
						<td class="w205" style="padding-top:10px;padding-bottom:5px;vertical-align:middle;text-align:left;font-size:13px;padding-left:10px;padding-right:10px;background-color:#fff;color:#8c8c8c;"><em>#'; print_r($article_array[$x]["tags"]); echo '</em>
						</td>
						</tr>
							</table>
						</td>
						</tr>
				</table>
			</div>
			</a>
		';
}


?>




<?php $pdo=null; $pdo2=null; $pdo3=null; ?>

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
					 data-ad-client='xxxxxxxxxxx'
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
</div>

<?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php");?>

</body>
</html>
