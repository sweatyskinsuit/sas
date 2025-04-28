<?php
/**
 * Create new salamander page
 */

require_once('../../private/initialize.php');

$errors = [];

// Process form submission
if (is_post_request()) {
    $salamander = [];
    $salamander['name'] = $_POST['name'] ?? '';
    $salamander['habitat'] = $_POST['habitat'] ?? '';
    $salamander['description'] = $_POST['description'] ?? '';

    $result = insert_salamander($salamander);
    
    if ($result === true) {
        $new_id = mysqli_insert_id($db);
        redirect_to(url_for('salamanders/show.php?id=' . $new_id));
    } else {
        $errors = $result;
    }
} else {
    // Default empty salamander
    $salamander = [];
    $salamander['name'] = '';
    $salamander['habitat'] = '';
    $salamander['description'] = '';
}

$page_title = 'Create Salamander';
include(SHARED_PATH . '/salamander-header.php'); 
?>

<div id="content">
    <a href="<?php echo url_for('salamanders/index.php'); ?>">&laquo; Back to Salamanders</a>

    <h1>Create Salamander</h1>
    
    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('salamanders/new.php'); ?>" method="post">
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
        
        <input type="submit" value="Create Salamander">
    </form>
</div>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>