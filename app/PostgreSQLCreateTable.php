<?php

namespace PostgreSQLTutorial;
/**
 * Create table in PostgreSQL from PHP demo
 */
class PostgreSQLCreateTable {

    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;

    /**
     * init the object with a \PDO object
     * @param type $pdo
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * create tables 
     */
    public function createTables() {
        $sqlList = ['CREATE TABLE IF NOT EXISTS Coaches (
                        Employee_ID serial primary key
                        , Manager_ID INT
                        , First_Name VARCHAR(50)
                        , Last_Name VARCHAR(50)
                        , Position VARCHAR(50)
                        , Department VARCHAR(50)
                        , Authority VARCHAR(50)
                        );',
            'CREATE TABLE IF NOT EXISTS Players (
                            file_data BYTEA NOT NULL,
                            First_Name VARCHAR(50) NOT NULL
                        ,   Last_Name VARCHAR(50) NOT NULL
                        ,   player_status VARCHAR(50) NOT NULL 
                        ,   Position VARCHAR(50) NOT NULL
                        ,   Department VARCHAR(50) NOT NULL
                        ,   player_number INT NOT NULL
                        ,   player_height numeric(3, 2) NOT NULL
                        ,   player_weight numeric(5, 2) NOT NULL
                        ,   age SMALLINT NOT NULL
                        ,   experience SMALLINT NOT NULL
                        ,   college VARCHAR (50) NOT NULL
                        ,   Employee_ID INT NOT NULL PRIMARY KEY
                        );'];

        // execute each sql statement to create new tables
        foreach ($sqlList as $sql) {
            $this->pdo->exec($sql);
        }
        
        return $this;
    }

    /**
     * return tables in the database
     */
    public function getTables() {
        $stmt = $this->pdo->query("SELECT table_name 
                                   FROM information_schema.tables 
                                   WHERE table_schema= 'public' 
                                        AND table_type='BASE TABLE'
                                   ORDER BY table_name");
        $tableList = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tableList[] = $row['table_name'];
        }

        return $tableList;
    }
}