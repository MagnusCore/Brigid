<?php
namespace Brigid\Components {
	
	class TextBlock extends Block {
		
		public function __construct($properties) {
			$properties['icon'] = 'font';
			parent::__construct($properties);

		}
		
		public function toHTML() {
			$htmlfragment = '<section data-block="' . $this->id . '" ';
			foreach ($this->attributes as $label => $value) {
				$htmlfragment .= $label . '="' . $value . '" ';
			}
			$htmlfragment .= '>' . $this->content . '</section>';
			
			return $htmlfragment;
			
		}
		
	}
	
}