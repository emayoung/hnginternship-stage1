<!DOCTYPE html>
<html>
<body>

<?php

require 'configure.php';

$user_name = "root";
$password = "";
$database = "addressbook";
$server = "127.0.0.1";

$db_handle = mysqli_connect($server, $user_name, $password);

print "Server found" . "<BR>";

$database = "addressbook";

$db_found = mysqli_select_db( $db_handle, $database );

if ($db_found) {

    $SQL = "SELECT * FROM tbl_address_book";
$result = mysqli_query($db_handle, $SQL);

echo '<table><tr><th>S/N</th><th>First Name</th><th>Surname</th</tr><th>Slack Handle</th</tr><th>Github</th</tr>';

while ( $db_field = mysqli_fetch_assoc($result) ) {
    
    echo '<tr><td>' . $db_field['id'] . '</td>'; 
    echo '<td>' . $db_field['first_name'] . '</td>'; 
    echo '<td>' . $db_field['surname'] . '</td>'; 
    echo '<td>' . $db_field['slack_handle'] . '</td>'; 
    echo '<td>' . $db_field['github_username'] . '</td></tr>'; 

    
    }
    echo '</table>';

mysqli_close($db_handle);

}

else {

print "Database not found";

}

?>

</body>
</html>