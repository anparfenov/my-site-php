<?

namespace Mysite\Features\Home;

use Mysite\Lib\DbConnection;

class HomeModel
{
    // TODO: move to parent class or other class
    static function open_database_connection()
    {
        $connection = DbConnection::get()->connect();

        return $connection;
    }

    // TODO: move to parent class or other class
    static function close_database_connection(&$connection)
    {
        $connection = null;
    }

    static function data()
    {
        $connection = self::open_database_connection();

        $result = $connection->query('SELECT id, title FROM post');

        $posts = [];
        while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $posts[] = $row;
        }
        self::close_database_connection($connection);

        return $posts;
    }

    static function get_post_by_id($id)
    {
        $connection = self::open_database_connection();

        $query = 'SELECT created_at, title, content FROM post WHERE id=:id';
        $statement = $connection->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        self::close_database_connection($connection);

        return $row;
    }
}
