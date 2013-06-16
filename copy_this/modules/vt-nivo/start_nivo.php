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

	class start_nivo extends start_nivo_parent
	{
		public function getNivoSetting($sVar)
		{
			$cfg = $this->getConfig();
			$ret = $cfg->getConfigParam($sVar);
			if (gettype($ret) == "boolean")
			{
				if ($ret == 1)
				{
					return "true";
				} else
				{
					return "false";
				}
			}

			return $ret;
		}

		public function getNivoTheme()
		{
			$cfg = $this->getConfig();
			$theme = $cfg->getConfigParam("sNivoTheme");
			$ret = $this->getViewConfig()->getModuleUrl("vt-nivo", "src/$theme/$theme.css");

			return $ret;
		}

		public function loadNivoScript($sElement)
		{
			$cfg = $this->getConfig();



			$smarty = oxRegistry::get("oxUtilsView")->getSmarty();


			$sSufix = ($smarty->_tpl_vars["__oxid_include_dynamic"]) ? '_dynamic' : '';
			$sScripts = 'scripts' . $sSufix;

			$aScript = (array)$cfg->getGlobalParameter($sScripts);

			$sScript = "$('" . $sElement . "').nivoSlider({
		 	effect:'" . $cfg->getConfigParam("sNivoAnimation") . "',
			slices:15,boxCols:8,boxRows:4,
			animSpeed:" . $cfg->getConfigParam("iNivoAnimSpeed") . ",
			pauseTime:" . $cfg->getConfigParam("iNivoPauseTime") . ",
			directionNav:" . $this->getNivoSetting("bNivoDirectionNav") . ",
			directionNavHide:" . $this->getNivoSetting("bNivoDirectionNavHide") . ",
			controlNavThumbs:" . $this->getNivoSetting("bNivoControlNavThumbs") . ",
			prevText:'" . $cfg->getConfigParam("sNivoPrevText") . "',
			nextText:'" . $cfg->getConfigParam("sNivoNextText") . "'
			}); ";

			$aScript[] = $sScript;
			$cfg->setGlobalParameter($sScripts, $aScript);
		}
	}
