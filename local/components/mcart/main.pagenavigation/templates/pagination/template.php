<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$component = $this->getComponent();
$this->setFrameMode(true);

$colorSchemes = array(
    "green" => "bx-green",
    "yellow" => "bx-yellow",
    "red" => "bx-red",
    "blue" => "bx-blue",
);
if (isset($arParams["TEMPLATE_THEME"]) && isset($colorSchemes[$arParams["TEMPLATE_THEME"]])) {
    $colorScheme = $colorSchemes[$arParams["TEMPLATE_THEME"]];
} else {
    $colorScheme = "";
}
?>
<div class="row">
    <div class="col-md-12 text-center">
        <div class="site-pagination">
            <?php if ($arResult["CURRENT_PAGE"] > 1): ?>
                <a href="<?= htmlspecialcharsbx($arResult["URL"]) ?>">1</a>
            <?php else: ?>
                <a href="#" class="active">1</a>
            <?php endif ?>

            <?php
            $page = $arResult["START_PAGE"] + 1;
            while ($page <= $arResult["END_PAGE"] - 1):
                ?>
                <?php if ($page == $arResult["CURRENT_PAGE"]): ?>
                    <a href="#" class="active"><?= $page ?></a>
                <?php else: ?>
                    <a href="<?= htmlspecialcharsbx($component->replaceUrlTemplate($page)) ?>"><?= $page ?></a>
                <?php endif ?>
                <?php $page++ ?>
            <?php endwhile ?>

            <?php if ($arResult["CURRENT_PAGE"] < $arResult["PAGE_COUNT"]): ?>
                <?php if ($arResult["PAGE_COUNT"] > 1): ?>
                    <a href="<?= htmlspecialcharsbx($component->replaceUrlTemplate($arResult["PAGE_COUNT"])) ?>"><?= $arResult["PAGE_COUNT"] ?></a>
                <?php endif ?>
            <?php else: ?>
                <?php if ($arResult["PAGE_COUNT"] > 1): ?>
                    <a href="#" class="active"><?= $arResult["PAGE_COUNT"] ?></a>
                <?php endif ?>
            <?php endif ?>
        </div>
    </div>
</div>
