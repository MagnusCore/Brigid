<?php
namespace Brigid\Components {
	
	class DescriptionBlock extends Block {
		
		public function __construct($properties) {
			$properties['icon'] = 'asterisk';
			parent::__construct($properties);
		}
		
	}
	
}