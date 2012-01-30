<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');


t3lib_div::loadTCA("tt_content");
$tempColumns = array( 'header_rte' => Array (
						'l10n_mode' => 'prefixLangTitle',
						'l10n_cat' => 'text',
						'label' => 'LLL:EXT:go_content/locallang_db.xml:tt_content.header_rte',
						'config' => Array (
							'type' => 'text',
							'cols' => '48',
							'rows' => '5',
							'wizards' => Array(
								'_PADDING' => 4,
								'_VALIGN' => 'middle',
								'RTE' => Array(
									'notNewRecords' => 1,
									'RTEonly' => 1,
									'type' => 'script',
									'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
									'icon' => 'wizard_rte2.gif',
									'script' => 'wizard_rte.php',
								),
								'table' => Array(
									'notNewRecords' => 1,
									'enableByTypeConfig' => 1,
									'type' => 'script',
									'title' => 'Table wizard',
									'icon' => 'wizard_table.gif',
									'script' => 'wizard_table.php',
									'params' => array('xmlOutput' => 0)
								),
								'forms' => Array(
									'notNewRecords' => 1,
									'enableByTypeConfig' => 1,
									'type' => 'script',
			#						'hideParent' => array('rows' => 4),
									'title' => 'Forms wizard',
									'icon' => 'wizard_forms.gif',
									'script' => 'wizard_forms.php?special=formtype_mail',
									'params' => array('xmlOutput' => 0)
								)
							),
							'softref' => 'typolink_tag,images,email[subst],url'
						)
					),
					'go_content_image' => txdam_getMediaTCA('image_field', 'go_content_image'),
					'go_content_image2' => txdam_getMediaTCA('image_field', 'go_content_image2'),
					'go_content_linktext' => array (
						'exclude' => 1,
						'label' => 'LLL:EXT:go_teaser/locallang_db.xml:tt_content.go_content_linktext',
						'config' => array (
							'type' => 'input',
							'size' => '20',
							'max' => '64',
							'softref' => 'email[subst]'
						)
					),

					'go_teaser_layout' => array (
						'exclude' => 0,
						'label' => 'LLL:EXT:go_teaser/locallang_db.xml:tt_content.tx_goteaser.piTeaser_layout',
						'config' => array (
							'type' => 'select',
							'items' => array (
								array('LLL:EXT:go_teaser/locallang_db.xml:tt_content.tx_goteaser.piTeaser_layout.I.0', '0', t3lib_extMgm::extRelPath('go_teaser').'res/selicon_tt_content_tx_goteaser.piTeaser_layout_0.gif'),
								array('LLL:EXT:go_teaser/locallang_db.xml:tt_content.tx_goteaser.piTeaser_layout.I.1', '1', t3lib_extMgm::extRelPath('go_teaser').'res/selicon_tt_content_tx_goteaser.piTeaser_layout_1.gif'),
								array('LLL:EXT:go_teaser/locallang_db.xml:tt_content.tx_goteaser.piTeaser_layout.I.2', '2', t3lib_extMgm::extRelPath('go_teaser').'res/selicon_tt_content_tx_goteaser.piTeaser_layout_2.gif')
							),
							'size' => 1,
							'maxitems' => 1,
						)
					),
					'go_teaser_headercolor' => array (
						'exclude' => 0,
						'label' => 'LLL:EXT:go_teaser/locallang_db.xml:tt_content.tx_goteaser_headercolor',
						'config' => array (
							'type' => 'select',
							'items' => array (
								array('LLL:EXT:go_teaser/locallang_db.xml:tt_content.tx_goteaser_headercolor.I.0', '#000000', ''),
								array('LLL:EXT:go_teaser/locallang_db.xml:tt_content.tx_goteaser_headercolor.I.1', '#ffffff', ''),
								array('LLL:EXT:go_teaser/locallang_db.xml:tt_content.tx_goteaser_headercolor.I.2', '#af1f1e', ''),
								array('LLL:EXT:go_teaser/locallang_db.xml:tt_content.tx_goteaser_headercolor.I.3', '#db9950', ''),
								array('LLL:EXT:go_teaser/locallang_db.xml:tt_content.tx_goteaser_headercolor.I.4', '#008031', ''),
								array('LLL:EXT:go_teaser/locallang_db.xml:tt_content.tx_goteaser_headercolor.I.5', '#b86024', ''),
								array('LLL:EXT:go_teaser/locallang_db.xml:tt_content.tx_goteaser_headercolor.I.6', '#0a3a6e', ''),
								array('LLL:EXT:go_teaser/locallang_db.xml:tt_content.tx_goteaser_headercolor.I.7', '#207baf', ''),
								array('LLL:EXT:go_teaser/locallang_db.xml:tt_content.tx_goteaser_headercolor.I.8', '#949494', ''),
							),
							'itemsProcFunc' => 'EXT:go_pages/lib/class.user_go_tcamodify.php:user_go_tcamodify->getSelectIconColor',
							'iconsInOptionTags' => 1,
							'size' => 1,
							'maxitems' => 1,
						)
					),
		 'go_teaser_colorpick' => Array (
			'label' => 'Hintergrund-Farbauswaehler',
			'config' => Array (
			'type' => 'input',
			'size' => '10',
			'wizards' => array(
		             'colorpick' => array(
		                 'type' => 'colorbox',
		                 'title' => 'Color picker',
		                 'script' => 'wizard_colorpicker.php',
		                 'dim' => '20x20',
		                 'tableStyle' => 'border: solid 1px black; margin-left: 20px;',
		                 'JSopenParams' => 'height=550,width=365,status=0,menubar=0,scrollbars=1',
		                 'exampleImg' => 'gfx/wizard_colorpickerex.jpg',
		             )
		         )
				 )
				 ),
					'subheader' => Array (
						'l10n_mode' => 'prefixLangTitle',
						'l10n_cat' => 'text',
						'label' => 'LLL:EXT:go_teaser/locallang_db.xml:tt_content.header_rte',
						'config' => Array (
							'type' => 'text',
							'cols' => '48',
							'rows' => '5',
						)
					),
					'go_teaser_line_above' => array (
						'exclude' => 0,
						'label' => 'LLL:EXT:go_teaser/locallang_db.xml:tt_content.line_above',
						'config' => array (
							'type' => 'check',
							'default' => 0,
						)
					),
					'go_teaser_line_below' => array (
						'exclude' => 0,
						'label' => 'LLL:EXT:go_teaser/locallang_db.xml:tt_content.line_below',
						'config' => array (
							'type' => 'check',
							'default' => 1,
						)
					),

);



