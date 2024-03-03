<?

namespace Mysite\Lib;

class Router
{
    public static function get_current_route(string $current_path)
    {
        $routes = self::get_routes();
        foreach ($routes as $route) {
            if ($route['path'] === $current_path) {
                return $route;
            }
        }

        return $routes['home'];
    }

    public static function get_routes(): array
    {
        return [
            'home' => ['name' => Translation::t('nav', 'home'), 'path' => "/"],
            'cv' => ['name' => Translation::t('nav', 'cv'), 'path' => "/cv"],
        ];
    }
}
