<?php

require_once('../../private/initialize.php');

$test = $_GET['test'] ?? '';

if ($test == '404') {
  error_404();
} elseif ($test == '500') {
  error_500();
} elseif ($test == 'redirect') {
  redirect_to(url_for('/public/index.php'));
} else {
  echo 'No error';
}
?>

<?php $page_title = 'Create Salamander'; ?>
<?php include(SHARED_PATH . '/salamander_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject new">
    <h1>Create Salamander</h1>

    <form action="<?php echo url_for('/salamanders/create.php'); ?>" method="post">
      <dl>
        <dt>Name</dt>
        <dd><input type="text" name="name" value="" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Salamander" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/salamander_footer.php'); ?>
