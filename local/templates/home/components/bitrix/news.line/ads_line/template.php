<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="news-line">
	<div class="site-section site-section-sm bg-light">
		<div class="container">
			<div class="row mb-5">
				<div class="col-12">
					<div class="site-section-title">
						<h2><?=GetMessage("New_Properties")?></h2>
					</div>
				</div>
			</div>
			<?php foreach ($arResult["ITEMS"] as $arItem): ?>
				<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('NEWS_DELETE_CONFIRM')));
				?>
				<div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<div class="row mb-5">
						<div class="col-md-6 col-lg-4 mb-4">
							<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="prop-entry d-block">
								<figure><img alt="Image" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" class="img-fluid"></figure>
								<div class="prop-text">
									<div class="inner">
										<span class="price rounded">$<?= $arItem['PROPERTY_PRICE_VALUE'] ?></span>
										<h3 class="title"><?= $arItem['NAME'] ?></h3>
										<p class="location"><?= $arItem['PREVIEW_TEXT'] ?></p>
									</div>
									<div class="prop-more-info">
										<div class="inner d-flex">
											<div class="col"><?=GetMessage("Area")?>: <strong><?= $arItem['PROPERTY_TOTAL_AREA_VALUE'] ?> <?=GetMessage("Meter")?>&sup2;</strong></div>
											<div class="col"><?=GetMessage("Floors")?>: <strong><?= $arItem['PROPERTY_NUMBER_OF_FLOORS_VALUE'] ?></strong></div>
											<div class="col"><?=GetMessage("Baths")?>: <strong><?= $arItem['PROPERTY_NUMBER_OF_BATHROOMS_VALUE'] ?></strong></div>
											<div class="col"><?=GetMessage("Garages")?>: <strong><?= $arItem['PROPERTY_THE_PRESENCE_OF_A_GARAGE_VALUE'] ?></strong></div>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