t3lib_extMgm::addTCAcolumns('tt_content',$tempColumns,1);


$TCA['tt_content']['columns']['go_content_image']['label'] = 'LLL:EXT:go_teaser/locallang_db.xml:tt_content.go_content_image';
$TCA['tt_content']['columns']['go_content_image']['exclude'] = 1;
$TCA['tt_content']['columns']['go_content_image']['config']['show_thumbs'] = 1;
$TCA['tt_content']['columns']['go_content_image']['config']['size'] = 1;
$TCA['tt_content']['columns']['go_content_image']['config']['maxitems'] = 1;
$TCA['tt_content']['columns']['go_content_image']['config']['minitems'] = 0;
$TCA['tt_content']['columns']['go_content_image']['config']['autoSizeMax'] = 1;

$TCA['tt_content']['columns']['go_content_image2']['label'] = 'LLL:EXT:go_teaser/locallang_db.xml:tt_content.go_content_image2';
$TCA['tt_content']['columns']['go_content_image2']['exclude'] = 1;
$TCA['tt_content']['columns']['go_content_image2']['config']['show_thumbs'] = 1;
$TCA['tt_content']['columns']['go_content_image2']['config']['size'] = 1;
$TCA['tt_content']['columns']['go_content_image2']['config']['maxitems'] = 1;
$TCA['tt_content']['columns']['go_content_image2']['config']['minitems'] = 0;
$TCA['tt_content']['columns']['go_content_image2']['config']['autoSizeMax'] = 1;


// #
// ### piTeaser
// #
$TCA['tt_content']['palettes'][$_EXTKEY . '_piTeaser_bigImage']['showitem'] = 'go_teaser_layout';
$TCA['tt_content']['types'][$_EXTKEY . '_piTeaser']['showitem'] = 'CType;;;button;1-1-1, go_teaser_layout, header_rte, go_teaser_headercolor, bodytext;;;richtext:rte_transform[flag=rte_enabled|mode=ts];2-2-2,subheader;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piTeaser.subheaser,
																	--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,go_content_image2;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piTeaser_background,go_content_image;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piTeaser_foreground;go_content_piTeaser_bigImage;;3-3-3,go_teaser_colorpick,
																	--div--;LLL:EXT:go_imageedit_be/locallang_db.xml:tabLabel, tx_goimageeditbe_croped_image,
																	--div--;LLL:EXT:go_teaser/locallang_db.xml:tab_verweis,go_content_linktext, image_link,
																	--div--;LLL:EXT:cms/locallang_tca.xml:pages.tabs.access, starttime, endtime, fe_group';


