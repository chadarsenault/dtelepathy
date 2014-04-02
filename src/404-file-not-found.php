<?php
$page="404";
$title="File Not Found";
require $_SERVER['DOCUMENT_ROOT'].'/php/tmpl/doctype.php';
require $_SERVER['DOCUMENT_ROOT'].'/php/tmpl/head.php';
?>
<!-- begin head js / css -->

<!-- end head js / css -->
<?php
require $_SERVER['DOCUMENT_ROOT'].'/php/tmpl/body.php';
require $_SERVER['DOCUMENT_ROOT'].'/php/tmpl/header.php';
?>
<div class="body-content 404">
<!-- begin content -->
	<h1>Whoops!</h1>
	<h2>Something Went Wrong.</h2>
	<p>The page you were trying to reach could not be found.</p>
	<a href="/" title="Return to the home page">Return to the home page?</a>
<!-- end content -->
</div>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/php/tmpl/footer.php';
?>
<!-- begin foot js -->

<!-- end foot js -->
<?php require $_SERVER['DOCUMENT_ROOT'].'/php/tmpl/end.php';