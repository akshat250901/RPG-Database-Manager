<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/style.css" />
        <style><?php include 'css/style.css'; ?></style>
        <title>Generic RPG Database</title>
    </head>

    <body>
        <h1 id="GUIName">Generic RPG Database</h1>

        <h2>Reset</h2>
        <p>If you wish to reset the table press on the reset button. If this is the first time you're running this page, you MUST use reset</p>

        <form method="POST" action="index.php">
            <input type="hidden" id="resetTables" name="resetTables">
            <p><input type="submit" value="Reset Database" name="reset"></p>
        </form>

        <div id="selectComponent" class="select">
            <form method="post" action="index.php">
                <label for="component">Component</label>
                <select id="component" name="component">
                  <option value="PlayableCharacter">PlayableCharacter</option>
                  <option value="Equipment">Equipment</option>
                  <option value="Quest">Quest</option>
                  <option value="NPC">NPC</option>
                  <option value="Village">Village</option>
                  <option value="Monster">Monster</option>
                  <option value="Dungeon">Dungeon</option>
                </select>
                <input type="submit" name="selectComponent" value="Select">
            </form>
        </div>

        <div id="selectAttributes">
            <form class="attributes activeTable" id="pcAttributes">
                <fieldset>
                    <input type="checkbox" name="attribute" value="username" id="username">
                    <label for="username">username</label>
                    <input type="checkbox" name="attribute" value="class" id="class">
                    <label for="class">class</label>
                    <input type="checkbox" name="attribute" value="charLevel" id="charLevel">
                    <label for="charLevel">level</label>
                    <input type="checkbox" name="attribute" value="health" id="health">
                    <label for="health">health</label>
                    <input type="checkbox" name="attribute" value="energy" id="energy">
                    <label for="energy">energy</label>
                    <input type="checkbox" name="attribute" value="attack" id="attack">
                    <label for="attack">attack</label>
                    <input type="checkbox" name="attribute" value="defense" id="defense">
                    <label for="defense">defense</label>
                    <input type="checkbox" name="attribute" value="speed" id="speed">
                    <label for="speed">speed</label>
                    <input type="checkbox" name="attribute" value="pet" id="pet">
                    <label for="pet">pet</label>
                </fieldset>
            </form>
            <!-- uses EquipmentName x EquipmentUser x EquipmentStatBoost x EquipmentType table -->
            <form class="attributes" id="equipmentAttributes">
                <fieldset>
                    <input type="checkbox" name="attribute" value="equipName" id="equipName">
                    <label for="equipName">name</label>
                    <input type="checkbox" name="attribute" value="equipType" id="equipType">
                    <label for="equipType">type</label>
                    <input type="checkbox" name="attribute" value="rarity" id="rarity">
                    <label for="rarity">rarity</label>
                    <input type="checkbox" name="attribute" value="affectedStat" id="affectedStat">
                    <label for="affectedStat">affectedStat</label>
                    <input type="checkbox" name="attribute" value="statBoost" id="statBoost">
                    <label for="statBoost">statBoost</label>
                    <input type="checkbox" name="attribute" value="usedBy" id="usedBy">
                    <label for="usedBy">usedBy</label>
                </fieldset>
            </form>
            <form class="attributes" id="questAttributes">
                <fieldset>
                    <input type="checkbox" name="attribute" value="questTitle" id="questTitle">
                    <label for="questTitle">title</label>
                    <input type="checkbox" name="attribute" value="difficulty" id="difficulty">
                    <label for="difficulty">difficulty</label>
                    <input type="checkbox" name="attribute" value="reward" id="reward">
                    <label for="reward">reward</label>
                    <input type="checkbox" name="attribute" value="questLength" id="questLength">
                    <label for="questLength">length</label>
                    <input type="checkbox" name="attribute" value="questMinLevel" id="questMinLevel">
                    <label for="questMinLevel">minLevel</label>
                    <input type="checkbox" name="attribute" value="startNPC" id="startNPC">
                    <label for="startNPC">startNPC</label>
                </fieldset>
            </form>
            <form class="attributes" id="npcAttributes">
                <fieldset>
                    <input type="checkbox" name="attribute" value="npcName" id="npcName">
                    <label for="npcName">name</label>
                    <input type="checkbox" name="attribute" value="npcTitle" id="npcTitle">
                    <label for="npcTitle">title</label>
                    <input type="checkbox" name="attribute" value="npcVillage" id="npcVillage">
                    <label for="npcVillage">village</label>
                </fieldset>
            </form>
            <form class="attributes" id="villageAttributes">
                <fieldset>
                    <input type="checkbox" name="attribute" value="villageName" id="villageName">
                    <label for="villageName">name</label>
                    <input type="checkbox" name="attribute" value="region" id="region">
                    <label for="region">region</label>
                    <input type="checkbox" name="attribute" value="population" id="population">
                    <label for="population">population</label>
                    <input type="checkbox" name="attribute" value="villageMinLevel" id="villageMinLevel">
                    <label for="villageMinLevel">minLevel</label>
                </fieldset>
            </form>
            <form class="attributes" id="monsterAttributes">
                <fieldset>
                    <input type="checkbox" name="attribute" value="monsName" id="monsName">
                    <label for="monsName">name</label>
                    <input type="checkbox" name="attribute" value="monsType" id="monsType">
                    <label for="monsType">type</label>
                    <input type="checkbox" name="attribute" value="monsLevel" id="monsLevel">
                    <label for="monsLevel">level</label>
                    <input type="checkbox" name="attribute" value="monsHealth" id="monsHealth">
                    <label for="monsHealth">health</label>
                    <input type="checkbox" name="attribute" value="monsAttack" id="monsAttack">
                    <label for="monsAttack">attack</label>
                    <input type="checkbox" name="attribute" value="monsDefense" id="monsDefense">
                    <label for="monsDefense">defense</label>
                    <input type="checkbox" name="attribute" value="defends" id="defends">
                    <label for="defends">defends</label>
                </fieldset>
            </form>
            <!-- uses DungeonName x DungeonMinLevelToDifficulty x DungeonRegion table -->
            <form class="attributes" id="dungeonAttributes">
                <fieldset>
                    <input type="checkbox" name="attribute" value="dungName" id="dungName">
                    <label for="dungName">name</label>
                    <input type="checkbox" name="attribute" value="dungDifficulty" id="dungDifficulty">
                    <label for="dungDifficulty">difficulty</label>
                    <input type="checkbox" name="attribute" value="dungMinLevel" id="dungMinLevel">
                    <label for="dungMinLevel">minLevel</label>
                    <input type="checkbox" name="attribute" value="dungRegion" id="dungRegion">
                    <label for="dungRegion">region</label>
                    <input type="checkbox" name="attribute" value="boss" id="boss">
                    <label for="charLevel">boss</label>
                </fieldset>
            </form>
        </div>

        <!-- Tuples are shown here as individual elements have a delete and edit button -->
        <!-- TUPLE FORMAT -->
        <!-- list all attributes sequentially in order shown in attributes, then show edit and delete buttons -->
        <?php 
            function createTuplesTable($result) {
                echo "<div id=\"tuplesTable\">";
                foreach($result as $tuple) {
                    echo "<div class=\"tuple\">";
                    $curr = "";
                    $i = 0;
                    foreach($tuple as $key => $value) {
                        if ($i = 0) {
                            $curr .= "'" . $key . "': '" . $value . "'"; 
                        } else {
                            $curr .= ", '" . $key . "': '" . $value . "'"; 
                        }
                        $i++;
                    }
                    echo "<p>'" . $curr . "'</p>";
                    echo "</div>";
                }
                echo "</div>";
            }
        ?>
        

        <a href="addEntry.html" id="addButton" class="buttons">add entry</a>

        <?php
		// this tells the system that it's no longer just parsing html; it's now parsing PHP

        echo '<link rel="stylesheet" type="text/css" href="css/style.css">';

        $success = True; // keep track of errors so it redirects the page only if there are no errors
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

            $statement = oci_parse($db_conn, $cmdstr);
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For oci_parse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = oci_execute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For oci_execute errors pass the statementhandle
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
			$statement = oci_parse($db_conn, $cmdstr);

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
                    oci_bind_by_name($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
				}

                $r = oci_execute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For oci_execute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

        function printResult($result) { // prints results from a select statement
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
            $db_conn = oci_connect("ora_yilian27", "a38891495", "dbhost.students.cs.ubc.ca:1522/stu");
            
            if ($db_conn) {
                debugAlertMessage("Database is Connected");
                return true;
            } else {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For oci_connect errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function disconnectFromDB() {
            global $db_conn;
            debugAlertMessage("Disconnect from Database");
            oci_close($db_conn);
        }

        function handleResetTables() {
            global $db_conn;
            
            // drop old data
            $clear = file_get_contents('clear.sql');
            $sqlRows = explode(";",$clear);
            $lenClear = count($sqlRows);
            for ($x = 0; $x < $lenClear; $x++) {
                executePlainSQL($sqlRows[$x]);
            }

            // run setup SQL file
            $myfile = file_get_contents('setup.sql');
            $sqlRows=explode(";",$myfile);
            $len = count($sqlRows);
            for ($x = 0; $x < $len; $x++) {
                executePlainSQL($sqlRows[$x]);
            }
            
            oci_commit($db_conn);
        }

        function handleGetComponent() {
            $component = $_POST['component'];

            if ($component = 'Equipment') {
                // uses EquipmentName x EquipmentUser x EquipmentStatBoost x EquipmentType
                $result = executePlainSQL("SELECT n.name, n.rarity, n.type, t.affectedStat, s.statBoost, u.usedBy " . 
                    "FROM EquipmentName n, EquipmentUser u, EquipmentStatBoost s, EquipmentType t " .
                    "WHERE n.name = u.name AND n.name = s.name AND n.type = t.type");
            } else if ($component = 'Dungeon') {
                // uses DungeonName x DungeonMinLevelToDifficulty x DungeonRegion
                $result = executePlainSQL("SELECT n.name, n.difficulty, r.region, m.minLevel, n.boss " . 
                    "FROM DungeonName n, DungeonMinLevelToDifficulty l, DungeonMinLevel m, DungeonRegion r " .
                    "WHERE n.name = r.name AND n.name = m.name AND m.minLevel = l.minLevel");
            } else {
                $result = executePlainSQL("SELECT * FROM '" . $component . "'");
            }

            createTuplesTable($result);
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
            oci_commit($db_conn);
        }

        // HANDLE ALL POST ROUTES
	    // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('component', $_POST)) {
                    handleGetComponent();
                } else if (array_key_exists('resetTables', $_POST)) {
                    handleResetTables();
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

		if (isset($_POST['selectComponent'])) {
            handlePOSTRequest();
        } else if (isset($_GET['countTupleRequest'])) {
            handleGETRequest();
        }
		?>
    </body>
</html>