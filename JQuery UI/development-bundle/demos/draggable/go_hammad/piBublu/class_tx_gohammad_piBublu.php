<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Mohsin Khan <mohsin@cassini.gosign.de>
*
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

require_once(PATH_typo3conf.'ext/go_pibase/class.tx_gopibase.php');

/**
 * Plugin 'piBublu' for the 'go_content' extension.
 *
 * @author	Mohsin Khan <mohsin@cassini.gosign.de>
 * @package	TYPO3
 * @subpackage	piBublu
 */
class tx_gohammad_piBublu extends tx_gopibase {
	public $prefixId      = 'tx_gohammad_piBublu';	// Same as class name
	public $scriptRelPath = 'piBublu/class.tx_gohammad_piBublu.php';	// Path to this script relative to the extension dir.
	public $extKey        = 'go_hammad';	// The extension key.
	public $pi_checkCHash = true;
	public $conf          = null;
	
	
	/**
	 * By the user selected layout
	 * @var int
	 */
	protected $layout	  = 0;
	
	/**
	 * TypoScript params passed to rendering method
	 * @var array
	 */
	protected $imgParams  = array();
	
	/**
	 * path to scaled background image
	 * @var string
	 */
	protected $imageBg	  = null;
	
	/**
	 * path to scaled foreground image
	 * @var string
	 */
	protected $imageFg    = null;
	
	/**
	 * Java-Script link
	 * @var string
	 */
	protected $jsLink	  = '';

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
	protected function doTemplateParsing() {
		$markerArray['###HEADING###'] = $this->cObj->data['text_1'];
	
	
		return $this->parseTemplate('TEMPLATE_LAYOUT', $markerArray);
		
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/go_hammad/piBublu/class.tx_gohammad_piBublu.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/go_hammad/piBublu/class.tx_gohammad_piBublu.php']);
}

?>
