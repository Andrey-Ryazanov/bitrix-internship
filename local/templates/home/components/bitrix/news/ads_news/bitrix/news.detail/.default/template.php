<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="site-blocks-cover overlay aos-init aos-animate" style="background-image: url(&quot;<?=$arResult["DETAIL_PICTURE"]["SRC"]?>&quot;); background-position: 50% -16.3px;" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded"><?=GetMessage("Property_Details_of");?></span>
                <h1 class="mb-2"><?= $arResult['NAME'] ?></h1>
                <p class="mb-5"><strong class="h2 text-success font-weight-bold">$<?= number_format($arResult['DISPLAY_PROPERTIES']['PRICE']['VALUE']) ?></strong></p>
            </div>
        </div>
    </div>
</div>
<div class="site-section site-section-sm">
    <div class="container">
        <div class="row">
            <div class="col-lg-8" style="margin-top: -150px;">
                <div class="mb-5">
                    <div class="slide-one-item home-slider owl-carousel">

                        <? $imageGallery = $arResult["DISPLAY_PROPERTIES"]["IMAGE_GALLERY"]["FILE_VALUE"];
                        if(count((array)$imageGallery["SRC"]) == 1): ?>
                            <div><img src="<?=$imageGallery["SRC"]?>" alt="Image" class="img-fluid"></div>
                        <? else: ?>
                            <? foreach ($imageGallery as $arFile): ?>
                                <div><img src="<?=$arFile["SRC"]?>" alt="Image" class="img-fluid"></div>
                            <? endforeach; ?>
                        <? endif; ?>
                    </div>
                </div>
                <div class="bg-white">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <strong class="text-success h1 mb-3">$<?=number_format($arResult['DISPLAY_PROPERTIES']['PRICE']['VALUE'])?></strong>
                        </div>
                        <div class="col-md-6">
                            <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                <li>
                                    <span class="property-specs"><?=GetMessage("Date_of_update"); ?></span>
                                    <span class="property-specs-number"><?=(new DateTime($arResult['TIMESTAMP_X']))->format('d.m.Y')?></span>              
                                </li>
                                <li>
                                    <span class="property-specs"><?=GetMessage("Floors"); ?></span>
                                    <span class="property-specs-number"><?=$arResult['DISPLAY_PROPERTIES']['NUMBER_OF_FLOORS']['VALUE']?> <sup>+</sup></span>         
                                </li>
                                <li>
                                    <span class="property-specs"><?=GetMessage("SQ_FT"); ?></span>
                                    <span class="property-specs-number"><?=$arResult['DISPLAY_PROPERTIES']['TOTAL_AREA']['VALUE']?></span>          
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage("Baths"); ?></span>
                            <strong class="d-block"><?=$arResult['DISPLAY_PROPERTIES']['NUMBER_OF_FLOORS']['VALUE']?></strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage("The_presence_of_a_garage");?></span>
                            <strong class="d-block"><?=$arResult['DISPLAY_PROPERTIES']['THE_PRESENCE_OF_A_GARAGE']['VALUE'] ?? "Отсутствует"?></strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage("Price"); ?>/<?=GetMessage("SQ_FT"); ?></span>
                            <strong class="d-block">$<?=intdiv($arResult['DISPLAY_PROPERTIES']['PRICE']['VALUE'], $arResult['DISPLAY_PROPERTIES']['TOTAL_AREA']['VALUE'])?></strong>
                        </div>
                    </div>
                    <h2 class="h4 text-black"><?=GetMessage("More_Info");?></h2>
                    <p><?= $arResult['DETAIL_TEXT'] ?></p>
                    <div class="row mt-5">
                        <div class="col-12">
                            <h2 class="h4 text-black mb-3"><?=GetMessage("Property_Gallery");?></h2>
                        </div>
                        <? if(count((array)$imageGallery["SRC"]) == 1): ?>
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                <a href="<?=$imageGallery["SRC"]?>" class="image-popup gal-item">
                                    <img src="<?=$imageGallery["SRC"]?>" alt="Image" class="img-fluid">
                                </a>
                            </div>
                        <? else: ?>
                            <? foreach ($imageGallery as $arFile): ?>
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <a href="<?=$arFile["SRC"]?>" class="image-popup gal-item">
                                        <img src="<?=$arFile["SRC"]?>" alt="Image" class="img-fluid">
                                    </a>
                                </div>
                            <? endforeach; ?>
                        <? endif; ?>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <h2 class="h4 text-black mb-3"><?=GetMessage("Additional_materials");?></h2>
                        </div>
                        <? $additionalMaterials = $arResult["DISPLAY_PROPERTIES"]["ADDITIONAL_MATERIALS"]["FILE_VALUE"];
                            if(count((array)$additionalMaterials["SRC"]) == 1): ?>
                              <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                  <a href="<?= $additionalMaterials["SRC"] ?>" class="gal-item">
                                      <?= $additionalMaterials["ORIGINAL_NAME"] ?>
                                  </a>
                              </div>
                          <? else: ?>
                              <? foreach ($additionalMaterials as $arFile): ?>
                                  <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                      <a href="<?= $arFile["SRC"] ?>" class="gal-item">
                                          <?= $arFile["ORIGINAL_NAME"] ?>
                                      </a>
                                  </div>
                              <? endforeach; ?>
                          <? endif; ?>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <h2 class="h4 text-black mb-3"><?=GetMessage("Links_to_external_resources");?></h2>
                        </div>
                          <? foreach ($arResult["DISPLAY_PROPERTIES"]["LINKS_TO_EXTERNAL_RESOURCES"]["VALUE"] as $link): ?>
                              <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                  <a href="<?= (strpos($link, 'http://') === false && strpos($link, 'https://') === false) ? 'http://' . $link : $link ?>" class="gal-item">
                                      <?= $link ?>
                                  </a>
                              </div>
                          <? endforeach; ?>        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pl-md-5">
                <div class="bg-white widget border rounded">
                    <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
                    <form action="" class="form-contact-agent">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" id="phone" class="btn btn-primary" value="Send Message">
                        </div>
                    </form>
                </div>
                <div class="bg-white widget border rounded">
                    <h3 class="h4 text-black widget-title mb-3">Paragraph</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit qui explicabo, libero nam, saepe eligendi. Molestias maiores illum error rerum. Exercitationem ullam saepe, minus, reiciendis ducimus quis. Illo, quisquam, veritatis.</p>
                </div>
            </div>
        </div>
    </div>
</div>
