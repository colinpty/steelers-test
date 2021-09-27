<?php
require 'vendor/autoload.php';

use PostgreSQLTutorial\Connection as Connection;
use PostgreSQLTutorial\playerDB as playerDB;

try {
    // connect to the PostgreSQL database
    $pdo = Connection::get()->connect();
    // 
    $playerDB = new playerDB($pdo);
    // get all stocks data
    $players = $playerDB->all();



    if(isset($_POST['search_players']))
        {
        $player_name = $_POST['player_name'];

        $players = $playerDB->player_name_search($player_name);
        } 


    if(isset($_POST['submit_team']))
        {
        $teams = $_POST['teams'];

        $players = $playerDB->player_team_select($teams);
        } 




} catch (\PDOException $e) {
    echo $e->getMessage();
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>PostgreSQL PHP Querying Data Demo</title>
        <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
    </head>
    <body>

    <br>

            <h1>Players Roster</h1>

            <br>

<form method="post" action="index.php">
    <input type="text" name="player_name" placeholder="Enter Player Name">
    <input type="submit" value="Search" name="search_players"> <!-- assign a name for the button -->
</form>

<br>




<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Select:
  <input type="radio" name="teams" value="Full_Roster"> Full Roster
  <input type="radio" name="teams" value="All_Offense"> Offense
  <input type="radio" name="teams" value="All_Defense"> Defense
  <input type="radio" name="teams" value="All_Specials"> Specials
  <br>
  <input type="submit" name="submit_team" value="Submit">  
</form>




<br>



            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Status</th>
                        <th>Position</th>
                        <th>Team</th>
                        <th>Number</th>
                        <th>Height(cm)</th>
                        <th>Weight(kg)</th>
                        <th>Age</th>
                        <th>Experience(yrs)</th>
                        <th>College</th>
                        <th>ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($players as $player) : ?>
                        <tr>

                            <td> <img src="<?php echo $player['file_data']; ?>" width="100" height="100">    </td>
                        

                            <td><?php echo htmlspecialchars($player['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($player['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($player['player_status']) ?></td>
                            <td><?php echo htmlspecialchars($player['positions']); ?></td>
                            <td><?php echo htmlspecialchars($player['department']); ?></td>
                            <td><?php echo htmlspecialchars($player['player_number']) ?></td>
                            <td><?php echo htmlspecialchars($player['player_height']); ?></td>
                            <td><?php echo htmlspecialchars($player['player_weight']); ?></td>
                            <td><?php echo htmlspecialchars($player['age']) ?></td>
                            <td><?php echo htmlspecialchars($player['experience']); ?></td>
                            <td><?php echo htmlspecialchars($player['college']) ?></td>
                            <td><?php echo htmlspecialchars($player['employee_id']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

    </body>
</html>