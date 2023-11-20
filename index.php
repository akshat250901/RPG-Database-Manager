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
            <p><input type="submit" value="Reset Database" name="reset" class="buttons"></p>
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
                <input type="submit" name="selectComponent" value="Select Component" class="buttons">
            </form>
        </div>

        <div id="selectAttributes">
            <h3>Filters</h3>
            <form method="post" action="index.php" class="attributes" 
                <?php 
                    if ((array_key_exists('component', $_POST) && $_POST['component'] === 'PlayableCharacter') ||
                        (array_key_exists('attribute', $_POST) && $_POST['attribute'][0] === 'PlayableCharacter')) 
                    echo 'id="active"'; ?>>
                <fieldset>
                    <input type="hidden" name="attribute[]" value="PlayableCharacter">
                    <input type="checkbox" name="attribute[]" value="username">
                    <label for="username">username</label>
                    <input type="checkbox" name="attribute[]" value="class">
                    <label for="class">class</label>
                    <input type="checkbox" name="attribute[]" value="charLevel">
                    <label for="charLevel">level</label>
                    <input type="checkbox" name="attribute[]" value="health">
                    <label for="health">health</label>
                    <input type="checkbox" name="attribute[]" value="energy">
                    <label for="energy">energy</label>
                    <input type="checkbox" name="attribute[]" value="attack">
                    <label for="attack">attack</label>
                    <input type="checkbox" name="attribute[]" value="defense">
                    <label for="defense">defense</label>
                    <input type="checkbox" name="attribute[]" value="speed">
                    <label for="speed">speed</label>
                    <input type="checkbox" name="attribute[]" value="pet">
                    <label for="pet">pet</label>
                    <input type="submit" name="setFilters" value="Set Filters">
                </fieldset>
            </form>
            <!-- uses EquipmentName x EquipmentUser x EquipmentStatBoost x EquipmentType table -->
            <form method="post" action="index.php" class="attributes" 
                <?php 
                    if ((array_key_exists('component', $_POST) && $_POST['component'] === 'Equipment') ||
                        (array_key_exists('attribute', $_POST) && $_POST['attribute'][0] === 'Equipment')) 
                    echo 'id="active"'; ?>>
                <fieldset>
                    <input type="hidden" name="attribute[]" value="Equipment">
                    <input type="checkbox" name="attribute[]" value="name">
                    <label for="name">name</label>
                    <input type="checkbox" name="attribute[]" value="rarity">
                    <label for="rarity">rarity</label>
                    <input type="checkbox" name="attribute[]" value="type">
                    <label for="type">type</label>
                    <input type="checkbox" name="attribute[]" value="affectedStat">
                    <label for="affectedStat">affectedStat</label>
                    <input type="checkbox" name="attribute[]" value="statBoost">
                    <label for="statBoost">statBoost</label>
                    <input type="checkbox" name="attribute[]" value="usedBy">
                    <label for="usedBy">usedBy</label>
                    <input type="submit" name="setFilters" value="Set Filters">
                </fieldset>
            </form>
            <form method="post" action="index.php" class="attributes" 
                <?php 
                    if ((array_key_exists('component', $_POST) && $_POST['component'] === 'Quest') ||
                        (array_key_exists('attribute', $_POST) && $_POST['attribute'][0] === 'Quest')) 
                    echo 'id="active"'; ?>>
                <fieldset>
                    <input type="hidden" name="attribute[]" value="Quest">
                    <input type="checkbox" name="attribute[]" value="title">
                    <label for="title">title</label>
                    <input type="checkbox" name="attribute[]" value="difficulty">
                    <label for="difficulty">difficulty</label>
                    <input type="checkbox" name="attribute[]" value="reward">
                    <label for="reward">reward</label>
                    <input type="checkbox" name="attribute[]" value="length">
                    <label for="length">length</label>
                    <input type="checkbox" name="attribute[]" value="minLevel">
                    <label for="minLevel">minLevel</label>
                    <input type="checkbox" name="attribute[]" value="startNPC">
                    <label for="startNPC">startNPC</label>
                    <input type="submit" name="setFilters" value="Set Filters">
                </fieldset>
            </form>
            <form method="post" action="index.php" class="attributes" 
                <?php 
                    if ((array_key_exists('component', $_POST) && $_POST['component'] === 'NPC') ||
                        (array_key_exists('attribute', $_POST) && $_POST['attribute'][0] === 'NPC'))
                    echo 'id="active"'; ?>>
                <fieldset>
                    <input type="hidden" name="attribute[]" value="NPC">
                    <input type="checkbox" name="attribute[]" value="name">
                    <label for="name">name</label>
                    <input type="checkbox" name="attribute[]" value="title">
                    <label for="title">title</label>
                    <input type="checkbox" name="attribute[]" value="village">
                    <label for="village">village</label>
                    <input type="submit" name="setFilters" value="Set Filters">
                </fieldset>
            </form>
            <form method="post" action="index.php" class="attributes" 
                <?php 
                    if ((array_key_exists('component', $_POST) && $_POST['component'] === 'Village') ||
                        (array_key_exists('attribute', $_POST) && $_POST['attribute'][0] === 'Village')) 
                    echo 'id="active"'; ?>>
                <fieldset>
                    <input type="hidden" name="attribute[]" value="Village">
                    <input type="checkbox" name="attribute[]" value="name" id="name">
                    <label for="name">name</label>
                    <input type="checkbox" name="attribute[]" value="region" id="region">
                    <label for="region">region</label>
                    <input type="checkbox" name="attribute[]" value="population" id="population">
                    <label for="population">population</label>
                    <input type="checkbox" name="attribute[]" value="minLevel" id="minLevel">
                    <label for="minLevel">minLevel</label>
                    <input type="submit" name="setFilters" value="Set Filters">
                </fieldset>
            </form>
            <form method="post" action="index.php" class="attributes" 
                <?php 
                    if ((array_key_exists('component', $_POST) && $_POST['component'] === 'Monster') ||
                        (array_key_exists('attribute', $_POST) && $_POST['attribute'][0] === 'Monster'))
                    echo 'id="active"'; ?>>
                <fieldset>
                    <input type="hidden" name="attribute[]" value="Monster">
                    <input type="checkbox" name="attribute[]" value="name">
                    <label for="name">name</label>
                    <input type="checkbox" name="attribute[]" value="type">
                    <label for="type">type</label>
                    <input type="checkbox" name="attribute[]" value="monsLevel">
                    <label for="monsLevel">level</label>
                    <input type="checkbox" name="attribute[]" value="health">
                    <label for="health">health</label>
                    <input type="checkbox" name="attribute[]" value="attack">
                    <label for="attack">attack</label>
                    <input type="checkbox" name="attribute[]" value="defense">
                    <label for="defense">defense</label>
                    <input type="checkbox" name="attribute[]" value="defends">
                    <label for="defends">defends</label>
                    <input type="submit" name="setFilters" value="Set Filters">
                </fieldset>
            </form>
            <!-- uses DungeonName x DungeonMinLevelToDifficulty x DungeonRegion table -->
            <form method="post" action="index.php" class="attributes" 
                <?php 
                    if ((array_key_exists('component', $_POST) && $_POST['component'] === 'Dungeon') ||
                        (array_key_exists('attribute', $_POST) && $_POST['attribute'][0] === 'Dungeon'))
                    echo 'id="active"'; ?>>
                <fieldset>
                    <input type="hidden" name="attribute[]" value="Dungeon">
                    <input type="checkbox" name="attribute[]" value="name">
                    <label for="name">name</label>
                    <input type="checkbox" name="attribute[]" value="difficulty">
                    <label for="difficulty">difficulty</label>
                    <input type="checkbox" name="attribute[]" value="region">
                    <label for="region">region</label>
                    <input type="checkbox" name="attribute[]" value="minLevel">
                    <label for="minLevel">minLevel</label>
                    <input type="checkbox" name="attribute[]" value="boss">
                    <label for="boss">boss</label>
                    <input type="submit" name="setFilters" value="Set Filters">
                </fieldset>
            </form>
        </div>

        <!-- Tuples are shown here as individual elements -->
        <!-- list all attributes sequentially in order shown in attributes, then show edit and delete buttons -->
        <div id="tuplesTable"></div>

        <a href="addEntry.php" id="addButton" class="buttons">add entry</a>

        <?php
		// this tells the system that it's no longer just parsing html; it's now parsing PHP

        echo '<link rel="stylesheet" type="text/css" href="css/style.css">';

        $success = True; // keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())
        
        function createTuplesTable($component, $result) {
            echo "<div id=\"table\">";
            echo "<h3>" . $component . "</h3>";
            while ($row = oci_fetch_array($result, OCI_ASSOC + OCI_RETURN_NULLS)) {
                echo "<div class=\"tuple\">";
                $curr = "";
                $i = 0;
                foreach($row as $key => $value) {
                    if (is_null($value)) continue;
                    if ($i === 0) {
                        $curr .= $key . ": " . $value; 
                        $i++;
                    } else {
                        $curr .= ", " . $key . ": " . $value; 
                    }
                }
                echo "<p>" . $curr . "</p>";
                echo "</div>";
            }
            echo "</div>";
            echo "<script type=\"text/JavaScript\">document.getElementById('tuplesTable').appendChild(document.getElementById('table'));</script>";
        }

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
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
            $db_conn = oci_connect("ora_andyli02", "a65134645", "dbhost.students.cs.ubc.ca:1522/stu");
            
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

        function handleGetComponent($component) {
            if ($component === 'Equipment') {
                // uses EquipmentName x EquipmentUser x EquipmentStatBoost x EquipmentType
                $result = executePlainSQL("SELECT n.name, n.rarity, n.type, t.affectedStat, s.statBoost, u.usedBy " . 
                    "FROM EquipmentName n, EquipmentUser u, EquipmentStatBoost s, EquipmentType t " .
                    "WHERE n.name = u.name AND n.name = s.name AND n.type = t.type");
            } else if ($component === 'Dungeon') {
                // uses DungeonName x DungeonMinLevelToDifficulty x DungeonRegion
                $result = executePlainSQL("SELECT n.name, n.difficulty, r.region, m.minLevel, n.boss " . 
                    "FROM DungeonName n, DungeonMinLevelToDifficulty l, DungeonMinLevel m, DungeonRegion r " .
                    "WHERE n.name = r.name AND n.name = m.name AND m.minLevel = l.minLevel");
            } else {
                $result = executePlainSQL("SELECT * FROM " . $component);
            }

            createTuplesTable($component, $result);
        }

        function handleSetFilters() {
            $attributes = $_POST['attribute'];
            $size = count($attributes);
            $component = $attributes[0];
            // nothing selected, show all attributes
            if ($size === 1) {
                handleGetComponent($component);
                return;
            }
            
            $filter = "";
            if ($component === 'Equipment') {
                for ($i = 1; $i < $size; $i++) {
                    if ($i > 1) $filter .= ", ";
                    switch ($attributes[$i]) {
                        case "name":
                            $filter .= "n.name";
                            break;
                        case "rarity":
                            $filter .= "n.rarity";
                            break;
                        case "type":
                            $filter .= "n.type";
                            break;
                        case "affectedStat":
                            $filter .= "t.affectedStat";
                            break;
                        case "statBoost":
                            $filter .= "s.statBoost";
                            break;
                        case "usedBy": // CHECK SQLPLUS WITH BELOW QUERY TO SEE WHAT IT ACTUALLY RETURNS
                            $filter .= "u.usedBy";
                            break;
                        default:
                            break;
                    }
                }
                // uses EquipmentName x EquipmentUser x EquipmentStatBoost x EquipmentType
                $result = executePlainSQL("SELECT " . $filter . " " .
                    "FROM EquipmentName n, EquipmentUser u, EquipmentStatBoost s, EquipmentType t " .
                    "WHERE n.name = u.name AND n.name = s.name AND n.type = t.type");
            } else if ($component === 'Dungeon') {
                for ($i = 1; $i < $size; $i++) {
                    if ($i > 1) $filter .= ", ";
                    switch ($attributes[$i]) {
                        case "name":
                            $filter .= "n.name";
                            break;
                        case "difficulty":
                            $filter .= "n.difficulty";
                            break;
                        case "region":
                            $filter .= "r.region";
                            break;
                        case "minLevel":
                            $filter .= "m.minLevel";
                            break;
                        case "boss":
                            $filter .= "n.boss";
                            break;
                        default:
                            break;
                    }
                }
                // uses DungeonName x DungeonMinLevelToDifficulty x DungeonRegion
                $result = executePlainSQL("SELECT " . $filter . " " .
                    "FROM DungeonName n, DungeonMinLevelToDifficulty l, DungeonMinLevel m, DungeonRegion r " .
                    "WHERE n.name = r.name AND n.name = m.name AND m.minLevel = l.minLevel");
            } else {
                $filter = $attributes[1];
                for ($i = 2; $i < $size; $i++) {
                    $filter .= ", " . $attributes[$i];
                }
                $result = executePlainSQL("SELECT " . $filter . " FROM " . $component);
            }

            createTuplesTable($component, $result);
        }

        // HANDLE ALL POST ROUTES
	    // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('component', $_POST)) {
                    handleGetComponent($_POST['component']);
                } else if (array_key_exists('resetTables', $_POST)) {
                    handleResetTables();
                } else if (array_key_exists('attribute', $_POST)) {
                    handleSetFilters();
                }

                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES
	    // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        // function handleGETRequest() {
        //     if (connectToDB()) {
        //         if (array_key_exists('countTuples', $_GET)) {
        //             handleCountRequest();
        //         }

        //         disconnectFromDB();
        //     }
        // }

		if (isset($_POST['resetTables'])|| isset($_POST['selectComponent']) || isset($_POST['setFilters'])) {
            handlePOSTRequest();
        } 
        // else if (isset($_GET['countTupleRequest'])) {
        //     handleGETRequest();
        // }
		?>
    </body>
</html>