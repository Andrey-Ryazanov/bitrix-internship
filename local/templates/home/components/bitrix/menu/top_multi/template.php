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
            <li class="has-children">
                <a href="<?=$arItem["LINK"]?>">
                    <?=$arItem["TEXT"]?>
                </a>
                <ul class="dropdown">
        <?php else: ?>

            <?php if ($arItem["PERMISSION"] > "D"): ?>
                <li>
                    <a href="<?=$arItem["LINK"]?>">
                        <?=$arItem["TEXT"]?>
                    </a>
                </li>
				
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