$TCA['tt_content']['imageedit'][$_EXTKEY.'_piTeaser']= Array
											(
											"debug" => 0,						//gibt einige Debugwerte aus
											"imgPath" => '../uploads/pics/', 	// vom Backend aus gesehen
											"rootImgPath" => 'uploads/pics/', 	// vom Frontend aus

											//Backend
											"selector" => Array(
												"allowCustomRatio" => 1,		//dieses Flag lässt den benutzer 
																				//das Format des Selectors frei bestimmen
											),

											"menu" => Array(
												"displayType" => 0,					// 	1 : HTML-SELECT-BOX;
																					//	0 : BUTTONS (nachfolgende Einstellungen)
												"showImageName" => 1,				//Zeigt den Namen des Bildes an
												"showThumbnail" => 1,				//Zeigt ein Thumbnail
												"showThumbnail_size" => "150x120",	//diesen Ausmaßes
												"showResolution" => 1,				//Zeigt die Auflösung der Bilder im Selector an

												"maxImages" =>2,
											),

											"adjustResolution" => Array(
												"enabled" => 1,					//Bild runterrechnen ( 1 ) wenn > maxDisplayedWidth & maxDisplayedHeight
												"maxDisplayedWidth" => "700",		//hoechste unangetastete im Backend Angezeigte Auflösung
												"maxDisplayedHeight" => "400",
											),

											);

t3lib_extMgm::addPlugin(array(
	'LLL:EXT:go_teaser/locallang_db.xml:tt_content.piTeaser.CType',
	$_EXTKEY . '_piTeaser',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'piTeaser/icon.gif')
,'CType');

// #
// ### piProductTeaser
// #
 $TCA['tt_content']['imageedit'][$_EXTKEY.'_piElement']['selector'] = Array (
							"allowCustomRatio" => 1,
							"lockWH" => 0,
							"formatW" => '128',
							"formatH" => '64',
							"minHeight" => 128,
							"minWidth" => 64
					);

$TCA['tt_content']['types'][$_EXTKEY . '_piProductTeaser']['showitem'] = 'CType;;;button;1-1-1,
																			singleimage_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piProductTeaser.productImage,
																			input_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piProductTeaser.headline,
																			text_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piProductTeaser.text,
																			link_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piProductTeaser.link,
																			--div--;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piProductTeaser.maskImage,
																			tx_goimageeditbe_croped_image';
t3lib_extMgm::addPlugin(array(
	'LLL:EXT:go_teaser/locallang_db.xml:tt_content.piProductTeaser.CType',
	$_EXTKEY . '_piProductTeaser',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'piProductTeaser/icon.gif')
,'CType');

// #
// ### piHomeWhiteTeaser
// #
 $TCA['tt_content']['imageedit'][$_EXTKEY.'_piElement']['selector'] = Array (
							"allowCustomRatio" => 1,
							"lockWH" => 0,
							"formatW" => '128',
							"formatH" => '64',
							"minHeight" => 128,
							"minWidth" => 64
					);

$TCA['tt_content']['types'][$_EXTKEY . '_piHomeWhiteTeaser']['showitem'] = 'CType;;;button;1-1-1,
																			singleimage_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piHomeWhiteTeaser.productImage,
																			input_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piHomeWhiteTeaser.headline,
																			input_2;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piHomeWhiteTeaser.subHeadline,
																			text_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piHomeWhiteTeaser.text,
																			link_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piHomeWhiteTeaser.link,
																			--div--;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piHomeWhiteTeaser.maskImage,
																			tx_goimageeditbe_croped_image';
t3lib_extMgm::addPlugin(array(
	'LLL:EXT:go_teaser/locallang_db.xml:tt_content.piHomeWhiteTeaser.CType',
	$_EXTKEY . '_piHomeWhiteTeaser',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'piHomeWhiteTeaser/icon.gif')
,'CType');

// #
// ### piWhiteteaser2
// #
 $TCA['tt_content']['imageedit'][$_EXTKEY.'_piElement']['selector'] = Array (
							"allowCustomRatio" => 1,
							"lockWH" => 0,
							"formatW" => '128',
							"formatH" => '64',
							"minHeight" => 128,
							"minWidth" => 64
					);

