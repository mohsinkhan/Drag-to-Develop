<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Michael Spahn <michael@gosign.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Plugin 'piTeaserBoard' for the 'go_content' extension.
 *
 * @author	Michael Spahn <michael@gosign.de>(Copied form NOW)
 * @package	TYPO3
 * @subpackage	piTeaserBoard
 */
class tx_goteaser_piTeaserBoard extends tx_gopibase {
	public $prefixId      = 'tx_goteaser_piTeaserBoard';	// Same as class name
	public $scriptRelPath = 'piTeaserBoard/class.tx_goteaser_piTeaserBoard.php';	// Path to this script relative to the extension dir.
	public $extKey        = 'go_teaser';	// The extension key.
	public $pi_checkCHash = true;

	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf){
		$this->conf=$conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		$this->loadTemplate();
		$this->substituteLanguageMarkers();

			// Sizes for icons
		$width = '';
		$height = '';

		$markerArray = array();

		$i = 1;
		
		while($i <= 6) {
			$markerArray['###TEASER' . $i . '_NOHOVER###'] = ($this->cObj->data['link_' . $i . ''])?'':' class="noHover" ';
			$markerArray['###TEASER' . $i . '_TEXT###'] = $this->cObj->data['input_' . $i . ''];
			$markerArray['###TEASER' . $i . '_LINK###'] = $this->cObj->getTypoLink_URL($this->cObj->data['link_' . $i . '']);
			$markerArray['###TEASER' . $i . '_IMAGE###'] = $this->getImageSrc('singleimage_' . $i, $width, $height);
			$markerArray['###TEASERHOVER' . $i . '_IMAGE###'] = $this->getImageSrc('multipleimages_' . $i, $width, $height);
			$i++;
		}
		$markerArray['###TEASER7_IMAGE###'] = $this->getImageSrc('go_content_image');
		
		return $this->parseTemplate('TEASER_BOARD', $markerArray);
	}
}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/go_teaser/piTeaserBoard/class.tx_goteaser_piTeaserBoard.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/go_teaser/piTeaserBoard/class.tx_goteaser_piTeaserBoard']);
}

?>
