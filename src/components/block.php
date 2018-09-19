<?php
namespace Brigid\Components {
	
	abstract class Block {
		
		public function getName() {
			/* Gets the unencoded name of the block name
				Converts camelCase to space separated segments with instances of "Block" removed.
				Example: GoogleMapsBlock -> Google Maps
			*/
			
			$className = str_replace('Block', '', get_class($this));
			
			
			/* CamelCase detecting pattern via https://stackoverflow.com/a/7729790 */
			$re = '/(?#! splitCamelCase Rev:20140412)
			    # Split camelCase "words". Two global alternatives. Either g1of2:
			      (?<=[a-z])      # Position is after a lowercase,
			      (?=[A-Z])       # and before an uppercase letter.
			    | (?<=[A-Z])      # Or g2of2; Position is after uppercase,
			      (?=[A-Z][a-z])  # and before upper-then-lower case.
			    /x';
			$chunks = preg_split($re, $className);
			return implode(' ', $chunks);
			
		}
		
		/* Assets */
		public function getScripts() {
			/* Returns the scripts provided to this block, generally only used with libraries
			 * or inline scripts, give preference to proper use of event binding in external scripts
			 */
			return [];
		}
		
		public function getStyles() {
			/* Returns all of the styles related to the block. Open implementation, recommended to use
			 * properties on the block or assemble all into an associative array
			 */
			return [];
		}
		
		/* Representation */
		public function __toString() {
			/* Returns a representation of this class in string format, primarily for debugging purposes */
			return 'todo';
		}
		
		/* Data Portability */
		public function 
	}
	
}