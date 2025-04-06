<?php require_once('../../private/initialize.php');

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$page = find_salamander_by_id($id);

?>

<?php $page_title = 'View Salamander'; ?>
<?php include(SHARED_PATH . '/salamander_header.php'); ?>

<div id="content">
  <a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>
</div>
<div class="page show">

  <h1>Page: <?php echo h($page['name']); ?></h1>
  <p> Page ID: <?= h($id); ?> </p>
  <div class="attributes">
    <?php $subject = find_salamander_by_id($page['id']); ?>
    <dl>
      <dt>Name</dt>
      <dd><?php echo h($subject['name']); ?></dd>
    </dl>
    <dl>
      <dt>Habitat</dt>
      <dd><?php echo h($page['habitat']); ?></dd>
    </dl>
    <dl>
      <dt>Description</dt>
      <dd><?php echo h($page['description']); ?></dd>
    </dl>
  </div>

  <?php include(SHARED_PATH . '/salamander_footer.php'); ?>