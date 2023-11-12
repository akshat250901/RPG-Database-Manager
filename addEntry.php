<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/style.css" />
        <style><?php include 'css/style.css'; ?></style>
        <title>Generic RPG Database: Add Entry</title>
    </head>

    <body>
        <div id="addComponent" class="select">
            <form>
                <label for="addComponents">Component</label>
                <select id="addComponents" name="addComponents">
                    <option value="PlayableCharacter">PlayableCharacter</option>
                    <option value="Equipment">Equipment</option>
                    <option value="Quest">Quest</option>
                    <option value="NPC">NPC</option>
                    <option value="Village">Village</option>
                    <option value="Monster">Monster</option>
                    <option value="Dungeon">Dungeon</option>
                  </select>
              </form>
        </div>
        <div>
            <h2>Reset</h2>
            <p>If you wish to reset the tables press on the reset button</p>

            <form method="POST" action="addEntry.php" class="attributes">
                <input type="hidden" id="resetTablesRequest" name="resetTablesRequest">
                <p><input type="submit" value="Reset" name="reset"></p>
            </form>
        </div>

        <div>
            <h2>Populate Tables</h2>
            <p>If you wish to populate the tables press on the populate button</p>

            <form method="POST" action="addEntry.php" class="attributes">
                <input type="hidden" id="populateTablesRequest" name="populateTablesRequest">
                <p><input type="submit" value="Populate" name="populateSubmit"></p>
            </form>
        </div>

        <div id="addAttributes">
            <form class="attributes activeTable" id="pcAdd">
                <fieldset>
                    <label for="username">username</label>
                    <input type="text" name="username" id="addUsername"><br>
                    <label for="class">class</label>
                    <input type="text" name="class" id="addClass"><br>
                    <label for="charLevel">level</label>
                    <input type="text" name="charLevel" id="addCharLevel"><br>
                    <label for="health">health</label>
                    <input type="text" name="health" id="addHealth"><br>
                    <label for="energy">energy</label>
                    <input type="text" name="energy" id="addEnergy"><br>
                    <label for="attack">attack</label>
                    <input type="text" name="attack" id="addAttack"><br>
                    <label for="defense">defense</label>
                    <input type="text" name="defense" id="addDefense"><br>
                    <label for="speed">speed</label>
                    <input type="text" name="speed" id="addSpeed"><br>
                    <label for="pet">pet</label>
                    <input type="text" name="pet" id="addPet"><br>
                    <input type="submit" value="add entry">
                </fieldset>
            </form>
            <!-- uses EquipmentName x EquipmentUser x EquipmentStatBoost x EquipmentType table -->
            <form class="attributes" id="equipmentAdd">
                <fieldset>
                    <label for="equipName">name</label>
                    <input type="text" name="equipName" id="addEquipName"><br>
                    <label for="equipType">type</label>
                    <input type="text" name="equipType" id="addEquipType"><br>
                    <label for="rarity">rarity</label>
                    <input type="text" name="rarity" id="addRarity"><br>
                    <label for="affectedStat">affectedStat</label>
                    <input type="text" name="affectedStat" id="addAffectedStat"><br>
                    <label for="statBoost">statBoost</label>
                    <input type="text" name="statBoost" id="addStatBoost"><br>
                    <label for="usedBy">usedBy</label>
                    <input type="text" name="usedBy" id="addUsedBy"><br>
                    <input type="submit" value="add entry">
                </fieldset>
            </form>
            <form class="attributes" id="questAdd">
                <fieldset>
                    <label for="questTitle">title</label>
                    <input type="text" name="questTitle" id="addQuestTitle"><br>
                    <label for="difficulty">difficulty</label>
                    <input type="text" name="difficulty" id="addDifficulty"><br>
                    <label for="reward">reward</label>
                    <input type="text" name="reward" id="reward"><br>
                    <label for="questLength">length</label>
                    <input type="text" name="questLength" id="addQuestLength"><br>
                    <label for="questMinLevel">minLevel</label>
                    <input type="text" name="questMinLevel" id="addQuestMinLevel"><br>
                    <label for="startNPC">startNPC</label>
                    <input type="text" name="startNPC" id="addStartNPC"><br>
                    <input type="submit" value="add entry">
                </fieldset>
            </form>
            <form class="attributes" id="npcAdd">
                <fieldset>
                    <label for="npcName">name</label>
                    <input type="text" name="npcName" id="addNpcName"><br>
                    <label for="npcTitle">title</label>
                    <input type="text" name="npcTitle" id="addNpcTitle"><br>
                    <label for="npcVillage">village</label>
                    <input type="text" name="npcVillage" id="addNpcVillage"><br>
                    <input type="submit" value="add entry">
                </fieldset>
            </form>
            <h2>Village</h2>
            <form method="POST" action="addEntry.php" class="attributes" id="villageAdd">
                <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
                <fieldset>
                    <label for="villageName">name</label>
                    <input type="text" name="villageName" id="addVillageName"><br>
                    <label for="region">region</label>
                    <input type="text" name="region" id="addRegion"><br>
                    <label for="population">population</label>
                    <input type="text" name="population" id="addPopulation"><br>
                    <label for="villageMinLevel">minLevel</label>
                    <input type="text" name="villageMinLevel" id="addVillageMinLevel"><br>
                    <input type="submit" value="add entry" name=insertSubmit>
                </fieldset>
            </form>
            <form method="GET" action="addEntry.php" class="attributes"> <!--refresh page when submitted-->
            <input type="hidden" id="countTupleRequest" name="countTupleRequest">
            <input type="submit" value = "Count Tuples" name="countTuples">
        </form>
            <form class="attributes" id="monsterAdd">
                <fieldset>
                    <label for="monsName">name</label>
                    <input type="text" name="monsName" id="addMonsName"><br>
                    <label for="monsType">type</label>
                    <input type="text" name="monsType" id="addMonsType"><br>
                    <label for="monsLevel">level</label>
                    <input type="text" name="monsLevel" id="addMonsLevel"><br>
                    <label for="monsHealth">health</label>
                    <input type="text" name="monsHealth" id="addMonsHealth"><br>
                    <label for="monsAttack">attack</label>
                    <input type="text" name="monsAttack" id="addMonsAttack"><br>
                    <label for="monsDefense">defense</label>
                    <input type="text" name="monsDefense" id="addMonsDefense"><br>
                    <label for="defends">defends</label>
                    <input type="text" name="defends" id="addDefends"><br>
                    <input type="submit" value="add entry">
                </fieldset>
            </form>
            <!-- based on DungeonName x DungeonMinLevelToDifficulty x DungeonRegion table -->
            <form class="attributes" id="dungeonAdd">
                <fieldset>
                    <label for="dungName">name</label>
                    <input type="text" name="dungName" id="addDungName"><br>
                    <label for="dungDifficulty">difficulty</label>
                    <input type="text" name="dungDifficulty" id="addDungDifficulty"><br>
                    <label for="dungMinLevel">minLevel</label>
                    <input type="text" name="dungMinLevel" id="addDungMinLevel"><br>
                    <label for="dungRegion">region</label>
                    <input type="text" name="dungRegion" id="addDungRegion"><br>
                    <label for="charLevel">boss</label>
                    <input type="text" name="boss" id="addBoss"><br>
                    <input type="submit" value="add entry">
                </fieldset>
            </form>
        </div>

        <a href="index.html" class="backButton">back</a>


        <?php
		//this tells the system that it's no longer just parsing html; it's now parsing PHP

        echo '<link rel="stylesheet" type="text/css" href="css/style.css">';

        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr);
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

			return $statement;
		}

        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
		In this case you don't need to create the statement several times. Bound variables cause a statement to only be
		parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection.
		See the sample code below for how this function is used */

			global $db_conn, $success;
			$statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
				}

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

        function printResult($result) { //prints results from a select statement
            echo "<br>Retrieved data from table Village:<br>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["NAME"] . "</td></tr>"; //or just use "echo $row[0]"
            }

            echo "</table>";
        }

        function connectToDB() {
            global $db_conn;

            // Your username is ora_(CWL_ID) and the password is a(student number). For example,
			// ora_platypus is the username and a12345678 is the password.
            $db_conn = OCILogon("ora_yilian27", "a38891495", "dbhost.students.cs.ubc.ca:1522/stu");
            
            if ($db_conn) {
                debugAlertMessage("Database is Connected");
                return true;
            } else {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            OCILogoff($db_conn);
        }

        function handleUpdateRequest() {
            global $db_conn;

            $old_name = $_POST['oldName'];
            $new_name = $_POST['newName'];

            // you need the wrap the old name and new name values with single quotations
            executePlainSQL("UPDATE Village SET name='" . $new_name . "' WHERE name='" . $old_name . "'");
            OCICommit($db_conn);
        }

        function handleResetRequest() {
            global $db_conn;
            // Drop old data
            $clear = file_get_contents('clear.sql');
            $sqlRows=explode(";",$clear);
            $lenClear = count($sqlRows);
            for ($x = 0; $x < $lenClear; $x++) {
                executePlainSQL($sqlRows[$x]);
              }
            //run create SQL file
            $myfile = file_get_contents('create.sql');
            $sqlRows=explode(";",$myfile);
            $len = count($sqlRows);
            for ($x = 0; $x < $len; $x++) {
                executePlainSQL($sqlRows[$x]);
              }          
            OCICommit($db_conn);

        }

        function handleInsertRequest() {
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":bind1" => $_POST['villageName'],
                ":bind2" => $_POST['region'],
                ":bind3" => $_POST['population'],
                ":bind4" => $_POST['villageMinLevel']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("insert into Village values (:bind1, :bind2, :bind3, :bind4)", $alltuples);
            OCICommit($db_conn);
        }

        function handleCountRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT Count(*) FROM Village");

            if (($row = oci_fetch_row($result)) != false) {
                echo "<br> The number of tuples in Village: " . $row[0] . "<br>";
            }
        }

        function handlePopulateRequest() {
            global $db_conn;
            //run insert SQL file
            $insertFile = file_get_contents('insert.sql');
            $sqlRows=explode(";\n",$insertFile);
            $len = count($sqlRows);
            for ($x = 0; $x < $len; $x++) {
                executePlainSQL($sqlRows[$x]);
              }
            OCICommit($db_conn);
        }

        // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('resetTablesRequest', $_POST)) {
                    handleResetRequest();
                } else if (array_key_exists('updateQueryRequest', $_POST)) {
                    handleUpdateRequest();
                } else if (array_key_exists('insertQueryRequest', $_POST)) {
                    handleInsertRequest();
                } else if (array_key_exists('populateTablesRequest', $_POST)) {
                    handlePopulateRequest();
                }

                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('countTuples', $_GET)) {
                    handleCountRequest();
                }

                disconnectFromDB();
            }
        }

		if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit']) || isset($_POST['populateSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_GET['countTupleRequest'])) {
            handleGETRequest();
        }
		?>
    </body>
</html>