<?php
	switch ($_SERVER['PHP_SELF']) {
		case "cards":
			$CURRENT_PAGE = "Cards";
			$PAGE_TITLE = "Cards";
			break;
			case "articles":
				$CURRENT_PAGE = "Articles";
				$PAGE_TITLE = "Articles";
				break;
		case "advancedsearch":
			$CURRENT_PAGE = "Advanced Search";
			$PAGE_TITLE = "Advanced Search";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "The MTG Source - Your MTG Database";
	}
?>
