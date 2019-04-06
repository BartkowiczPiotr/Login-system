<p>Complete php login system with two step login authentication and control of password expiry.</p>

<p>In Classes/config/database.php file, configure your database connection. In main directory you can find Sql file with users and passwords tables</p>

<p><b>Classes/User.php</b> contains User class with <b>Login($email, $password)</b> method</p>

<p><b>Controller/login.php</b> is a intermediate file, called by App/js/controller.js by Ajax</p>