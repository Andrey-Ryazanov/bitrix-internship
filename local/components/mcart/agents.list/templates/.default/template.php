<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); 


use Bitrix\Main\UI\PageNavigation;

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

<div class="site-section site-section-sm bg-light">
    <div class="container agents-list">
        <div class="row mb-5">
            <div class="col-12">
                <div class="site-section-title">
                    <h2><?= GetMessage('AGENT_TITLE'); ?></h2>
                </div>
            </div>
        </div>

        <?php if (!empty($arResult['AGENTS'])) : ?>
            <div class="mb-5">
                <?php foreach ($arResult['AGENTS']['ITEMS'] as $agent) : ?>
                    <div class="agent__card" data-agent-id="<?= $agent['ID']; ?>">
                        <div class="small-info">
                            <?php
                            $avatar_url = !empty($agent['PHOTO_SRC']) ? $agent['PHOTO_SRC'] : '/images/no-avatar.png';
                            ?>
                            <div class="avatar" style="background-image: url(<?= $avatar_url; ?>);"></div>
                            <div class="info">
                                <div class="name"><?= $agent['UF_FIO']; ?></div>
                            </div>
                        </div>
                        <div class="agent__card_item">
                            <div class="agent__card_info">
                                <div class="card__info_item">
                                    <div class="position"><?= GetMessage('AGENT_EMAIL'); ?></div>
                                    <div class="name"><?= $agent['UF_EMAIL']; ?></div>
                                </div>
                                <div class="card__info_item">
                                    <div class="position"><?= GetMessage('AGENT_PHONE'); ?></div>
                                    <div class="name"><?= $agent['UF_PHONE']; ?></div>
                                </div>
                                <div class="card__info_item">
                                    <div class="position"><?= GetMessage('AGENT_ACTIVITY'); ?></div>
                                    <div class="name"><?= $agent['TYPE_OF_ACTIVITY_NAME']; ?></div>
                                </div>
                            </div>
                        </div>
                        <? $isFavorite = in_array($agent['ID'], $arResult['STAR_AGENTS']);?>
                        <a class="star <?= $isFavorite ? 'active' : ''; ?>" data-agent-id="<?= $agent['ID']; ?>">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4L14.472 9.26604L20 10.1157L16 14.2124L16.944 20L12 17.266L7.056 20L8 14.2124L4 10.1157L9.528 9.26604L12 4Z" stroke="#95929A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <input type="hidden" class="agent-id" value="<?= $agent['ID']; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            $APPLICATION->IncludeComponent(
                "mcart:main.pagenavigation",
                "pagination",
                array(
                    "NAV_OBJECT" => $arResult['AGENTS']['NAV_OBJECT'],
                    "SEF_MODE" => "N",
                ),
                false
            );

            ?>
        <?php endif; ?>
    </div>
</div>

<?php
$this->addExternalJS("/local/components/mcart/agent.list/templates/script.js");
?>

