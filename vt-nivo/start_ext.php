<?php
class start_ext extends start_ext_parent
{	
	public function getNivoSetting($sVar)
	{
		$cfg = $this->getConfig();
		$ret = $cfg->getConfigParam($sVar);
		if(gettype($ret) == "boolean") 
		{
			if($ret == 1) {
				return "true";
			} else {
				return "false";
			}
		}
		return $ret;
	}
	
	public function getNivoTheme()
	{
		$cfg = $this->getConfig();
		$theme = $cfg->getConfigParam("sNivoTheme");
		$ret = $this->getViewConfig()->getModuleUrl("vt-nivo","src/$theme/$theme.css");
		return $ret;
	}
	
	public function loadNivoScript($sElement)
	{
		$cfg  = $this->getConfig();
		$smarty = oxUtilsView::getInstance()->getSmarty();

		
    	$sSufix    = ($smarty->_tpl_vars["__oxid_include_dynamic"])?'_dynamic':'';    
    	$sScripts  = 'scripts'.$sSufix;
		
		$aScript  = (array) $cfg->getGlobalParameter($sScripts);
		
		$sScript = "$('".$sElement."').nivoSlider({
		 	effect:'".$cfg->getConfigParam("sNivoAnimation")."',
			slices:15,boxCols:8,boxRows:4,
			animSpeed:".$cfg->getConfigParam("iNivoAnimSpeed").",
			pauseTime:".$cfg->getConfigParam("iNivoPauseTime").",
			directionNav:".$this->getNivoSetting("bNivoDirectionNav").",
			directionNavHide:".$this->getNivoSetting("bNivoDirectionNavHide").",
			controlNavThumbs:".$this->getNivoSetting("bNivoControlNavThumbs").",
			prevText:'".$cfg->getConfigParam("sNivoPrevText")."',
			nextText:'".$cfg->getConfigParam("sNivoNextText")."'
			}); ";

        $aScript[] = $sScript;
        $cfg->setGlobalParameter($sScripts, $aScript);
	}
}
