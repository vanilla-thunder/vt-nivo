<?php
/**
 * vt Nivo Slider
 * Copyright (C) 2012-2013  Marat Bedoev
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */
$sMetadataVersion = '1.1';
$aModule          = array(
    'id'          => 'vt-nivo',
    'title'       => '<strong style="color:#c700bb;border: 1px solid #c700bb;padding: 0 2px;background:white;">VT</strong> Nivo Slider',
    'description' => oxRegistry::getLang()->translateString("nivo_description"),
    'thumbnail'   => 'oxid-vt.jpg',
    'version'     => '2.0 (2013-06-15) / newest version: <img src="https://raw.github.com/vanilla-thunder/vt-nivo/module/version.jpg" style="float:right;"/><br/><a style="display: inline-block; padding: 1px 25px; background: dodgerblue; border: 1px solid #585858; color: white;" href="https://github.com/vanilla-thunder/vt-nivo/" target="_blank">info</a> <a style="display: inline-block; padding: 1px 25px; background: forestgreen; border: 1px solid #585858; color: white;" href="https://github.com/vanilla-thunder/vt-nivo/archive/master.zip">download</a>',
    'author'      => 'Marat Bedoev',
    'email'       => 'oxid@marat.ws',
    'url'         => 'http://marat.ws',
    'extend'      => array(
        'oxviewconfig' => 'vt-nivo/extend/oxviewconfig_nivo',
        'oxactions'    => 'vt-nivo/extend/oxactions_nivo'
    ),
    'blocks'      => array(
        array('template' => 'layout/page.tpl', 'block' => 'vt_nivo', 'file' => '/views/blocks/promoslider.tpl'),
    ),
    'settings'    => array(
        array('group' => 'nivoModuleSettings', 'name' => 'nivo_start', 'type' => 'bool', 'value' => true, 'position' => 0),
        array('group' => 'nivoModuleSettings', 'name' => 'nivo_alist', 'type' => 'bool', 'value' => true, 'position' => 1),
        array('group' => 'nivoModuleSettings', 'name' => 'nivo_basket', 'type' => 'bool', 'value' => true, 'position' => 2),
        array('group' => 'nivoModuleSettings', 'name' => 'nivo_clearcookies', 'type' => 'bool', 'value' => true, 'position' => 3),
        array('group' => 'nivoModuleSettings', 'name' => 'nivo_contact', 'type' => 'bool', 'value' => true, 'position' => 4),
        array('group' => 'nivoModuleSettings', 'name' => 'nivo_content', 'type' => 'bool', 'value' => true, 'position' => 5),
        array('group' => 'nivoModuleSettings', 'name' => 'nivo_details', 'type' => 'bool', 'value' => true, 'position' => 6),
        array('group' => 'nivoModuleSettings', 'name' => 'nivo_forgotpwd', 'type' => 'bool', 'value' => true, 'position' => 7),
        array('group' => 'nivoModuleSettings', 'name' => 'nivo_guestbook', 'type' => 'bool', 'value' => true, 'position' => 8),
        array('group' => 'nivoModuleSettings', 'name' => 'nivo_links', 'type' => 'bool', 'value' => true, 'position' => 10),
        array('group' => 'nivoModuleSettings', 'name' => 'nivo_manufacturerlist', 'type' => 'bool', 'value' => true, 'position' => 11),
        array('group' => 'nivoModuleSettings', 'name' => 'nivo_news', 'type' => 'bool', 'value' => true, 'position' => 12),
        array('group' => 'nivoModuleSettings', 'name' => 'nivo_newsletter', 'type' => 'bool', 'value' => true, 'position' => 13),
        array('group' => 'nivoModuleSettings', 'name' => 'nivo_search', 'type' => 'bool', 'value' => true, 'position' => 14),
        array('group' => 'nivoModuleSettings', 'name' => 'nivo_tags', 'type' => 'bool', 'value' => true, 'position' => 15),
        //array('group' => 'nivoModuleSettings', 'name' => 'nivo_vendorlist', 'type' => 'bool', 'value' => true, 'position' => 16),  // this page doenst work in some shops?!?!?!?!

        array('group' => 'nivoMain', 'name' => 'nivojQuery', type => 'bool', 'value' => true, 'position' => 0),
        array('group' => 'nivoMain', 'name' => 'nivoTheme', type => 'select', 'value' => 'light', 'position' => 1, 'constraints' => 'bar|dark|default|light'),
        array('group' => 'nivoMain', 'name' => 'nivoEffect', type => 'select', 'value' => 'fade', 'position' => 2, 'constraints' => 'sliceDown|sliceDownLeft|sliceUp|sliceUpLeft|sliceUpDown|sliceUpDownLeft|fold|fade|random|slideInRight|slideInLeft|boxRandom|boxRain|boxRainReverse|boxRainGrow|boxRainGrowReverse'),
        array('group' => 'nivoMain', 'name' => 'nivoSlices', type => 'str', 'value' => '15', 'position' => 3),
        array('group' => 'nivoMain', 'name' => 'nivoBoxCols', type => 'str', 'value' => '8', 'position' => 4),
        array('group' => 'nivoMain', 'name' => 'nivoBoxRows', type => 'str', 'value' => '4', 'position' => 5),
        array('group' => 'nivoMain', 'name' => 'nivoAnimSpeec', type => 'str', 'value' => '1000', 'position' => 6),
        array('group' => 'nivoMain', 'name' => 'nivePauseTime', type => 'str', 'value' => '5000', 'position' => 7),
        array('group' => 'nivoMain', 'name' => 'nivoStartSlide', type => 'str', 'value' => '0', 'position' => 8),
        array('group' => 'nivoMain', 'name' => 'nivoDirectionNav', type => 'bool', 'value' => true, 'position' => 9),
        array('group' => 'nivoMain', 'name' => 'nivoControlNav', type => 'bool', 'value' => true, 'position' => 10),
        array('group' => 'nivoMain', 'name' => 'nivoControlNavThumbs', type => 'bool', 'value' => false, 'position' => 11),
        array('group' => 'nivoMain', 'name' => 'nivoPauseOnHover', type => 'bool', 'value' => true, 'position' => 12),
        array('group' => 'nivoMain', 'name' => 'nivoManualAdvance', type => 'bool', 'value' => false, 'position' => 13),
        array('group' => 'nivoMain', 'name' => 'nivoPrevText', type => 'str', 'value' => 'Prev', 'position' => 14),
        array('group' => 'nivoMain', 'name' => 'nivoNextText', type => 'str', 'value' => 'Next', 'position' => 15),
        array('group' => 'nivoMain', 'name' => 'nivoRandomStart', type => 'bool', 'value' => false, 'position' => 16),
        array('group' => 'nivoMain', 'name' => 'nivoBeforeChange', type => 'aarr', 'value' => '', 'position' => 17),
        array('group' => 'nivoMain', 'name' => 'nivoAfterChange', type => 'aarr', 'value' => '', 'position' => 18),
        array('group' => 'nivoMain', 'name' => 'nivoSlideshowEnd', type => 'aarr', 'value' => '', 'position' => 19),
        array('group' => 'nivoMain', 'name' => 'nivoLastSlide', type => 'aarr', 'value' => '', 'position' => 20),
        array('group' => 'nivoMain', 'name' => 'nivoAfterLoad', type => 'aarr', 'value' => '', 'position' => 21),
    )
);

