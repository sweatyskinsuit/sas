<?php

require_once('../../private/initialize.php');

include(SHARED_PATH . '/salamander_header.php');

echo "<h1>Stub for Create Salamander</h1>";

if (is_post_request()) {

    $salamander = [];
    $salamander['name'] = $_POST['name'] ?? '';
    $salamander['habitat'] = $_POST['habitat'] ?? '';
    $salamander['description'] = $_POST['description'] ?? '';

    $result = insert_salamander($subject);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('salamanders/show.php?id=' . $new_id));

} else {
    redirect_to(url_for('salamanders/new.php'));
}

include(SHARED_PATH . '/salamander_footer.php');
?>