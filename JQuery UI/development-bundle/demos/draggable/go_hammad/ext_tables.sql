#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
	CType varchar(64),
	header_rte text,
	go_content_mce text,
	go_content_image int(11) unsigned DEFAULT '0' NOT NULL,
	go_content_image2 int(11) unsigned DEFAULT '0' NOT NULL,
	go_content_linktext varchar(64),
	go_teaser_layout tinyint(3) unsigned DEFAULT '0' NOT NULL,
	go_teaser_headercolor varchar(7) DEFAULT '' NOT NULL,
	go_teaser_line_above tinyint(3) DEFAULT '0' NOT NULL,
	go_teaser_line_below tinyint(3) DEFAULT '0' NOT NULL,
	go_teaser_colorpick text
);
