<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?php if (!empty($arResult)):?>
<nav class="site-navigation text-right text-md-right" role="navigation">
    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
    <ul class="site-menu js-clone-nav d-none d-lg-block">

    <?php
    $previousLevel = 0;
    foreach($arResult as $arItem): ?>

        <?php if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel): ?>
            <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
        <?php endif ?>


        <?php if ($arItem["IS_PARENT"]): ?>

            <?php if ($arItem["DEPTH_LEVEL"] == 1): ?>
                <li class="has-children"><a href="<?=$arItem["LINK"]?>" class="<?php if ($arItem["SELECTED"]): ?>root-item-selected<?php else: ?>root-item<?php endif ?>"><?=$arItem["TEXT"]?></a>
                    <ul class="dropdown">
            <?php else: ?>
                <li<?php if ($arItem["SELECTED"]): ?> class="item-selected"<?php endif ?> class="has-children"><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
                    <ul class="dropdown">
            <?php endif ?>		
        <?php else: ?>

            <?php if ($arItem["PERMISSION"] > "D"): ?>

                <?php if ($arItem["DEPTH_LEVEL"] == 1): ?>
					<li><a href="<?=$arItem["LINK"]?>" class="<?php if ($arItem["SELECTED"]): ?>root-item-selected<?php else: ?>root-item<?php endif ?>"><?=$arItem["TEXT"]?></a></li>
                <?php else: ?>
                    <li<?php if ($arItem["SELECTED"]): ?> class="item-selected"<?php endif ?>><a href="<?= $arItem["LINK"] ?>" class="parent"><?=$arItem["TEXT"]?></a></li>
                <?php endif ?>

            <?php else: ?>
				
                <?php if ($arItem["DEPTH_LEVEL"] == 1): ?>
                    <li><a href="" class="<?php if ($arItem["SELECTED"]): ?>root-item-selected<?php else: ?>root-item<?php endif ?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
                <?php else: ?>
                    <li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
                <?php endif ?>
				
            <?php endif ?>

        <?php endif ?>

        <?php $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

    <?php endforeach ?>

    <?php if ($previousLevel > 1): ?>
        <?= str_repeat("</ul></li>", ($previousLevel-1) ); ?>
    <?php endif ?>

    </ul>
</nav>
<?php endif ?>
