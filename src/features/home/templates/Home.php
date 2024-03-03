<?php

use Mysite\Lib\FileUtils;
use Mysite\Lib\Translation;
?>

<?php ob_start() ?>
<h1><?= Translation::t('home', 'title') ?></h1>
<div class="Home__content">
    <figure class="Home__image">
        <img src="/static/images/smile.jpeg" width="120" height="120">
        <figcaption><?= Translation::t('home', 'it_should_be_me'); ?></figcaption>
    </figure>
    <div class="Home__greet--layout"><?= Translation::t('home', 'greet') ?></div>
</div>
<?php $page_main = ob_get_clean() ?>

<?php include FileUtils::commonDir('/templates/Layout.php') ?>