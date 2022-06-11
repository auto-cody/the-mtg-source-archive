<?php
/* Get all Card Names and Transform to Array
  require_once ('connect.php');
  $conn = mysqli_connect($servername, $username, $password, $dbname);


  $sql = 'SELECT DISTINCT name FROM cards where multiverseId IS NOT NULL';
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_row($result))
{
   $cardNames[] = $row[0];
}

  mysqli_free_result($result);

	mysqli_close($result);
*/
?>




	<div class="navContainer">


		<div class="header noMargin" id="myHeader" style="">


				<div style="display:inline-block;margin-left:15px;padding-top:10px;font-size:22px;line-height:22px;"><a style="text-decoration:none;" href="/"><img style="width:45px;" src="https://themtgsource.com/media/icons/logo.png" /></a>
				</div>

				<div class="mobileSearchBarDisplay" style="text-align:right; width:50%;display:none;">
						<form autocomplete="off" action="https://themtgsource.com/search" method="get">
						<input id="myInput" type="text" name="card" placeholder="Card Search" style="font-size:14px;height:32px;width:60%;margin-left:10px;padding-left:5px;border-width:1px;top:13px;left:75px;position:absolute;">
						</form>
				</div>


				  <input class="menu-btn" type="checkbox" id="menu-btn" />
				  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
				  <ul class="menu noMargin">
						<!-- Spoiler Nav Element <li><a class="nav-link" style="padding-top:22px;padding-bottom:18px;" href="https://themtgsource.com/Core-Set-2021-Spoilers"><img width="100" src="https://themtgsource.com/media/icons/m21_logo.png" /></a></li> -->
				    <li><a class="nav-link" style="padding-top:24px;padding-bottom:24px;" href="https://themtgsource.com/articles.php">Articles</a></li>
				    <li><a class="nav-link" style="padding-top:24px;padding-bottom:24px;" href="https://themtgsource.com/decks.php">Decks</a></li>
				    <li><a class="nav-link" style="padding-top:24px;padding-bottom:24px;" href="https://themtgsource.com/advancedsearch.php">Advanced Search</a></li>
						<li class="mobileHide" style="display: block;padding-top: 11px;padding-bottom:15px; text-align:center;">
							<form autocomplete="off" action="https://themtgsource.com/search" method="get" style="padding-top:3px;">
							<input id="myInput" type="text" name="card" placeholder="Card Search" style="font-size:14px;height:32px;width:100%;max-width:170px;margin-left:10px;padding-left:5px;border: 2px solid #D4AF37;border-radius:6px;">
							</form>
						</li>
				  </ul>

		</div>

	</div>


<script>



//Search Bar Search-on-EnterKey
document.getElementById("myInput")
    .addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        document.getElementById("searchSubmit").click();
    }
});



</script>

<div id="bodyWrapper" class="bodyWrapper">
