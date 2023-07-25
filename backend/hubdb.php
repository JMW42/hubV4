<?php

function get_connection_hubdb(){
    // tries to connect to given mysql database hos with given credentials, then returns the connection object (mysqli) if connection was successfull
    $SERVERNAME = "orangepi5";
    $USERNAME = "hubdb";
    $PASSWORD = "default";
    $DBNAME = "hub";

    $conn = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}


function get_userdata_by_name($conn, $name){
    // tries to fetch the data of a given user by its name
    $sql = 'SELECT * FROM account WHERE NAME="'.$name.'";';
    $res = $conn->query($sql);

    return $res->fetch_assoc();
}


function check_user_credentials($conn, $name, $pwd){
    // checks if a useraccount with given credentials exist and returns the corresponding account id if yes, of no it returns null
    $sql = 'SELECT ID FROM account WHERE NAME="'.$name.'" AND PASSWORD="'.$pwd.'";';
    $res = $conn->query($sql);
    $data = $res->fetch_assoc();

    if ($data && (count($data) == 1)){

        return $data["ID"];
    }

    return null;
}


if (!function_exists('mysql_escape_string')) {
    /**
     * mysql_escape_string — Escapes a string for use in a mysql_query
     *
     * @link https://dev.mysql.com/doc/refman/8.0/en/string-literals.html#character-escape-sequences
     *
     * @param string $unescaped_string
     * @return string
     * @deprecated
     */
    function mysql_escape_string(string $unescaped_string): string
    {
        $replacementMap = [
            "\0" => "\\0",
            "\n" => "\\n",
            "\r" => "\\r",
            "\t" => "\\t",
            chr(26) => "\\Z",
            chr(8) => "\\b",
            '"' => '\"',
            "'" => "\'",
            '_' => "\_",
            "%" => "\%",
            '\\' => '\\\\'
        ];

        return \strtr($unescaped_string, $replacementMap);
    }

}

?>