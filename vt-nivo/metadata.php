<?php
/**
 * vt Nivo Slider
 * Copyright (C) 2012  Marat Bedoev
 * 
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */
$aModule = array(
    'id' => 'vt-nivo',
    'title' => '<strong style="color:#c700bb;border: 1px solid #c700bb;padding: 0 2px;background:white;">VT</strong> Nivo Slider',
    'description' => 'Nivo Slider implementation for Azure Template<hr/><h2>Installation:</h2>copy this code into tpl/layout/header.tpl:<p><input type="text" size="64" value="[{block name=&quot;promoslider&quot;}][{/block}]"/></p>',
    'thumbnail' => 'oxid-vt.jpg',
    'version' => '1.0',
    'author' => 'Marat Bedoev',
    'email' => 'oxid@marat-bedoev.net',
    'url' => 'https://github.com/vanilla-thunder/',
    'extend' => array(
        'start' => 'vt-nivo/start_ext',
    ),
    'blocks' => array(
        array('template' => 'layout/header.tpl', 'block' => 'promoslider', 'file' => 'promoslider.tpl'),
    ),
    'settings' => array(
        array('group' => 'nivoMain', 'name' => 'iNivoAnimSpeed', 'type' => 'str', 'value' => '1000', 'position' => 1),
        array('group' => 'nivoMain', 'name' => 'iNivoPauseTime', 'type' => 'str', 'value' => '5000', 'position' => 2),
        array('group' => 'nivoMain', 'name' => 'sNivoAnimation', 'type' => 'select', 'value' => 'random', 'constrains' => 'sliceDown|sliceDownLeft|sliceUp|sliceUpLeft|sliceUpDown|sliceUpDownLeft|fold|fade|random|slideInRight|slideInLeft|boxRandom|boxRain|boxRainReverse|boxRainGrow|boxRainGrowReverse', 'position' => 3),
        array('group' => 'nivoMain', 'name' => 'bNivoDirectionNav', 'type' => 'bool', 'value' => true, 'position' => 4),
        array('group' => 'nivoMain', 'name' => 'bNivoDirectionNavHide', 'type' => 'bool', 'value' => true, 'position' => 5),
        array('group' => 'nivoMain', 'name' => 'bNivoControlNavThumbs', 'type' => 'bool', 'value' => false, 'position' => 6),
        array('group' => 'nivoMain', 'name' => 'sNivoPrevText', 'type' => 'str', 'value' => 'Prev', 'position' => 7),
        array('group' => 'nivoMain', 'name' => 'sNivoNextText', 'type' => 'str', 'value' => 'Next', 'position' => 8),
        array('group' => 'nivoStyle', 'name' => 'sNivoTheme', 'type' => 'select', 'value' => 'default', 'constrains' => 'default|nivo|orman|pascal|bar|dark|light'),
        array('group' => 'nivoStyle', 'name' => 'sNivoWidth', 'type' => 'str', 'value' => '100%'),
    )
);

