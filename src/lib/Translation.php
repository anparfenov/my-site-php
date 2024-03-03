<?

namespace Mysite\Lib;

class Translation
{
    static $instance;
    const TRANSLATIONS_DIR = '/src/static/translations';
    static $translations = [];
    static $locale = 'ru';

    private static function read_translations()
    {
        $files = scandir(FileUtils::absDir(self::TRANSLATIONS_DIR));

        $translations = [];
        foreach ($files as $file) {
            if (!is_string($file) || $file === "." || $file === "..") {
                continue;
            }

            $file_path = FileUtils::absDir(self::TRANSLATIONS_DIR . "/" . $file);
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

        if (!isset(static::$translations[$ns][static::$locale])) {
            return $key;
        }

        if (!isset(static::$translations[$ns][static::$locale][$key])) {
            return $key;
        }

        return static::$translations[$ns][static::$locale][$key];
    }
}
