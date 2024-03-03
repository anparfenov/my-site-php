<?

namespace Mysite\Features\CV;

use Mysite\Features\CV\CVModel;

class CVController
{
    static function show()
    {
        $data = CVModel::data();
        require(__DIR__ . '/./Templates/CV.php');
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
