<?

namespace Mysite\Lib;

class FileUtils
{
    public static function abs_dir(string $path = '')
    {
        return $_SERVER['DOCUMENT_ROOT'] . $path;
    }

    public static function common_dir(string $path = '')
    {
        return $_SERVER['DOCUMENT_ROOT'] . "/src/common/" . $path;
    }

    public static function features_dir(string $path = '')
    {
        return $_SERVER['DOCUMENT_ROOT'] . "/src/features/" . $path;
    }

    public static function config_dir(string $path = '')
    {
        return $_SERVER['DOCUMENT_ROOT'] . "/src/configuration/" . $path;
    }

    public static function lib_dir(string $path = '')
    {
        return $_SERVER['DOCUMENT_ROOT'] . "/src/lib/" . $path;
    }

    public static function static_dir(string $path = '')
    {
        return $_SERVER['DOCUMENT_ROOT'] . "/src/lib/" . $path;
    }

    public static function read_files(string $dir)
    {
        $files = scandir($dir);

        $file_contents = [];
        foreach ($files as $file) {
            if (!is_string($file) || $file === "." || $file === "..") {
                continue;
            }

            $file_path = FileUtils::abs_dir($dir . $file);

            if (is_dir($file_path)) {
                continue;
            }

            $content = file_get_contents($file_path);
            if (!$content) {
                // TODO: add logs
                continue;
            }

            $files_contents[] = ['content' => $content, 'path_info' => pathinfo($file_path)];
        }

        return $file_contents;
    }

    public static function read_json(string $file_path): ?array
    {
        $content = file_get_contents($file_path);
        if (!$content) {
            return null;
        }

        $json_file = json_decode($content, true);

        if (!$json_file) {
            return null;
        }

        return $json_file;
    }
}
