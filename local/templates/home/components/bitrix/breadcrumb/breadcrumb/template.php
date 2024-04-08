<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();
if(!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css))
{
	$strReturn .= '<link href="'.CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css").'" type="text/css" rel="stylesheet" />'."\n";
}

if ($APPLICATION->GetCurPage() != '/') 
{
	$urlToImage = SITE_TEMPLATE_PATH . '/images/hero_bg_2.jpg';

	$strReturn .= '<div class="site-blocks-cover inner-page-cover overlay aos-init aos-animate" style="background-image: url(\''.$urlToImage.'\'); background-position: 50% -80.3px;" data-aos="fade" data-stellar-background-ratio="0.5">';
	$strReturn .= '<div class="container">';
	$strReturn .= '<div class="row align-items-center justify-content-center text-center">';
	$strReturn .= '<div class="col-md-10">';
	$strReturn .= '<h1 class="mb-2">' . $APPLICATION->GetTitle() . '</h1>';
	$strReturn .= '<div>';

	$itemSize = count($arResult);
	for($index = 0; $index < $itemSize; $index++)
	{
		$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
		$arrow = ($index > 0? '<span class="mx-2 text-white">•</span>' : '');
		
		if (empty($arResult[$index]["LINK"]) === false){
			if(
				$arResult[$index]["LINK"] == $APPLICATION->GetCurPage() 
				|| $index == $itemSize - 1
			)
			{
				$strReturn .= '
					'.$arrow.'
					<strong class="text-white">'.$title.'</strong>';
			}
			else
			{
				$strReturn .= '
					'.$arrow.'
					<a href="'.$arResult[$index]["LINK"].'" >'. $title . '</a>';
			}
		}
	}

	$strReturn .= '</div></div></div></div></div>';
}
return $strReturn;