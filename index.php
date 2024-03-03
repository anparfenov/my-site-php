<?
require_once __DIR__ . '/vendor/autoload.php';

use Mysite\Features\Home\HomeController;
use Mysite\Features\CV\CVController;
use Mysite\Lib\Translation;

Translation::init();

// TODO: make better router
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($uri === '/') {
    HomeController::show();
} elseif (str_starts_with($uri, "/cv")) {
    CVController::show();
} else {
    header('HTTP/1.1 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}