$TCA['tt_content']['types'][$_EXTKEY . '_piWhiteteaser2']['showitem'] = 'CType;;;button;1-1-1,
																			singleimage_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piWhiteteaser2.productImage,
																			input_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piWhiteteaser2.headline,
																			input_2;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piWhiteteaser2.subHeadline,
																			text_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piWhiteteaser2.text,
																			link_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piWhiteteaser2.link,
																			--div--;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piWhiteteaser2.maskImage,
																			tx_goimageeditbe_croped_image';
t3lib_extMgm::addPlugin(array(
	'LLL:EXT:go_teaser/locallang_db.xml:tt_content.piWhiteteaser2.CType',
	$_EXTKEY . '_piWhiteteaser2',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'piWhiteteaser2/icon.gif')
,'CType');

// #
// ### piDarkteaser
// #
 $TCA['tt_content']['imageedit'][$_EXTKEY.'_piElement']['selector'] = Array (
							"allowCustomRatio" => 1,
							"lockWH" => 0,
							"formatW" => '128',
							"formatH" => '64',
							"minHeight" => 128,
							"minWidth" => 64
					);

$TCA['tt_content']['types'][$_EXTKEY . '_piDarkteaser']['showitem'] = 'CType;;;button;1-1-1,
																			singleimage_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piDarkteaser.productImage,
																			input_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piDarkteaser.headline,
																			input_2;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piDarkteaser.subHeadline,
																			text_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piDarkteaser.text,
																			link_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piDarkteaser.link,
																			--div--;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piDarkteaser.maskImage,
																			tx_goimageeditbe_croped_image';
t3lib_extMgm::addPlugin(array(
	'LLL:EXT:go_teaser/locallang_db.xml:tt_content.piDarkteaser.CType',
	$_EXTKEY . '_piDarkteaser',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'piDarkteaser/icon.gif')
,'CType');

// #
// ### piDarkteaser2
// #
 $TCA['tt_content']['imageedit'][$_EXTKEY.'_piElement']['selector'] = Array (
							"allowCustomRatio" => 1,
							"lockWH" => 0,
							"formatW" => '128',
							"formatH" => '64',
							"minHeight" => 128,
							"minWidth" => 64
					);

$TCA['tt_content']['types'][$_EXTKEY . '_piDarkteaser2']['showitem'] = 'CType;;;button;1-1-1,
																			singleimage_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piDarkteaser2.productImage,
																			input_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piDarkteaser2.headline,
																			input_2;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piDarkteaser2.subHeadline,
																			text_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piDarkteaser2.text,
																			link_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piDarkteaser2.link,
																			--div--;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piDarkteaser2.maskImage,
																			tx_goimageeditbe_croped_image';
t3lib_extMgm::addPlugin(array(
	'LLL:EXT:go_teaser/locallang_db.xml:tt_content.piDarkteaser2.CType',
	$_EXTKEY . '_piDarkteaser2',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'piDarkteaser2/icon.gif')
,'CType');

// #
// ### piLanguage
// #

$TCA['tt_content']['types'][$_EXTKEY . '_piLanguage']['showitem'] = 'CType;;;button;1-1-1';
t3lib_extMgm::addPlugin(array(
	'LLL:EXT:go_teaser/locallang_db.xml:tt_content.piLanguage.CType',
	$_EXTKEY . '_piLanguage',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'piLanguage/icon.gif')
,'CType');

// #
// ### piServices
// #

$TCA['tt_content']['types'][$_EXTKEY . '_piServices']['showitem'] = 'CType;;;button;1-1-1';
t3lib_extMgm::addPlugin(array(
	'LLL:EXT:go_teaser/locallang_db.xml:tt_content.piServices.CType',
	$_EXTKEY . '_piServices',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'piServices/icon.gif')
,'CType');


// #
// ### piHeading
// #
$TCA['tt_content']['types'][$_EXTKEY . '_piHeading']['showitem'] = 'CType;;;button;1-1-1,
																	text_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piHeading.heading,
																	text_2;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piHeading.subHeading,
																	text_3;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piHeading.text;;richtext:rte_transform[flag=rte_enabled|mode=ts]';
t3lib_extMgm::addPlugin(array(
	'LLL:EXT:go_teaser/locallang_db.xml:tt_content.piHeading.CType',
	$_EXTKEY . '_piHeading',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'piHeading/icon.gif')
,'CType');

