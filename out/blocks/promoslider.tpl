[{assign var=oBanners value=$oView->getBanners() }]
[{assign var="currency" value=$oView->getActCurrency() }]
[{if $oBanners|@count}]
    <div id="oxNivoSlider" style='width:[{$oView->getNivoSetting("sNivoWidth")}];'>
	
    [{oxstyle include=$oViewConf->getModuleUrl('vt-nivo','src/nivo-slider.css') }]
    [{oxstyle include=$oView->getNivoTheme()}]
    [{oxscript include=$oViewConf->getModuleUrl('vt-nivo','src/jquery.nivo.slider.js') priority=10 }]
    
    
<div class='slider-wrapper theme-[{$oView->getNivoSetting("sNivoTheme")}]'>
    <div id="slider" class="nivoSlider" >
        [{foreach from=$oBanners item=oBanner key=slide}]
            [{assign var=sBannerLink value=$oBanner->getBannerLink() }]
            [{assign var=oArticle value=$oBanner->getBannerArticle() }]
            [{assign var=sBannerPictureUrl value=$oBanner->getBannerPictureUrl() }]
            
            [{if $sBannerLink }]<a href="[{ $sBannerLink }]">[{/if}]
            [{if $sBannerPictureUrl }]
            	<img src="[{ $sBannerPictureUrl }]" data-thumb="[{ $sBannerPictureUrl }]" [{if $oArticle }]title="#nivocaption_[{$slide}]"[{/if}] />
            [{/if }]

            [{if $sBannerLink }]</a>[{/if}]
            [{if $oArticle}]
            	[{capture append="nivoBlock_capture"}]
            		[{* edit capture appearance here *}]
            		<div id="nivocaption_[{$slide}]" class="nivo-html-caption">
						<strong class="nivoTitle">[{ $oArticle->oxarticles__oxtitle->value }]</strong> :: <strong class="nivoPrice">[{ $oArticle->getFPrice() }] [{ $currency->sign}]</strong>                 
            		</div>
            	[{/capture}]
            [{/if }]
        [{/foreach }]
    </div>
        
	[{foreach from=$nivoBlock_capture item="_block"}][{$_block}][{/foreach}]
</div>

	</div>
	[{$oView->loadNivoScript("#slider")}]
[{/if}]
