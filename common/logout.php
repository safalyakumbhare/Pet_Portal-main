<?php
session_start();
session_unset();
session_destroy();

header("Location: /index.php"); // Redirect to login page after logout

?>

<a href="/index.php"></a>