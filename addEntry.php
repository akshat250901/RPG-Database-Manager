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
                    <option value="Monster">Monster</option>
                    <option value="PlayableCharacter">PlayableCharacter</option>
                    <option value="Equipment">Equipment</option>
                    <option value="Quest">Quest</option>
                    <option value="NPC">NPC</option>
                    <option value="Village">Village</option>
                    <option value="Dungeon">Dungeon</option>
                  </select>
              </form>
        </div>
        <div>
            <h2>Setup</h2>
            <p>This button is for setting up the tables</p>
            <form method="POST" action="addEntry.php" >
                <input type="hidden" id="setupTablesRequest" name="setupTablesRequest">
                <p><input type="submit" value="Setup" name="setup" class="buttons"></p>
            </form>
        </div>



        <div id="addAttributes">
            <h2>Insert Values into Monster</h2>
            <form method="POST" action="addEntry.php" class="attribute" id="villageAttributes"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Name: <input type="text" name="monsName"> <br /><br />
            Type: <input type="text" name="monsType"> <br /><br />
            Level: <input type="text" name="monsLevel"> <br /><br />
            Health: <input type="text" name="monsHealth"> <br /><br />
            Attack: <input type="text" name="monsAttack"> <br /><br />
            Defense: <input type="text" name="monsDefense"> <br /><br />
            Defends: <input type="text" name="defends"> <br /><br />

            <input type="submit" value="Insert" name="insertSubmit"></p>
            </form>


        <h2>Count the Tuples in Monster</h2>
        <form method="GET" action="addEntry.php"> <!--refresh page when submitted-->
            <input type="hidden" id="countTupleRequest" name="countTupleRequest">
            <input type="submit" name="countTuples" class="buttons" value="Count"></p>
        </form>

        <!-- <a href="index.html" class="backButton">back</a>*/-->


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
                    echo "Sorry, an error occurred";
                    // echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    // $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    // echo htmlentities($e['message']);
                    // echo "<br>";
                    $success = False;
                } else {
                    echo "Success!";
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

        function handleSetupRequest() {
            global $db_conn;
            // Drop old data
            $clear = file_get_contents('clear.sql');
            $sqlRows=explode(";",$clear);
            $lenClear = count($sqlRows);
            for ($x = 0; $x < $lenClear; $x++) {
                executePlainSQL($sqlRows[$x]);
              }
            //run create SQL file
            $myfile = file_get_contents('setup.sql');
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
                ":bind1" => $_POST['monsName'],
                ":bind2" => $_POST['monsType'],
                ":bind3" => $_POST['monsLevel'],
                ":bind4" => $_POST['monsHealth'],
                ":bind5" => $_POST['monsAttack'],
                ":bind6" => $_POST['monsDefense'],
                ":bind7" => $_POST['defends']
            );

            $alltuples = array (
                $tuple
            );
            executeBoundSQL("insert into Monster values (:bind1, :bind2, :bind3, :bind4, :bind5, :bind6, :bind7)", $alltuples);
            OCICommit($db_conn);
        }

        function handleCountRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT Count(*) FROM Monster");

            if (($row = oci_fetch_row($result)) != false) {
                echo "<br> The number of tuples in Monster: " . $row[0] . "<br>";
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
                if (array_key_exists('setupTablesRequest', $_POST)) {
                    handleSetupRequest();
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

		if (isset($_POST['setup']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_GET['countTupleRequest'])) {
            handleGETRequest();
        }
		?>
    </body>
</html>