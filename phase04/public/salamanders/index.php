<?php

require_once('../../private/initialize.php');
// Use the find_all_salamanders() function to get an associative array

$salamander_set = find_all_salamanders();

$page_title = 'Salamanders';
include(SHARED_PATH . '/salamander_header.php');
?>

<!DOCTPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="../stylesheets/salamanders.css">
  </head>
  <body>
<h1>Salamanders</h1>

<a href="<?= url_for('salamanders/create.php'); ?>">Create Salamander</a>

<!-- Use CSS to style the table -->
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Habitat</th>
    <th>Desc</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

  <?php while($salamander = mysqli_fetch_assoc($salamander_set)) { ?>
        <tr>
          <td><?php echo h($salamander['id']); ?></td>
          <td><?php echo h($salamander['name']); ?></td>
          <td><?php echo h($salamander['habitat']); ?></td>
    	    <td><?php echo h($salamander['description']); ?></td>
          <td><a class="action" href="<?php echo url_for('salamanders/show.php?id=' . h(u($salamander['id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('salamanders/edit.php?id=' . h(u($salamander['id']))); ?>">Edit</a></td>
          <td><a class="action" href="">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($salamander_set);
    ?>

  Thanks to <a href="https://herpsofnc.org">Ampibians and Reptiles of North Carolina</a>
  </body>
  </html>
  <?php include(SHARED_PATH . '/salamander_footer.php'); ?>