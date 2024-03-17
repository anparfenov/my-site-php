<?

use Mysite\Lib\AppConfig;
use Mysite\Lib\Translation;

?>

<footer class="Footer">
    <div>
        <a href="<?= AppConfig::config('info')['github_source_link'] ?>" class="Link" target="_blank">
            <?= Translation::t('footer', 'sources') ?>
        </a>
    </div>
</footer>