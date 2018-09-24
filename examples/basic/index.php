<?php
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
				'machine-name' => 'title-heading'
				'type' => 'TextBlock',
				'content' => '<h1>{== $title =}</h1>',
				'classes' => 'title-heading'
			],
			[
				'id' => 2,
				'label' => 'homepage-promoted-content',
				'type' => 'TextBlock',
				'content' => 'Promoted content carousel',
				'classes' => 'carousel promoted'
			],
			[
				'id' => 3,
				'label' => 'Homepage Store Links',
				'machine-name' => 'homepage-store-links',
				'type' => 'TextBlock',
				'content' => 'Homepage store links',
				'classes' => 'signpost'
			],
			[
				'id' => 4,
				'label' => 'Homepage Latest News',
				'machine-name' => 'homepage-news',
				'type' => 'TextBlock',
				'content' => 'Latest news',
				'classes' => 'news'
			]
		]
	]
];

/* Interpret desired result format, we're assuming our desired format is text/html */
echo "Hello World!";