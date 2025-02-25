<!-- require initialize.php -->
<?php require_once('../../private/initialize.php'); ?>


<!--
  Write a salamanders array with the following
id=1, salamanderName = Red-Legged Salamander
id=2, salamanderName = Pigeon Mountain Salamander
id=3', salamanderName = ZigZag Salamander
id=4,  salamanderName= Slimy Salamander
-->
<?php
$salamanders = [
  ['id' => '1', 'position' => '1', 'visible' => '1', 'salamanderName' => 'Red-Legged Salamander'],
  ['id' => '2', 'position' => '2', 'visible' => '2', 'salamanderName' => 'Pigeon Mountain Salamander'],
  ['id' => '3', 'position' => '3', 'visible' => '3', 'salamanderName' => 'ZigZag Salamander'],
  ['id' => '4', 'position' => '4', 'visible' => '4', 'salamanderName' => 'Slimy Salamander']
];
?>

<!-- Add the pageTitle for salamanders
Include a shared path to the salamander header -->
<?php $page_title = 'Salamanders'; ?>
<?php include(SHARED_PATH . '/salamander-header.php'); ?>


<h1>Salamanders</h1>

<a href="#">Create Salamander</a>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

  <?php foreach ($salamanders as $salamander) { ?>
    <tr>
      <td><?php echo $salamander['id']; ?></td>
      <td><?php echo $salamander['salamanderName']; ?></td>
      <td><a href="<?php echo url_for('/salamanders/show.php?id=' . u($salamander['id'])); ?>">View</a></td>

      <!-- <td>Display the salamander id</td> -->
      <!-- <td>Display the salamander name</td> -->
      <!-- Use url_for with show.php AND h(u) with the salamander['id'] -->
      <td><a href="#">Edit</a></td>
      <td><a href="#">Delete</a></td>
    </tr>
  <?php } ?>
</table>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
