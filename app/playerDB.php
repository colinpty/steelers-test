<?php

namespace PostgreSQLTutorial;
/**
 * Create table in PostgreSQL from PHP demo
 */
class playerdb {

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
     * Return all rows in the players table
     * @return array
     */
public function all() {
        $stmt = $this->pdo->query('SELECT file_data, first_name, last_name, player_status, positions, department, player_number, player_height, player_weight, age, experience, college, employee_id '
                . 'FROM players ');
        $players = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $players[] = [
                'file_data' => $row['file_data'],
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'player_status' => $row['player_status'],
                'positions' => $row['positions'],
                'department' => $row['department'],
                'player_number' => $row['player_number'],
                'player_height' => $row['player_height'],
                'player_weight' => $row['player_weight'],
                'age' => $row['age'],
                'experience' => $row['experience'],
                'college' => $row['college'],
                'employee_id' => $row['employee_id']
            ];
        }
        return $players;
  }


public function player_name_search($player_name) {

    $stmt = $this->pdo->query("SELECT * FROM search_players ('$player_name')");
    $players = [];
    while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        $players[] = [
            'file_data' => $row['file_data'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'player_status' => $row['player_status'],
            'positions' => $row['positions'],
            'department' => $row['department'],
            'player_number' => $row['player_number'],
            'player_height' => $row['player_height'],
            'player_weight' => $row['player_weight'],
            'age' => $row['age'],
            'experience' => $row['experience'],
            'college' => $row['college'],
            'employee_id' => $row['employee_id']
        ];
    }
    return $players;
}


public function player_team_select($teams) {

    $stmt = $this->pdo->query("SELECT * FROM find_department ('$teams')");
    $players = [];
    while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        $players[] = [
            'file_data' => $row['file_data'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'player_status' => $row['player_status'],
            'positions' => $row['positions'],
            'department' => $row['department'],
            'player_number' => $row['player_number'],
            'player_height' => $row['player_height'],
            'player_weight' => $row['player_weight'],
            'age' => $row['age'],
            'experience' => $row['experience'],
            'college' => $row['college'],
            'employee_id' => $row['employee_id']
        ];
    }
    return $players;
}


}


