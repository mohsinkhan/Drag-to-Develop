<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Caspar Stuebs <caspar@gosign.de>
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
 * Defines some functions, needed for TCA modifying
 *
 * @author	Caspar Stuebs <caspar@gosign.de>
 */
class user_go_tcamodify {
	/**
	 * This function creates colorised gifs for selectbox color, to be shown there
	 *
	 * @params array	$data the data array as reference
	 * @return	void
	 */
	function getSelectIconColor(array $data) {
		if (is_array($data['items'])) {
			$imgPath = PATH_site . 'typo3temp/pics/';

			foreach ($data['items'] as &$item) {
					// skip default item and divider
				if (empty($item[1]) || $item[1] == '--div--') {
					continue;
				}

				// check if selecticon [.gif] is not given
				$tmpImage = NULL;
				$tmpFileName = '';
				$color = substr($item[1], -6);
				$tmpFileName = 'color_' . t3lib_div::shortMD5($color) . '.gif';
				if (!file_exists($imgPath . $tmpFileName)) {
					$tmpImage = imagecreate(10, 18);
					$rColor = base_convert(substr($color, 0, 2), 16, 10);
					$gColor = base_convert(substr($color, 2, 2), 16, 10);
					$bColor = base_convert(substr($color, 4, 2), 16, 10);
					imagefill($tmpImage, 0, 0, imagecolorallocate($tmpImage, $rColor, $gColor, $bColor));
					imagegif($tmpImage, $imgPath . $tmpFileName);
				}
				$item[2] = '../typo3temp/pics/' . $tmpFileName;
			}
		}
		return void;
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/go_teaser/lib/class.user_go_tcamodify.php'])    {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/go_teaser/lib/class.user_go_tcamodify.php']);
}

?>