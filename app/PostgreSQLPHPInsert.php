<?php

/**
     * insert a new row into the coaches table
     * @param type $Manager_ID
     * @param type $First_Name
     * @param type $Last_Name
     * @param type $Position
     * @param type $Department
     * @param type $Authority
     * @return the Employee_ID of the inserted row
     */
    public function insertCoach($Manager_ID, $First_Name, $Last_Name, $Position, $Department, $Authority) {
        // prepare statement for insert
        $sql = 'INSERT INTO Coaches(Manager_ID, First_Name, Last_Name, Position, Department, Authority) VALUES(:Manager_ID, :First_Name, :Last_Name, :Position, :Department, :Authority)';
        $stmt = $this->pdo->prepare($sql);
        
        // pass values to the statement
        $stmt->bindValue(':Manager_ID', $Manager_ID);
        $stmt->bindValue(':First_Name', $First_Name);
        $stmt->bindValue(':Last_Name', $Last_Name);
        $stmt->bindValue(':Position', $Position);
        $stmt->bindValue(':Department', $Department);
        $stmt->bindValue(':Authority', $Authority);

        // execute the insert statement
        $stmt->execute();
        
        // return generated id
        return $this->pdo->lastInsertId('coaches_id_seq');
    }
