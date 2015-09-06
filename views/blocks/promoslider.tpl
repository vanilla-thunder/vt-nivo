[{assign var=oBanners value=$oViewConf->getBanners() }]
[{assign var="currency" value=$oView->getActCurrency() }]

[{if $oBanners|@count}]

	<div class="slider-wrapper theme-[{$oViewConf->getNivoTheme()}]" style="margin: 0 0 10px 0">
		<div id="slider" class="nivoSlider">
			[{foreach from=$oBanners item=oBanner }]
				[{assign var=oArticle value=$oBanner->getBannerArticle() }]
				[{assign var=sBannerLink value=$oBanner->getBannerLink() }]
				[{assign var=sBannerPictureUrl value=$oBanner->getBannerPictureUrl() }]
				[{assign var=oBannerCaption value=$oBanner->getCaptionContent()}]


				[{if $sBannerLink }]<a href="[{ $sBannerLink }]">[{/if}]
				[{if $sBannerPictureUrl}]
					<img src="[{ $sBannerPictureUrl }]" data-thumb="[{ $sBannerPictureUrl }]" title="[{if $oArticle }][{ $oArticle->oxarticles__oxtitle->value }] [{ $oArticle->getFPrice() }] [{ $currency->sign}][{elseif $oBannerCaption}][{$oBannerCaption->oxcontents__oxcontent->value|strip_tags}][{/if}]">
				[{/if}]
				[{if $sBannerLink }]</a>[{/if}]

			[{/foreach}]
		</div>
	</div>
	[{$oViewConf->nivoSlider("#slider")}]
[{/if}]