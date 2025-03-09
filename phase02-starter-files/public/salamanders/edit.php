<?php

require_once('../../private/initialize.php');

if (!isset($_GET['id'])) {
  redirect_to(url_for('/public/index.php'));
}
$id = $_GET['id'];
$name = '';

if (is_post_request()) {

  // Handle form values sent by new.php

  $name = $_POST['name'] ?? '';

  echo "Form parameters<br />";
  echo "Name: " . $name . "<br />";
}

?>

<?php $page_title = 'Edit Salamander'; ?>
<?php include(SHARED_PATH . '/salamander_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/public/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject edit">
    <h1>Edit Salamander</h1>

    <form action="<?php echo url_for('/public/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="name" value="<?php echo h($name); ?>" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Edit Salamander" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/salamander_footer.php'); ?>
