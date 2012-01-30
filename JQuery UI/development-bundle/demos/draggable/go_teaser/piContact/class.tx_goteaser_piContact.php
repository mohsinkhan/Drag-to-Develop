<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Usman Zafar <usman@cassini.gosign.de>
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

//require_once(PATH_typo3conf.'ext/go_pibase/class.tx_gopibase.php');

/**
 * Plugin 'piContact' for the 'go_teaser' extension.
 *
 * @author	Mohsin Khan <mohsin@cassini.gosign.de>
 * @package	TYPO3
 * @subpackage	piContact
 */
class tx_goteaser_piContact extends tx_gopibase {
	public $prefixId      = 'tx_goteaser_piContact';	// Same as class name
	public $scriptRelPath = 'piContact/class.tx_goteaser_piContact.php';	// Path to this script relative to the extension dir.
	public $extKey        = 'go_teaser';	// The extension key.
	public $pi_checkCHash = true;
	public $conf          = null;



	/**
	 * The main method of the PlugIn
	 *
	 * @access	public
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	public function main($content,$conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();

		return $this->pi_wrapInBaseClass($this->doTemplateParsing());
	}


	/**
	 * do the template parsing action
	 *
	 * @access	protected
	 * @return	string	parsed template
	 */
	protected function doTemplateParsing()
	{
		if($this->cObj->data['text_1'])
		{
			$markerArray['###HEADING###'] = "<h2>" . $this->cObj->data['text_1'] . "</h2>"; 
		} else {
			$markerArray['###HEADING###'] = "";
		}
		
		$markerArray['###TEXT###'] = $this->pi_RTEcssText($this->cObj->data['text_2']); 
		return $this->parseTemplate('TEMPLATE_LAYOUT',$markerArray);
	}


}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/go_teaser/piContact/class.tx_goteaser_piContact.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/go_teaser/piContact/class.tx_goteaser_piContact.php']);

}

?>
