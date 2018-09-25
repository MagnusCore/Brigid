<?php
namespace Brigid\Components {
	
	class TextBlock extends Block {
		
		public function __construct($properties) {
			$properties['icon'] = 'font';
			parent::__construct($properties);

		}
		
	}
	
}