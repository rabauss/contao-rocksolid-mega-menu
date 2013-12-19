<?php
/*
 * Copyright MADE/YOUR/DAY OG <mail@madeyourday.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * RockSolid Mega Menu DCA
 *
 * @author Martin Auswöger <martin@madeyourday.net>
 */
$GLOBALS['TL_DCA']['tl_rocksolid_mega_menu'] = array(

	'config' => array(
		'dataContainer' => 'Table',
		'ctable' => array('tl_rocksolid_mega_menu_column'),
		'switchToEdit' => true,
		'enableVersioning' => true,
		'sql' => array(
			'keys' => array(
				'id' => 'primary',
			),
		),
	),

	'list' => array(
		'sorting' => array(
			'mode' => 1,
			'fields' => array('name'),
			'flag' => 1,
			'panelLayout' => 'filter;search,limit',
		),
		'label' => array(
			'fields' => array('name'),
			'format' => '%s',
		),
		'global_operations' => array(
			'all' => array(
				'label' => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href' => 'act=select',
				'class' => 'header_edit_all',
				'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"',
			),
		),
		'operations' => array(
			'edit' => array(
				'label' => &$GLOBALS['TL_LANG']['tl_rocksolid_mega_menu']['edit'],
				'href' => 'table=tl_rocksolid_mega_menu_column',
				'icon' => 'edit.gif',
				'attributes' => 'class="contextmenu"',
			),
			'editheader' => array(
				'label' => &$GLOBALS['TL_LANG']['tl_rocksolid_mega_menu']['editheader'],
				'href' => 'act=edit',
				'icon' => 'header.gif',
				'attributes' => 'class="edit-header"',
			),
			'copy' => array(
				'label' => &$GLOBALS['TL_LANG']['tl_rocksolid_mega_menu']['copy'],
				'href' => 'act=copy',
				'icon' => 'copy.gif',
			),
			'delete' => array(
				'label' => &$GLOBALS['TL_LANG']['tl_rocksolid_mega_menu']['delete'],
				'href' => 'act=delete',
				'icon' => 'delete.gif',
				'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
			),
			'show' => array(
				'label' => &$GLOBALS['TL_LANG']['tl_rocksolid_mega_menu']['show'],
				'href' => 'act=show',
				'icon' => 'show.gif',
			),
		),
	),

	'palettes' => array(
		'__selector__' => array('type'),
		'default' => '{type_legend},name,type',
		'auto' => '{type_legend},name,type;{settings_legend},columnCount,imageSize',
		'auto_images' => '{type_legend},name,type;{settings_legend},columnCount,imageSize',
		'manual' => '{type_legend},name,type;{settings_legend},columnCount',
		'html' => '{type_legend},name,type;{html_legend},html',
	),

	'fields' => array(
		'id' => array(
			'sql' => "int(10) unsigned NOT NULL auto_increment",
		),
		'tstamp' => array(
			'sql' => "int(10) unsigned NOT NULL default '0'",
		),
		'name' => array(
			'label' => &$GLOBALS['TL_LANG']['tl_rocksolid_mega_menu']['name'],
			'exclude' => true,
			'inputType' => 'text',
			'eval' => array(
				'mandatory' => true,
				'tl_class' => 'w50',
			),
			'sql' => "varchar(255) NOT NULL default ''",
		),
		'type' => array(
			'label' => &$GLOBALS['TL_LANG']['tl_rocksolid_mega_menu']['type'],
			'exclude' => true,
			'inputType' => 'select',
			'options' => array(
				'auto',
				'auto_images',
				'manual',
				'html',
			),
			'reference' => &$GLOBALS['TL_LANG']['tl_rocksolid_mega_menu']['types'],
			'eval' => array(
				'mandatory' => true,
				'chosen' => true,
				'submitOnChange' => true,
				'tl_class' => 'w50',
			),
			'sql' => "varchar(32) NOT NULL default ''",
		),
		'columnCount' => array(
			'label' => &$GLOBALS['TL_LANG']['tl_rocksolid_mega_menu']['columnCount'],
			'exclude' => true,
			'inputType' => 'select',
			'options' => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10),
			'eval' => array(
				'mandatory' => true,
			),
			'sql' => "int(10) unsigned NOT NULL default '4'",
		),
		'imageSize' => array(
			'label' => &$GLOBALS['TL_LANG']['tl_rocksolid_mega_menu']['imageSize'],
			'exclude' => true,
			'inputType' => 'imageSize',
			'options' => $GLOBALS['TL_CROP'],
			'reference' => &$GLOBALS['TL_LANG']['MSC'],
			'eval' => array(
				'rgxp' => 'digit',
				'nospace' => true,
				'helpwizard' => true,
			),
			'sql' => "varchar(64) NOT NULL default ''",
		),
		'html' => array(
			'label' => &$GLOBALS['TL_LANG']['tl_rocksolid_mega_menu']['html'],
			'exclude' => true,
			'inputType' => 'textarea',
			'eval' => array(
				'mandatory' => true,
				'allowHtml' => true,
				'class' => 'monospace',
				'rte' => 'ace|html',
			),
			'explanation' => 'insertTags',
			'sql' => "mediumtext NULL",
		),
	),

);