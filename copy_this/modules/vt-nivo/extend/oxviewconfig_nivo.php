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

	class oxviewconfig_nivo extends oxviewconfig_nivo_parent
	{


		/**
		 * Returns active banner list
		 *
		 * @return objects
		 */
		public function getBanners()
		{

			$oBannerList = NULL;

			if ($this->getConfig()->getConfigParam('bl_perfLoadAktion'))
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


			if ($cfg->getConfigParam("nivojQuery")) // inline include + jquery noConflict()
			{
				$content = '<script type="text/javascript" src="' . $this->getModuleUrl('vt-nivo', 'out/jquery-1.10.1.min.js') . '"></script>'; // jquery
				$content .= '<script type="text/javascript" src="' . $this->getModuleUrl('vt-nivo', 'nivo-slider/jquery.nivo.slider.pack.js') . '"></script>'; // nivo slider
				$content .= '<script type="text/javascript"> var j = jQuery.noConflict(); j(window).ready(function(){ j("' . $selector . '").nivoSlider(); }); </script>';

				return $content;
			}
			else
			{
				$aInclude = (array)$cfg->getGlobalParameter('includes' . $sSufix);
				$aInclude[10][] = $this->getModuleUrl('vt-nivo', 'nivo-slider/jquery.nivo.slider.pack.js'); //include nivo
				$cfg->setGlobalParameter('includes' . $sSufix, $aInclude);

				// slider init script
				$aScript = (array)$cfg->getGlobalParameter('scripts' . $sSufix);
				$aScript[] = "$('" . $selector . "').nivoSlider();";
				$cfg->setGlobalParameter('scripts' . $sSufix, $aScript);
			}


		}
	}