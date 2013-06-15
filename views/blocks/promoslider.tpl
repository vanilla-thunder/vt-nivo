[{assign var=oBanners value=$oViewConf->getBanners() }]
[{assign var="currency" value=$oView->getActCurrency() }]

[{if $oBanners|@count}]

	<div class="slider-wrapper theme-[{$oViewConf->getNivoTheme()}]">
		<div id="slider" class="nivoSlider">
			[{foreach from=$oBanners item=oBanner }]
				[{assign var=oArticle value=$oBanner->getBannerArticle() }]
				[{assign var=sBannerLink value=$oBanner->getBannerLink() }]
				[{assign var=sBannerPictureUrl value=$oBanner->getBannerPictureUrl() }]


				[{if $sBannerLink }]<a href="[{ $sBannerLink }]">[{/if}]
				[{if $sBannerPictureUrl}]
					<img src="[{ $sBannerPictureUrl }]" height="220" width="940" [{if $oArticle }]title="[{ $oArticle->oxarticles__oxtitle->value }] [{ $oArticle->getFPrice() }] [{ $currency->sign}]"[{/if}]>
				[{/if}]
				[{if $sBannerLink }]</a>[{/if}]

			[{/foreach}]
		</div>
	</div>
	[{$oViewConf->nivoSlider("#slider")}]
[{/if}]