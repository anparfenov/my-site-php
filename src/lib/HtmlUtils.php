<?

namespace Mysite\Lib;

class HtmlUtils
{
    public static function class_names(string $str, array $arr = []): string
    {
        if (!$arr) {
            return $str;
        }

        $class_names = '';
        foreach ($arr as $class_name => $condition) {
            if ($condition) {
                $class_names .= $class_name . " ";
            }
        }

        return $str . " " . trim($class_names);
    }
}
