<?php $isAdmin ? include('admin_header.php') : include('header.php'); ?>
<h2>Error</h2>
<br>
<p><?= $error_message ?></p>
<br>
<p><a href=".">Back to Home</a></p>
<?php $isAdmin ? include('admin_footer.php') : include('footer.php'); ?>