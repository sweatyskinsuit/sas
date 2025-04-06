<?php

require_once('../../private/initialize.php');

$salamander_set = find_all_salamanders();
$page_title = 'Salamanders';
include(SHARED_PATH . '/salamander-header.php');

?>
<!DOCTPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="../stylesheets/salamanders.css">
  </head>

  <body>
    <h1>Salamanders</h1>

    <a href="<?= url_for('salamanders/new.php'); ?>">Create Salamander</a>

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

      <?php while ($salamander = mysqli_fetch_assoc($salamander_set)) { ?>
        <tr>
          <td><?= h($salamander['id']); ?></td>
          <td><?= h($salamander['name']); ?></td>
          <td><?= h($salamander['habitat']); ?></td>
          <td><?= h($salamander['description']); ?></td>
          <td><a href="<?= url_for('salamanders/show.php?id=' . h(u($salamander['id']))); ?>">View</a></td>
          <td><a href="<?= url_for('salamanders/edit.php?id=' . h(u($salamander['id']))); ?>">Edit</a></td>
          <td><a href="<?= url_for('salamanders/delete.php?id=' . h(u($salamander['id']))); ?>">Delete</a></td>
        </tr>
      <?php } ?>
    </table>
    <?php mysqli_free_result($salamander_set); ?>
    Thanks to <a href="https://herpsofnc.org">Ampibians and Reptiles of North Carolina</a>

    <?php include(SHARED_PATH . '/salamander-footer.php'); ?>
