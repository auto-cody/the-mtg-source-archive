# the-mtg-source-archive
Some php-based pages from a retired Magic: The Gathering database project. None of this should be considered good practice - it is only an archive of old work from my first site.

A few notes on the site's functionality:

The Card page queries a database to dynamically build a unique page for each of the 22,000+ Magic: The Gathering cards. The key to query the databse is pulled from the url slug (i.e. themtgsource.com/card/rhystic-study with 'rhystic study' being the query parameter). Gathred information includes card image, name, text, properties, associated rules/rulings, format legality, and all pritings. This page also utilized the TCGplayer API to pull in the card's current price in the secondary market while also providing a link to purchase the card.

The Article page also queries a content database to populate editorial content. A basic CMS would allow upload to the databse without the use of import.

Both the card and the articles databases are queried to populate content blocks for the home page.
