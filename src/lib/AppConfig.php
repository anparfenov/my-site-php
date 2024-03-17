<?

namespace Mysite\Lib;

use Mysite\Lib\FileUtils;

class AppConfig
{
    private static $config = [];

    public static function config(string $section = ''): array
    {
        if ($section) {
            return static::$config[$section];
        }

        return static::$config;
    }

    // TODO: add logs
    public static function init()
    {
        $files = scandir(FileUtils::config_dir());

        foreach ($files as $file) {
            if (!is_string($file) || $file === "." || $file === "..") {
                continue;
            }

            $file_path = FileUtils::config_dir($file);

            if (is_dir($file_path)) {
                continue;
            }

            $path_info = pathinfo($file_path);

            if ($path_info['extension'] === 'ini') {
                $ini_contents = parse_ini_file($file_path);
                if (!$ini_contents) {
                    continue;
                }

                static::$config[$path_info['filename']] = $ini_contents;
            }

            if ($path_info['extension'] === 'json') {
                $json_file = FileUtils::read_json($file_path);

                if (!$json_file) {
                    continue;
                }

                static::$config[$path_info['filename']] = $json_file;
            }
        }
    }
}
