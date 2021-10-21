<?php
if (!isset($title)){
    $title = "Default Title";
}

?>

<html>
    <head>
    <title><?php echo $title; ?> | My Site</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>
<body>
    <header class="header">
        <nav class="nav">
            <ul>
               <li><a href="index.php">Home</a></li>
               <li><a href="about.php">About</a></li>
               <li><a href="contact.php">Contact</a></li>
               
            </ul>
        </nav>
     </header>