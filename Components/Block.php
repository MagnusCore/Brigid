<?php
namespace Brigid\Components {
	
	abstract class Block {

		protected $meta = array();

		public function __construct($properties = []) {
			$this->attributes = [];
			foreach ($properties as $label => $value) {
				$this->$label = $value;
			}
		}

		public function __get($name) {
			if (array_key_exists($name, $this->meta)) {
				return $this->meta[$name];
			}

			return "Block property " . $name . " does not exist.";
		}

		public function __set($name, $value) {
			$this->meta[$name] = $value;
		}
		
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
		public function toString() {
			/* Returns a representation of this class in string format, primarily for debugging purposes */
			return $this->getName();
		}

		public function renderAssetPanel() {
			$blockName = $this->getName();
			$blockTitle = $this->label;
			$blockDescription = 'No Description';
			if (!empty($this->description)) {
				$blockDescription = $this->description;
			}
			$blockTags = 'No tags';
			if (!empty($this->tags)) {
				$blockTags = $this->tags;
			}
			$blockCreationDate = $this->createdAt;
			$blockModifiedDate = $this->modifiedAt;

			return <<< FRAGMENT
				<li class="asset-panel">
					<h4>
						General
						<a href="#" style="display: inline-block; margin: -10px;">
							<sup style="display: inline-block; padding: 10px 10px 0;">
								<i class="fa fa-question-circle small"></i>
							</sup>
						</a>
					</h4>
					<dl>
						<dt>Name</dt>
						<dd>$blockName</dd>
						<dt>Title</dt>
						<dd>$blockTitle</dd>
						<dt>Description</dt>
						<dd>$blockDescription</dd>
						<dt>Tags</dt>
						<dd>$blockTags</dd>
						<dt>Created</dt>
						<dd>$blockCreationDate</dd>
						<dt>Modified</dt>
						<dd>$blockModifiedDate</dd>
					</dl>
				</li>
FRAGMENT;
		}

		/* Data Portability */
		public function toJSON() {
			return json_encode($this);
		}

		public function toHTMLStream() {
			return "toHTMLStream is not defined for this block";
		}

		public function toHTML() {
			return "toHTML is not defined for this block";
		}

		public function toXML() {
			/* Returns the representation of this object as an XML string */
			return 'XML method is not defined for this block';
		}
	}
	
}