<?php

/*
 * vt - Nivo Slider Integration for OXID eShop
 * Copyright (C) 2015  vt
 * info:  m@marat.ws
 *
 * GNU GENERAL PUBLIC LICENSE  
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 *  without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */

class oxactions_nivo extends oxactions_nivo_parent
{
    public function getCaptionContent()
    {
        if(!strpos($this->oxactions__oxtitle->value, "|") || $this->oxactions__oxtype->value != 3 ) return false;

        $cmsident = trim(substr($this->oxactions__oxtitle->value,strpos($this->oxactions__oxtitle->value, "|")+1));

        /** @var oxContent $oContent */
        $oContent = oxNew("oxcontent");

        if(!$oContent->loadByIdent($cmsident)) return false;

        return $oContent;
    }

}