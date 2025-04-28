<?php
/**
 * Edit salamander page
 */

require_once('../../private/initialize.php');

// Set page title
$page_title = 'Edit Salamander';
include(SHARED_PATH . '/salamander-header.php'); 

// Verify ID parameter exists
if (!isset($_GET['id'])) {
    redirect_to(url_for('salamanders/index.php'));
}

$id = $_GET['id'];
$errors = [];

// Process form submission
if (is_post_request()) {
    $salamander = [];
    $salamander['id'] = $id;
    $salamander['name'] = $_POST['name'] ?? '';
    $salamander['habitat'] = $_POST['habitat'] ?? '';
    $salamander['description'] = $_POST['description'] ?? '';
    
    $result = update_salamander($salamander);
    
    if ($result === true) {
        redirect_to(url_for('salamanders/show.php?id=' . $id));
    } else {
        $errors = $result;
    }
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
    
    <h1>Edit Salamander</h1>
    
    <?php echo display_errors($errors); ?>
    
    <form action="<?php echo url_for('salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo h($salamander['name']); ?>">
        </div>
        
        <div class="form-group">
            <label for="habitat">Habitat:</label>
            <textarea id="habitat" name="habitat" rows="4" cols="50"><?php echo h($salamander['habitat']); ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" cols="50"><?php echo h($salamander['description']); ?></textarea>
        </div>
        
        <input type="submit" value="Edit Salamander">
    </form>
</div>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>