<?php

use Mysite\Lib\AppConfig;
use Mysite\Lib\FileUtils;
use Mysite\Lib\Translation;
?>

<?php ob_start() ?>
<h1><?= Translation::t('cv', 'title') ?></h1>
<div><?= Translation::t('cv', 'profession') ?></div>
<div class="CVLinks">
    <? foreach (AppConfig::config('info')['my_links'] as $link) : ?>
        <a href="<?= $link['href'] ?>"><?= $link['name'] ?></a>
    <? endforeach; ?>
</div>
<section>
    <h2><?= Translation::t('cv', 'skills') ?></h2>
    <ul>
        <h3><?= Translation::t('cv', 'programmingLanguages') ?></h3>
        <ul>
            <? foreach (Translation::t('cv', 'programmingLanguagesList') as $programmingLanguage) : ?>
                <li><?= $programmingLanguage ?></li>
            <? endforeach; ?>
        </ul>
        <h3><?= Translation::t('cv', 'frameworks') ?></h3>
        <ul>
            <? foreach (Translation::t('cv', 'frameworksList') as $frameworksList) : ?>
                <li><?= $frameworksList ?></li>
            <? endforeach; ?>
        </ul>
    </ul>
</section>
<section>
    <h2><?= Translation::t('cv', 'jobExperience') ?></h2>
    <ul>
        <li>
            <h3><?= Translation::t('cv', 'VKJobName') ?></h3>
            <ul>
                <? foreach (Translation::t('cv', 'jobVK') as $job) : ?>
                    <li><?= $job ?></li>
                <? endforeach; ?>
            </ul>
        </li>
        <li>
            <h3><?= Translation::t('cv', 'KoshelekJobName') ?></h3>
            <ul>
                <? foreach (Translation::t('cv', 'jobKoshelek') as $job) : ?>
                    <li><?= $job ?></li>
                <? endforeach; ?>
            </ul>
        </li>
        <li>
            <h3><?= Translation::t('cv', 'RozarioJobName') ?></h3>
            <ul>
                <? foreach (Translation::t('cv', 'jobRozario') as $job) : ?>
                    <li><?= $job ?></li>
                <? endforeach; ?>
            </ul>
        </li>
        <li>
            <h3><?= Translation::t('cv', 'SportmarketJobName') ?></h3>
            <ul>
                <? foreach (Translation::t('cv', 'jobSportmarket') as $job) : ?>
                    <li><?= $job ?></li>
                <? endforeach; ?>
            </ul>
        </li>
        <li>
            <h3><?= Translation::t('cv', 'SeventtestJobName') ?></h3>
            <ul>
                <? foreach (Translation::t('cv', 'jobSeventest') as $job) : ?>
                    <li><?= $job ?></li>
                <? endforeach; ?>
            </ul>
        </li>
    </ul>
</section>
<?php $page_main = ob_get_clean() ?>

<?php include FileUtils::common_dir('/templates/Layout.php') ?>