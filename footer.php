
<div class="footerWrapper">



	<div class="footerElements" style="padding-top:20px;width:100%;max-width: 1059px;text-align:center;margin: auto;">



						<table class="footerTables" border="0" cellspacing="0" cellpadding="0" width="25%" style="float:left;padding-left:15px;padding-right:15px;">
								<tr>
									<td>
										<div class="footerFollowUs" style="display:inline-block;height:100px;">
											<table border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td align="center">
														Follow  Us:
													</td>
												</tr>
												<tr>
													<td align="center" style="padding-top:8px;">
														<table border="0" cellspacing="0" cellpadding="0">
															<tr>
																<td width="40"><a href="https://www.instagram.com/mtg_source/"><img border="0" src="/media/icons/instagram-128.png" width="25" /></a>
																</td>
																<td width="40"><a href="https://twitter.com/MTG_Source"><img src="/media/icons/twitter-128.png" width="25" /></a>
																</td>
																<td width="40"><img src="/media/icons/facebook-4-128.png" width="25" />
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td style="padding-top:10px;" align="center">
														Enjoying our site? Want to help?<br /><a href="#">Learn how</a>
													</td>
												</tr>
											</table>
										</div>
									</td>
								</tr>
							</table>



						<table class="footerTables" border="0" cellspacing="0" cellpadding="0" width="36%" style="float:left;padding-left:15px;padding-right:15px;">
								<tr>
									<td sytle="padding-left:8px;padding-bottom:20px;">
										<div class="footerEmail" style="display:inline-block;height:50px;">
											<table border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td>
														Stay in Touch, Sign Up For Our Emails:
													</td>
												</tr>
												<tr>
													<td align="center">
														<table border="0" cellspacing="0" cellpadding="0">
															<tr>
																	<td style="padding-top:8px;">
																		<form autocomplete="off" method="post" action="">
																		<input type="text" name="email" placeholder="Enter Your Email" style="padding-left:5px;font-size:14px;height:25px;width:200px;border-radius:5px;border-width:1px;">
																		<input type="submit" value="GO" style="color:white;font-family:'Roboto', Arial, sans-serif;width:50px;height:31px;border-radius:5px;
																					border-top:solid 2px #2f2f2f;
																					border-bottom:solid 2px #2f2f2f;
																					border-left:solid 2px #2f2f2f;
																					border-right:solid 2px #2f2f2f;
																					box-shadow:inset 5px 5px 10px #252424;
																					background-color:#555;">
																		</form>
																	</td>
																</tr>
															</table>
														</td>
												</tr>
												<tr>
													<td style="padding-top:8px;font-size:12px;line-height:16px;">Don't worry, if you don't like our emails you can unsubscribe at any time with just a single click of a link found in every email.
													</td>
												</tr>
											</table>
										</div>
									</td>
								</tr>
							</table>

							<table class="footerTables" border="0" cellspacing="0" cellpadding="0" width="36%" style="float:left;padding-left:15px;padding-right:15px;">
									<tr>
										<td>
											<div class="footerCopyright" style="height:50px;">
											<table border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td align="center">
														&copy; <?php print date("Y");?> The MTG Source
													</td>
												</tr>
												<tr>
													<td align="center" style="font-size:10px;line-height:14px;padding-top:8px;">
															Some of the images and information on this site related to Magic: The Gathering, including but not limited to card art and card text, is copyright Wizards of the Coast, LLC.
															The MTG Source is not affiliated with Wizards of the Coast. All card prices shown are gathered from the listed services and may not reflect the most recent pricing. The MTG Source makes no guarantee for any prices, product, or service offered by third parties.
													</td>
												</tr>
												<tr>
													<td align="center" style="padding-top:8px;">
															<a href="https://themtgsource.com/privacypolicy">Terms of Use and Privacy Policy</a> | <a href="https://themtgsource.com/contactus">Contact Us</a>
													</td>
												</tr>
											</table>
										</div>
									</td>
								</tr>
							</table>



		</div>


</div>









<!-- end body wrapper-->
</div>
<!-- Replace typed mana characters with mana symbol images-->
<script>

