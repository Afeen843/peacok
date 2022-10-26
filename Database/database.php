<?php

class database
{
    var $database;
    var $hostname;
    var $username;
    var $password;
    var $connection;


    function __construct($database='peakcok', $host='localhost', $username='root', $password='')
    {

        $this->database = $database;
        $this->username = $username;
        $this->hostname = $host;
        $this->password = $password;

    }

    public function createConncetion()
    {
        try {
            mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
            return $this->connection;
        } catch (Exception $e) {

            echo 'message ' . $e->getMessage();

        }

    }

    public function delete(string $table, int $entityId = null): bool
    {
        if ($this->tableExists($table)) {
            $sql = "delete from $table where entity_id=$entityId";
            if ($this->_connection->query($sql)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }




    /**
     * Insert query
     *
     * @param $table
     * @param array $params
     * @return bool
     */
    public function save($table, $params = array()): bool
    {

        if ($this->tableExists($table)) {
            $table_columns = implode(', ', array_keys($params));
            $table_value = implode("', '", $params);
            $sql = "INSERT INTO $table ($table_columns) VALUES ('$table_value')";

            if ($this->_connection->query($sql)) {
                return true;
            } else {

                return false;
            }

        } else {
            return false;
        }
    }

    public function tableExists($table)
    {
        $sql = "SHOW TABLES FROM $this->_databaseName LIKE '$table'";
        $tableInDb = $this->_connection->query($sql);
        if ($tableInDb) {
            if ($tableInDb->num_rows == 1) {
                return true;
            }
        } else {
            $this->result[] = " table does not exits in the database ";
            return false;
        }


    }

    public function update($table, $params = array(), int $id)
    {
        if ($this->tableExists($table)) {
            $args = array();
            foreach ($params as $key => $value) {
                $args[] = "$key = '$value'";
            }

            $sql = "UPDATE $table SET " . implode(', ', $args) . "WHERE entity_id=$id";
//            if ($where != null) {
//                $sql .= " WHERE $where";
//            }
            if ($this->_connection->query($sql)) {

                return true;
            } else {

                return false;
            }
        } else {
            return false;

        }


    }


    public function deleteold($table, $where = null)
    {
        if ($this->tableExists($table)) {
            $sql = "DELETE FROM $table";
            if ($where != null) {
                $sql .= " WHERE $where";
            }

            if ($this->_connection->query($sql)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public function select(string $table)
    {
        $sql = "SELECT * FROM $table";
        $result = $this->_connection->query($sql);
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function selectuser(string $table, int $entityId = null)
    {
        $sql = "SELECT * FROM $table where entity_id=$entityId";
        $result = $this->_connection->query($sql);
        if ($result) {

            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }

    }
}