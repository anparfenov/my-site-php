<?

namespace Mysite\Lib;

class FileUtils
{
    public static function absDir(string $path)
    {
        return $_SERVER['DOCUMENT_ROOT'] . $path;
    }

    public static function commonDir(string $path)
    {
        return $_SERVER['DOCUMENT_ROOT'] . "/src/common" . $path;
    }

    public static function featuresDir(string $path)
    {
        return $_SERVER['DOCUMENT_ROOT'] . "/src/features" . $path;
    }

    public static function configDir(string $path)
    {
        return $_SERVER['DOCUMENT_ROOT'] . "/src/configuration" . $path;
    }

    public static function libDir(string $path)
    {
        return $_SERVER['DOCUMENT_ROOT'] . "/src/lib" . $path;
    }

    public static function staticDir(string $path)
    {
        return $_SERVER['DOCUMENT_ROOT'] . "/src/lib" . $path;
    }
}
