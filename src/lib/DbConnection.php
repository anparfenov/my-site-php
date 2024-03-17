<?

namespace Mysite\Lib;

class DbConnection
{
    /**
     * Connection
     * @var type
     */
    private static $connection;

    /**
     * Connect to the database and return an instance of \PDO object
     * @return \PDO
     * @throws \Exception
     */
    public function connect()
    {
        $db_config = AppConfig::config('database');
        if ($db_config === false) {
            throw new \Exception("Error reading database configuration file");
        }

        $connection_string = sprintf(
            "pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
            $db_config['host'],
            $db_config['port'],
            $db_config['database'],
            $db_config['user'],
            $db_config['password']
        );

        $pdo = new \PDO($connection_string);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    /**
     * @return type
     */
    public static function get()
    {
        if (null === static::$connection) {
            static::$connection = new static();
        }

        return static::$connection;
    }
}
