<?php
   $db = new SQLite3('selbuDB') or die('Unable to open database');
   $query = <<<EOD
     CREATE TABLE IF NOT EXISTS users (
       username STRING PRIMARY KEY,
       password STRING)
   EOD;
   $db->exec($query) or die('Create db failed');
   $user = htmlspecialchars($_POST['username']);
   $pass = htmlspecialchars($_POST['password']);
   $query = <<<EOD
     INSERT OR REPLACE INTO users VALUES ( '$user', '$pass' )
   EOD;
   $db->exec($query) or die("Unable to add user $user");
   $result = $db->query('SELECT * FROM users') or die('Query failed');
   while ($row = $result->fetchArray())
   {
    header('Location: index.html'); exit;
     /* echo "User: {$row['username']}\nPasswd: {$row['password']}\n"; */
   }
?>