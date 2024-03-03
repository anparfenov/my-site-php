<?

namespace Mysite\Features\Home;

use Mysite\Features\Home\HomeModel;

class HomeController
{
    static function show()
    {
        $data = HomeModel::data();
        require(__DIR__ . '/./Templates/Home.php');
    }

    // TODO: move to parent class?
    static function render_template($path, array $args)
    {
        extract($args);
        ob_start();
        require $path;
        $html = ob_get_clean();

        return $html;
    }
}
