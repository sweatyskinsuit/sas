<?php

require_once('../../private/initialize.php');

if (is_post_request()) {

  // Handle form values sent by new.php

  $salamander_name = $_POST['salamander_name'] ?? '';

  echo "Form parameters<br />";
  echo "Salamander name: " . $salamander_name . "<br />";
} else {
  redirect_to(url_for('/public/salamanders/new.php'));
}

?>
