
<?php 
/*$localhost = "localhost"; 
$dbusername = "e12103751"; 
$dbpassword = "se7en";  
$dbname = "SAE_s3_Internkeep";  
 
#connection string
$conn= mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);*/




    define("DB_HOST", "192.168.1.17");
    define("DB_USERNAME", "e12103751");
    define("DB_PASSWORD", "se7en");
    define("DB_DATABASE", "SAE_s3_Internkeep");

    $db = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
?>