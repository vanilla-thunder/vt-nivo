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
 
class oxviewconfig_nivo extends oxviewconfig_nivo_parent
{

	/**
	 * Returns active banner list
	 *
	 * @return objects
	 */
	public function getBanners()
	{
		$cfg = oxRegistry::getConfig();
		$param = "nivo_".$this->getActiveClassName();
		if(!$cfg->getConfigParam($param)) return NULL;
		
		$oBannerList = NULL;
		if ($cfg->getConfigParam('bl_perfLoadAktion'))
		{
			$oBannerList = oxNew('oxActionList');
			$oBannerList->loadBanners();
		}

		return $oBannerList;
	}

	public function getNivoTheme()
	{
		return oxRegistry::getConfig()->getConfigParam("nivoTheme");
	}

	public function nivoSlider($selector)
	{
		$cfg = oxRegistry::getConfig();

		/* include css */
		$smarty = oxRegistry::get("oxUtilsView")->getSmarty();
		$sSufix = ($smarty->_tpl_vars["__oxid_include_dynamic"]) ? '_dynamic' : '';

		$theme = $cfg->getConfigParam("nivoTheme");
		$aStyles = (array)$cfg->getGlobalParameter('styles' . $sSufix);
		$aStyles[] = $this->getModuleUrl('vt-nivo', 'nivo-slider/nivo-slider.css');
		$aStyles[] = $this->getModuleUrl('vt-nivo', 'nivo-slider/themes/' . $theme . '/' . $theme . '.css');
		$cfg->setGlobalParameter('styles' . $sSufix, $aStyles);

		$beforeChange = '';
		foreach($cfg->getConfigParam("nivoBeforeChange") as $row)   {  $beforeChange .= $row;	}

		$afterChange = '';
		foreach($cfg->getConfigParam("nivoAfterChange") as $row)   {  $afterChange .= $row;	}
			
		$slideshowEnd = '';
		foreach($cfg->getConfigParam("nivoSlideshowEnd") as $row)   {  $slideshowEnd .= $row;	}
			
		$lastSlide = '';
		foreach($cfg->getConfigParam("nivoLastSlide") as $row)   {  $lastSlide .= $row;	}
			
		$afterLoad = '';
		foreach($cfg->getConfigParam("nivoAfterLoad") as $row)   {  $afterLoad .= $row;	}
			
		$sliderconfig = '{
			effect: "'.$cfg->getConfigParam("nivoEffect").'",
			slices: '.$cfg->getConfigParam("nivoSlices").', /* For slice animations */
			boxCols: '.$cfg->getConfigParam("nivoBoxCols").', /* For box animations */
            boxRows: '.$cfg->getConfigParam("nivoBoxRows").', /* For box animations */
            animSpeed: '.$cfg->getConfigParam("nivoAnimSpeec").', /* Slide transition speed */
            pauseTime: '.$cfg->getConfigParam("nivePauseTime").', /* How long each slide will show */
            startSlide: '.$cfg->getConfigParam("nivoStartSlide").', /* Set starting Slide (0 index) */
            directionNav: '.($cfg->getConfigParam("nivoDirectionNav") ? 'true' : 'false').', /* Next & Prev navigation */
            controlNav: '.($cfg->getConfigParam("nivoControlNav") ? 'true' : 'false').', /* 1,2,3... navigation */
            controlNavThumbs: '.($cfg->getConfigParam("nivoControlNavThumbs") ? 'true' : 'false').', /* Use thumbnails for Control Nav */
            pauseOnHover: '.($cfg->getConfigParam("nivoPauseOnHover") ? 'true' : 'false').', /* Stop animation while hovering */
            manualAdvance: '.($cfg->getConfigParam("nivoManualAdvance") ? 'true' : 'false').', /* Force manual transitions */
            prevText: "'.$cfg->getConfigParam("nivoPrevText").'", /* Prev directionNav text */
            nextText: "'.$cfg->getConfigParam("nivoNextText").'", /* Next directionNav text */
            randomStart: '.($cfg->getConfigParam("nivoRandomStart") ? 'true' : 'false').', /* Start on a random slide */
            beforeChange: function(){'.$beforeChange.'}, /* Triggers before a slide transition */
            afterChange: function(){'.$afterChange.'}, /* Triggers after a slide transition */
            slideshowEnd: function(){'.$slideshowEnd.'}, /* Triggers after all slides have been shown */
            lastSlide: function(){'.$lastSlide.'}, /* Triggers when last slide is shown */
            afterLoad: function(){'.$afterLoad.'} /* Triggers when slider has loaded */
		}';

		// inline include + jquery noConflict()
		if ($cfg->getConfigParam("nivojQuery")) 
		{
			$content = '<script type="text/javascript" src="' . $this->getModuleUrl('vt-nivo', 'out/jquery-1.11.3.min.js') . '"></script>'; // jquery
			$content .= '<script type="text/javascript" src="' . $this->getModuleUrl('vt-nivo', 'nivo-slider/jquery.nivo.slider.pack.js') . '"></script>'; // nivo slider
			$content .= '<script type="text/javascript"> var j = jQuery.noConflict(); j(window).ready(function(){ j("' . $selector . '").nivoSlider('.$sliderconfig.'); }); </script>';
			return $content;
		}
		else
		{
			$aInclude = (array)$cfg->getGlobalParameter('includes' . $sSufix);
			$aInclude[10][] = $this->getModuleUrl('vt-nivo', 'nivo-slider/jquery.nivo.slider.pack.js'); //include nivo
			$cfg->setGlobalParameter('includes' . $sSufix, $aInclude);

			// slider init script
			$aScript = (array)$cfg->getGlobalParameter('scripts' . $sSufix);
			$aScript[] = "$('" . $selector . "').nivoSlider(".$sliderconfig.");";
			$cfg->setGlobalParameter('scripts' . $sSufix, $aScript);
		}
	}
}