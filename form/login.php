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

        foreach ($_POST as $key => $value){
            #echo ("<li>" . $key .": ". $value. "</li><br>");
        }


        # check for POST:action and set if not exist default value
        $id = isset($_POST['action']) ? $_POST['action'] : null;
        $msg = "";

        # perform action depending on POST:action
        switch ($_POST['action']) {
            case 'login':
                # login action: login user
                $msg = "Login as: " . $_POST['uname'];

                # username: $_POST['uname']
                # password: $_POST['upawd']

                break;
            
            default:
                # default: no propper action is know, so nothing is done
                $msg = "<b>Can not perform requested action !</b>";
                break;
        }

        # write status message to form output
        echo("<p>".$msg."</p>");
    ?>

</form>
