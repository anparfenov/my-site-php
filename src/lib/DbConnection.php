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
        $params = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/src/configuration/database.ini");
        if ($params === false) {
            throw new \Exception("Error reading database configuration file");
        }

        $connection_string = sprintf(
            "pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
            $params['host'],
            $params['port'],
            $params['database'],
            $params['user'],
            $params['password']
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
