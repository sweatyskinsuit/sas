<?php
/**
 * Show salamander details page
 */

require_once('../../private/initialize.php');

// Verify ID parameter exists
if (!isset($_GET['id'])) {
    redirect_to(url_for('salamanders/index.php'));
}

$id = $_GET['id'];
$salamander = find_salamander_by_id($id);

// Handle case where salamander doesn't exist
if (!$salamander) {
    redirect_to(url_for('salamanders/index.php'));
}

$page_title = 'Salamander Details';
include(SHARED_PATH . '/salamander-header.php'); 
?>

<div id="content">
    <a href="<?php echo url_for('salamanders/index.php'); ?>">&laquo; Back to Salamander List</a>
    
    <h1>Salamander Details</h1>
    
    <div class="attributes">
        <dl>
            <dt>ID</dt>
            <dd><?php echo h($salamander['id']); ?></dd>
            
            <dt>Name</dt>
            <dd><?php echo h($salamander['name']); ?></dd>
            
            <dt>Habitat</dt>
            <dd><?php echo h($salamander['habitat']); ?></dd>
            
            <dt>Description</dt>
            <dd><?php echo h($salamander['description']); ?></dd>
        </dl>
    </div>
    
    <div class="actions">
        <a class="action" href="<?php echo url_for('salamanders/edit.php?id=' . h(u($salamander['id']))); ?>">Edit</a>
        <a class="action" href="<?php echo url_for('salamanders/delete.php?id=' . h(u($salamander['id']))); ?>">Delete</a>
    </div>
</div>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>