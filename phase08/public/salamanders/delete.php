<?php
/**
 * Delete salamander page
 */

require_once('../../private/initialize.php');

// Set page title
$page_title = 'Delete Salamander';
include(SHARED_PATH . '/salamander-header.php');

// Verify ID parameter exists
if (!isset($_GET['id'])) {
    redirect_to(url_for('salamanders/index.php'));
}

$id = $_GET['id'];

// Process form submission
if (is_post_request()) {
    delete_salamander($id);
    redirect_to(url_for('salamanders/index.php'));
} else {
    $salamander = find_salamander_by_id($id);
    
    // Handle case where salamander doesn't exist
    if (!$salamander) {
        redirect_to(url_for('salamanders/index.php'));
    }
}
?>

<div id="content">
    <a href="<?php echo url_for('salamanders/index.php'); ?>">&laquo; Back to Salamanders</a>
    
    <h1>Delete Salamander</h1>
    <p>Are you sure you want to delete this salamander?</p>
    <p><?php echo h($salamander['name']); ?></p>

    <form action="<?php echo url_for('salamanders/delete.php?id=' . h(u($salamander['id']))); ?>" method="post">
        <input type="submit" name="commit" value="Delete Salamander" />
    </form>
</div>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>