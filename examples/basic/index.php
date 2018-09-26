<?php

require_once 'autoload.php'; //Application autoloader

$context = [
	'debug' => false
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
				'attributes' => [
					'class' => 'title-heading TextBlock'	
				],
				'createdAt' => '2018-09-26T02:14:27',
				'modifiedAt' => '2018-09-26T02:14:27'
			],
			[
				'id' => 2,
				'label' => 'Homepage Promoted Content',
				'machine-name' => 'homepage-promoted-content',
				'block-type' => 'TextBlock',
				'content' => 'Promoted content carousel',
				'attributes' => [
					'class' => 'carousel promoted TextBlock'	
				],
				'createdAt' => '2018-09-26T02:14:27',
				'modifiedAt' => '2018-09-26T02:14:27'
			],
			[
				'id' => 3,
				'label' => 'Homepage Store Links',
				'machine-name' => 'homepage-store-links',
				'block-type' => 'TextBlock',
				'content' => 'Homepage store links',
				'attributes' => [
					'class' => 'signpost TextBlock'	
				],
				'createdAt' => '2018-09-26T02:14:27',
				'modifiedAt' => '2018-09-26T02:14:27'
			],
			[
				'id' => 4,
				'label' => 'Homepage Latest News',
				'machine-name' => 'homepage-news',
				'block-type' => 'TextBlock',
				'content' => 'Latest news',
				'attributes' => [
					'class' => 'news TextBlock'	
				],
				'createdAt' => '2018-09-26T02:14:27',
				'modifiedAt' => '2018-09-26T02:14:27'
			]
		]
	]
];

/* Using Brigid to translate block metadata into objects for consumption via rendering engine */
$brigid = new \Brigid\Smith($context, $logger);

$toRender = [];
foreach ($responseData['blocks'] as $region => $regionBlocks) {
	foreach ($brigid($context, $regionBlocks) as $block) {
		$toRender[$region][] = $block;
	}
}

/* We now have a list of blocks available in $toRender, this is what should be fed to your rendering engine to get
 * an appropriate return. First, we're interpreting the desired result format here and then telling the engine what
 * to use. In this example, we're assuming that the user desires text/html.
 */

/* Example rendering engine
 * Just a lazy rendering engine that calls the default template for the block provided with Brigid. We're only rendering
 * the content variable for this example;
 */
 foreach ($toRender['content'] as $block) {
	 echo $block->toHTML();
 }
 ?>
 <ul class="assetPanel">
 	<?php
 		foreach ($toRender['content'] as $block) {
			 echo $block->renderAssetPanel();
		 }
 	?>
 </ul>