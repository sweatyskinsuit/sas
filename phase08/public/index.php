<?php
/**
 * Home page
 */

require_once('../private/initialize.php');

$page_title = 'Home';
include(SHARED_PATH . '/salamander-header.php'); 
?>

<div id="content">
    <h1>Welcome to SAS</h1>
    
    <div class="intro">
        <p>The Southern Appalachian Mountains Region is often hailed as the Salamander Capital of the World. 
           In fact, the Smithsonian Conservation Biology Institute proclaims that the Appalachian region is 
           home to more salamander species than anywhere else in the world, making it a true hotspot for 
           salamander biodiversity.</p>
           
        <p><a href="https://www.savethesalamanders.com/appalachian-salamanders/">Source</a></p>
    </div>
    
    <div class="actions">
        <a href="<?php echo url_for('salamanders/index.php'); ?>">View All Salamanders</a>
    </div>
</div>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>