<?

use Mysite\Lib\Router;

$routes = Router::get_routes();
$current_route = Router::get_current_route($_SERVER["REQUEST_URI"]);
?>

<header class="Header">
    <nav class="Nav">
        <? foreach ($routes as $route) {
            // TODO: add html utils class
            $link_class = $current_route['name'] === $route['name'] ? 'Link Link--current' : 'Link';
            echo <<<HTML
                <a href="{$route['path']}" class="{$link_class}">{$route['name']}</a>
            HTML;
        }
        ?>
    </nav>
</header>