// #
// ### piTeaserBoard
// #
$TCA['tt_content']['types'][$_EXTKEY . '_piTeaserBoard']['showitem'] = 'CType;;;button;1-1-1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piTeaserBoard,
																	--div--;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:tab1,
																			input_1;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:description,
																			singleimage_1;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:image,
																			multipleimages_1;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:imageHover,
																			link_1;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:target,
																	--div--;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:tab2,
																			input_2;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:description,
																			singleimage_2;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:image,
																			multipleimages_2;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:imageHover,
																			link_2;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:target,
																	--div--;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:tab3,
																			input_3;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:description,
																			singleimage_3;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:image,
																			multipleimages_3;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:imageHover,
																			link_3;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:target,
																	--div--;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:tab4,
																			input_4;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:description,
																			singleimage_4;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:image,
																			multipleimages_4;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:imageHover,
																			link_4;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:target,
																	--div--;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:tab5,
																			input_5;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:description,
																			singleimage_5;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:image,
																			multipleimages_5;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:imageHover,
																			link_5;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:target,
																	--div--;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:tab6,
																			input_6;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:description,
																			singleimage_6;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:image,
																			multipleimages_6;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:imageHover,
																			link_6;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:target,
																	--div--;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:tab7,
																			go_content_image;LLL:EXT:go_teaser/piTeaserBoard/locallang.xml:image,
																	--div--;LLL:EXT:cms/locallang_tca.xml:pages.tabs.access, starttime, endtime, fe_group,';

t3lib_extMgm::addPlugin(array(
	'LLL:EXT:go_teaser/locallang_db.xml:tt_content.piTeaserBoard.CType',
	$_EXTKEY . '_piTeaserBoard',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'piTeaserBoard/icon.gif')
,'CType');

// #
// ### piContact
// #
$TCA['tt_content']['types'][$_EXTKEY . '_piContact']['showitem'] = 'CType;;;button;1-1-1,
																			text_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piContact.heading,
																			text_2;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piContact.text;;richtext:rte_transform[flag=rte_enabled|mode=ts]';
t3lib_extMgm::addPlugin(array(
	'LLL:EXT:go_teaser/locallang_db.xml:tt_content.piContact.CType',
	$_EXTKEY . '_piContact',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'piContact/icon.gif')
,'CType');

// #
// ### piLinks
// #
$TCA['tt_content']['types'][$_EXTKEY . '_piLinks']['showitem'] = 'CType;;;button;1-1-1,
																			text_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piLinks.text;;richtext:rte_transform[flag=rte_enabled|mode=ts]';
t3lib_extMgm::addPlugin(array(
	'LLL:EXT:go_teaser/locallang_db.xml:tt_content.piLinks.CType',
	$_EXTKEY . '_piLinks',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'piLinks/icon.gif')
,'CType');

// #
// ### piPresse
// #
$TCA['tt_content']['types'][$_EXTKEY . '_piPresse']['showitem'] = 'CType;;;button;1-1-1,
																			text_1;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piPresse.heading,
																			text_2;LLL:EXT:go_teaser/locallang_db.xml:tt_content.piPresse.text;;richtext:rte_transform[flag=rte_enabled|mode=ts]';
t3lib_extMgm::addPlugin(array(
	'LLL:EXT:go_teaser/locallang_db.xml:tt_content.piPresse.CType',
	$_EXTKEY . '_piPresse',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'piPresse/icon.gif')
,'CType');




// #
// ### piZeshaan
// #
$TCA['tt_content']['types'][$_EXTKEY . '_piZeshaan']['showitem'] = 'CType;;;button;1-1-1
																	,text_1;LLL:EXT:go_mohsin/locallang_db.xml:tt_content.piZeshaan.text_1
																	,text_2;LLL:EXT:go_mohsin/locallang_db.xml:tt_content.piZeshaan.text_2
																	,text_3;LLL:EXT:go_mohsin/locallang_db.xml:tt_content.piZeshaan.text_3

																			';
t3lib_extMgm::addPlugin(array(
	'LLL:EXT:go_mohsin/locallang_db.xml:tt_content.piZeshaan.CType',
	$_EXTKEY . '_piZeshaan',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'piZeshaan/icon.gif')
,'CType');


// #
// ### piBublu
// #
$TCA['tt_content']['types'][$_EXTKEY . '_piBublu']['showitem'] = 'CType;;;button;1-1-1
																	,text_1;LLL:EXT:go_mohsin/locallang_db.xml:tt_content.piBublu.text_1
																	,text_2;LLL:EXT:go_mohsin/locallang_db.xml:tt_content.piBublu.text_2

																			';
t3lib_extMgm::addPlugin(array(
	'LLL:EXT:go_mohsin/locallang_db.xml:tt_content.piBublu.CType',
	$_EXTKEY . '_piBublu',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'piBublu/icon.gif')
,'CType');
?>