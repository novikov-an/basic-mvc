<?php

/**copyright**/
class QueryBuilder extends
    Connection
{
    protected $pdo;

    /**
     * QueryBuilder constructor.
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Select All from table.
     *
     * @param string $table - From what table will data be selected
     *
     * @return array|object - Result of the query selection
     */
    public function SelectAll($table)
    {
        $statement = $this->pdo->prepare("select * from `{$table}`");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /*
     *
     */
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into `%s` (%s) values (%s)',
            $table,
            implode(',', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (Exception $e) {
            die('Whoops, something went wrong');
        }

    }
}