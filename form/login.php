<form action="" method="post">

    <label for="uname">Username:</label><br>
    <input type="text" name="uname" id=""><br>
    
    <br>

    <label for="upawd">Password:</label><br>
    <input type="password" name="upawd" id=""><br>

    <br>

    <button type="submit" name="action" value="login">Submit Credentials</button>
    <!-- <button type="submit" name="action" value="login2">Submit Credentials 2</button> -->

    <?php

        $CONFIG = parse_ini_file("../backend/config.ini");
        

        # check for POST:action and set if not exist default value
        $action = isset($_POST['action']) ? $_POST['action'] : '';
        $msg = "";

        # perform action depending on POST:action
        switch ($action) {
            case 'login':
                # login action: login user
                require("../backend/hubdb.php");
                require("../backend/hubuser.php");

                //mysql_real_escape_string();
                $username = mysql_escape_string($_POST['uname']);
                $password = mysql_escape_string($_POST['upawd']);



                $conn = get_connection_hubdb();
                $id = check_user_credentials($conn, $username, $password);

                // check if login is good
                if ($id){
                    // login
                    set_hubuser_session(get_userdata_by_name($conn, $username));
                    $msg = "Loged in as: " . $_POST['uname'] . '<br><a href="'.$CONFIG["MAIN_PAGE"].'">Go to Home</a>';           
                    
                }else{
                    $msg = "Wrong name or password";
                }

                break;
            
            case 'failure':
                # default: no propper action is know, so nothing is done
                $msg = "<b>Can not perform requested action !</b>";
                break;

            default:
                # default: no propper action is know, so nothing is done
                $msg = "<b>Type in your credentials</b>";
                break;
        }

        # write status message to form output
        echo("<p>".$msg."</p><br><hr>");


        
    ?>

</form>