function manaSymbols() {
	$("#mainContent:contains('{T}')").each(function() {
		 var replaced = $(this).html().replace(/{T}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/tap.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{Q}')").each(function() {
		 var replaced = $(this).html().replace(/{Q}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/untap.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{C}')").each(function() {
		 var replaced = $(this).html().replace(/{C}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/colorless.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{S}')").each(function() {
		 var replaced = $(this).html().replace(/{S}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/snow.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{A}')").each(function() {
		 var replaced = $(this).html().replace(/{A}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/acorn.png' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{P}')").each(function() {
		 var replaced = $(this).html().replace(/{P}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/phyrexian.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{B/P}')").each(function() {
		 var replaced = $(this).html().replace(/{B\/P}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/black_phyrexian.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{U/P}')").each(function() {
		 var replaced = $(this).html().replace(/{U\/P}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/blue_phyrexian.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{R/P}')").each(function() {
		 var replaced = $(this).html().replace(/{R\/P}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/red_phyrexian.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{W/P}')").each(function() {
		 var replaced = $(this).html().replace(/{W\/P}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/white_phyrexian.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{G/P}')").each(function() {
		 var replaced = $(this).html().replace(/{G\/P}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/green_phyrexian.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{PB}')").each(function() {
		 var replaced = $(this).html().replace(/{PB}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/black_phyrexian.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{PU}')").each(function() {
		 var replaced = $(this).html().replace(/{PU}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/blue_phyrexian.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{PR}')").each(function() {
		 var replaced = $(this).html().replace(/{PR}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/red_phyrexian.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{PW}')").each(function() {
		 var replaced = $(this).html().replace(/{PW}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/white_phyrexian.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{PG}')").each(function() {
		 var replaced = $(this).html().replace(/{PG}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/green_phyrexian.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{E}')").each(function() {
		 var replaced = $(this).html().replace(/{E}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/energy.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{G}')").each(function() {
		 var replaced = $(this).html().replace(/{G}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/green.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{U}')").each(function() {
		 var replaced = $(this).html().replace(/{U}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/blue.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{W}')").each(function() {
		 var replaced = $(this).html().replace(/{W}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/white.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{B}')").each(function() {
		 var replaced = $(this).html().replace(/{B}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/black.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{R}')").each(function() {
		 var replaced = $(this).html().replace(/{R}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/red.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{B/G}')").each(function() {
		 var replaced = $(this).html().replace(/{B\/G}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/golgari.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{W/U}')").each(function() {
		 var replaced = $(this).html().replace(/{W\/U}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/azorius.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{U/B}')").each(function() {
		 var replaced = $(this).html().replace(/{U\/B}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/dimir.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{B/R}')").each(function() {
		 var replaced = $(this).html().replace(/{B\/R}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/rakdos.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{R/G}')").each(function() {
		 var replaced = $(this).html().replace(/{R\/G}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/gruul.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{G/W}')").each(function() {
		 var replaced = $(this).html().replace(/{G\/W}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/selesnya.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{W/B}')").each(function() {
		 var replaced = $(this).html().replace(/{W\/B}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/orzhov.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{U/R}')").each(function() {
		 var replaced = $(this).html().replace(/{U\/R}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/izzet.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{R/W}')").each(function() {
		 var replaced = $(this).html().replace(/{R\/W}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/boros.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{G/U}')").each(function() {
		 var replaced = $(this).html().replace(/{G\/U}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/simic.jpg' width='15' />");
		 $(this).html(replaced);
	});

	$("#mainContent:contains('{X}')").each(function() {
		 var replaced = $(this).html().replace(/{X}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/x.jpg' width='15' />");
		 $(this).html(replaced);
	});
	$("#mainContent:contains('{CHAOS}')").each(function() {
		 var replaced = $(this).html().replace(/{CHAOS}/g, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/chaos.jpg' width='15' />");
		 $(this).html(replaced);
	});

	var manaCount;
	var manaCountMax = 15;
	for (manaCount = 0; manaCount <= manaCountMax; manaCount++) {
		var manaCostPre = "" + manaCount;
		var manacostFinal = "\\{" + manaCostPre + "\\}";
		var regexSearch = new RegExp(manacostFinal, 'g');
		document.body.innerHTML = document.body.innerHTML.replace(regexSearch, "<img style='margin-bottom:-3px;margin-right:2px;' src='https://www.themtgsource.com/media/icons/card_icon/"+manaCostPre+".jpg' width='15' />");
	};
}

 window.onload = manaSymbols();

</script>
