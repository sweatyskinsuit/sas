<?php require_once('../../private/initialize.php');

if (is_post_request()) {

    $salamander = [];
    $salamander['id'] = $_POST['id'] ?? '';
    $salamander['name'] = $_POST['name'] ?? '';
    $salamander['habitat'] = $_POST['habitat'] ?? '';
    $salamander['description'] = $_POST['description'] ?? '';

    $result = insert_salamander($salamander);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('salamanders/show.php?id=' . $new_id));

} else {

    $salamander = [];
    $salamander['id'] = '';
    $salamander['name'] = '';
    $salamander['habitat'] = '';
    $salamander['description'] = '';

    $salamander_set = find_all_salamanders();
    $salamander_count = mysqli_num_rows($salamander_set) + 1;
    mysqli_free_result($salamander_set);

}

?>

<?php $page_title = 'Create Salamander'; ?>
<?php include(SHARED_PATH . '/salamander_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('salamanders/index.php'); ?>">&laquo; Back to List</a>

    <div class="page new">
        <h1>Stub for New Salamander</h1>

        <form action="<?php echo url_for('salamanders/new.php'); ?>" method="post">

            <dl>
                <dt>Salamander Name</dt>
                <dd><input type="text" name="name" value="<?php echo h($salamander['name']); ?>" /></dd>
            </dl>
            <dl>
                <dt>Habitat</dt>
                <dd><input type="text" name="habitat" value="<?php echo h($salamander['habitat']); ?>" /></dd>
            </dl>
            <dl>
                <dt>Description</dt>
                <dd><input type="text" name="description" value="<?php echo h($salamander['description']); ?>" /></dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Create Salamander" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/salamander_footer.php'); ?>