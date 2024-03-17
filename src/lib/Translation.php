<?

namespace Mysite\Lib;
// TODO: read data from config
class Translation
{
    static $instance;
    static $translations = [];

    private static function read_translations()
    {
        $config = AppConfig::config('app');
        $files = scandir(FileUtils::abs_dir($config['translations_dir']));

        $translations = [];
        foreach ($files as $file) {
            if (!is_string($file) || $file === "." || $file === "..") {
                continue;
            }

            $file_path = FileUtils::abs_dir($config['translations_dir'] . $file);

            if (is_dir($file_path)) {
                continue;
            }

            $file_contents = file_get_contents($file_path);
            if (!$file_contents) {
                continue;
            }

            $path_info = pathinfo($file_path);
            $translations[$path_info['filename']] = json_decode($file_contents, true);
        }

        static::$translations = $translations;
    }

    public function __construct()
    {
        self::read_translations();
    }

    public static function init(): self
    {
        if (!static::$instance) {
            static::$instance = new Translation();
        }

        return static::$instance;
    }

    public static function t(string $ns, string $key): string|array
    {
        if (!isset(static::$translations[$ns])) {
            return $key;
        }

        $config = AppConfig::config('app');
        if (!isset(static::$translations[$ns][$config['lang']])) {
            return $key;
        }

        if (!isset(static::$translations[$ns][$config['lang']][$key])) {
            return $key;
        }

        return static::$translations[$ns][$config['lang']][$key];
    }
}
