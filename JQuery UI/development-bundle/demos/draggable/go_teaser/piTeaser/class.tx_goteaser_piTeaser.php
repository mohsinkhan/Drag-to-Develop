<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Mansoor Ahmad <mansoor@gosign.de>
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
 * Plugin 'piTeaser' for the 'go_content' extension.
 *
 * @author	Mansoor Ahmad <mansoor@gosign.de>
 * @package	TYPO3
 * @subpackage	piTeaser
 */
class tx_goteaser_piTeaser extends tx_gopibase {
	public $prefixId      = 'tx_goteaser_piTeaser';	// Same as class name
	public $scriptRelPath = 'piTeaser/class.tx_goteaser_piTeaser.php';	// Path to this script relative to the extension dir.
	public $extKey        = 'go_teaser';	// The extension key.
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
		$this->layout = $this->cObj->data['go_teaser_layout'] + 1;
		$this->imgParams = $this->conf['layout_' . $this->layout. '.'];
		$this->calculate();
		return $this->pi_wrapInBaseClass($this->doTemplateParsing());
	}

	/**
	 * Makes main calculations
	 *
	 * @access	protected
	 * @return	void
	 */
	protected function calculate() {
		$this->scaleImageBg();
		$this->scaleImageFg();
		$this->createTeaserLink();
	}

	/**
	 * performs scaling of background image
	 *
	 * @access	protected
	 * @return	void
	 */
	protected function scaleImageBg() {
		$imageBg = $this->getDamImages('tt_content', $this->cObj->data['uid'], 'go_contentelements_link_image_hover');
		if($imageBg) {
			$imageBg = current($imageBg['files']);
			$this->imageBg = $this->cObj->IMG_RESOURCE(array('file' => $imageBg, 'file.' => $this->imgParams['bg.']));
		}
	}

	/**
	 * performs scaling of foreground image
	 *
	 * @access	protected
	 * @return	void
	 */
	protected function scaleImageFg() {
		$imageFg = $this->getDamImages('tt_content', $this->cObj->data['uid'], 'go_contentelements_link_image');
		if(count($imageFg['files']) > 0) {
			$imageFg = current($imageFg['files']);
			$imgArray['file'] = $imageFg;
			$imgArray['file.'] = $this->imgParams['fg.'];
			$imgArray['stdWrap.']['typolink.']['parameter'] = $this->cObj->data['image_link'];
			$this->imageFg = $this->cObj->IMAGE($imgArray);
		}
		else{
			$this->imageFg = '';
		}
	}

	/**
	 * creates the teaser link
	 *
	 * @access	protected
	 * @return	void
	 */
	protected function createTeaserLink() {
		if($teaserLink = $this->cObj->data['image_link']) {
			$linkUrl = $this->cObj->getTypoLink_URL($teaserLink);
			if(strpos($linkUrl, 'javascript:') === 0) {
				$jsLink = substr($linkUrl, strpos($linkUrl, ':') + 1);
			} else {
				$jsLink = "jQuery(location).attr('href', jQuery('base').attr('href') + '$linkUrl')";
			}
		} else {
			$jsLink = "jQuery(location).attr('href', '#')";
		}
		$this->jsLink = $jsLink;
	}

	/**
	 * do the template parsing action
	 *
	 * @access	protected
	 * @return	string	parsed template
	 */
	protected function doTemplateParsing() {
		if($this->cObj->data['header_rte']){
			$linkArray['value'] = $this->cObj->data['header_rte'];
			$linkArray['br'] = 1;
			$linkArray['htmlspecialchars'] = 1;
			$linkArray['typolink.']['parameter'] = $this->cObj->data['image_link'];
			$linkArray['typolink.']['ATagParams'] = 'style="color:'.  $this->cObj->data['go_teaser_headercolor'] .';"';
			$markerArray['###HEADER###'] = $this->cObj->TEXT($linkArray);
		}
		else{
			$markerArray['###HEADER###'] = '';
		}
		$markerArray['###HEADERCOLOR###'] = $this->cObj->data['go_teaser_headercolor'];
		$markerArray['###IMAGE_BG###'] = $this->imageBg;
		$markerArray['###IMAGE_FG###'] = $this->imageFg;
		$linkArray['wrap'] = '<span class="teaserMore">|</span>';
		$linkArray['value'] = $this->cObj->data['go_content_linktext'];
		$linkArray['typolink.']['parameter'] = $this->cObj->data['image_link'] . ' - teaser_link';
		$markerArray['###LINK###'] = ($this->cObj->data['go_content_linktext'] && $this->cObj->data['image_link'])?$this->cObj->TEXT($linkArray):'' ;
		$markerArray['###TEASER_TEXT###']  = $this->pi_RTEcssText($this->cObj->data['bodytext']);
		if($this->layout == 8){
			$linkArray['value'] = ($this->cObj->data['header_rte'])?nl2br($this->cObj->data['header_rte']):'';
			$linkArray['typolink.']['parameter'] = $this->cObj->data['image_link'] . ' - header_link';
			$linkArray['typolink.']['ATagParams'] = 'style="color:'.  $this->cObj->data['go_teaser_headercolor'] .';"';
			$markerArray['###HEADERLINK###'] = $this->cObj->TEXT($linkArray);
		}
     if(($this->layout == 11)&&($this->imageBg))
	  {
			$markerArray['###NO_BG###']='';
			$markerArray['###IMAGE_BGKV###'] = $this->cObj->IMAGE(array('file' => $this->imageBg, 'file.' => $this->imgParams['bg.']));
	  }
	  else
	  {
			$markerArray['###NO_BG###']='no_bg';
			$markerArray['###IMAGE_BGKV###']="";
	  }
			$markerArray['###BG_COLORPICK###'] = $this->cObj->data['go_teaser_colorpick'];


		return $this->parseTemplate('template_layout_' . $this->layout, $markerArray);

	}

}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/go_teaser/piTeaser/class.tx_goteaser_piTeaser.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/go_teaser/piTeaser/class.tx_goteaser_piTeaser.php']);
}

?>
