<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'autoload.php'; //Application autoloader

$context = [
	'debug' => true
];
$logger     = new \Loggers\ScreenLogger(); //Basic print to screen logger
/* Parse request accordingly*/

/* Route the request to get the appropriate handler */

/* Dispatch the handler to access the database and return a data structure response */
$responseData = [
	'HTTPStatusCode' => '200',
	'view'           => 'templates/basic',
	'title'          => 'Example Site',
	'blocks'         => [
		'content' => [
			[
				'id' => 1,
				'label' => 'Title',
				'machine-name' => 'title-heading',
				'block-type' => 'TextBlock',
				'content' => '<h1>{== $title =}</h1>',
				'classes' => 'title-heading'
			],
			[
				'id' => 2,
				'label' => 'homepage-promoted-content',
				'block-type' => 'TextBlock',
				'content' => 'Promoted content carousel',
				'classes' => 'carousel promoted'
			],
			[
				'id' => 3,
				'label' => 'Homepage Store Links',
				'machine-name' => 'homepage-store-links',
				'block-type' => 'TextBlock',
				'content' => 'Homepage store links',
				'classes' => 'signpost'
			],
			[
				'id' => 4,
				'label' => 'Homepage Latest News',
				'machine-name' => 'homepage-news',
				'block-type' => 'TextBlock',
				'content' => 'Latest news',
				'classes' => 'news'
			]
		]
	]
];

/* Using Brigid to translate block metadata into objects for consumption via rendering engine */
$brigid = new \Brigid\Smith($context, $logger);

foreach ($responseData['blocks'] as $region => $regionBlocks) {
	$$region = [];
	foreach ($brigid($context, $regionBlocks) as $block) {
		$$region[] = $block;
	}
}

echo var_dump($content, true);
/* Interpret desired result format, we're assuming our desired format is text/html */

echo "Hello World!";