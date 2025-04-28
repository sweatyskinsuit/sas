<?php
/**
 * Shared header template for salamander pages
 */

// Set default page title if not set
if (!isset($page_title)) { 
    $page_title = 'Salamanders'; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SAS - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/salamanders.css'); ?>">
</head>
<body>
    <header>
        <h1><a href="<?php echo url_for('/'); ?>">Southern Appalachian Salamanders (SAS)</a></h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="<?php echo url_for('salamanders/'); ?>">Salamanders</a></li>
        </ul>
    </nav>
    
    <main>
