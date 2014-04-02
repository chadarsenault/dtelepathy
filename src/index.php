<?php
$page="home";
$title="Welcome";
require $_SERVER['DOCUMENT_ROOT'].'/php/tmpl/doctype.php';
require $_SERVER['DOCUMENT_ROOT'].'/php/tmpl/head.php';
?>
<!-- begin head js / css -->

<!-- end head js / css -->
<?php
require $_SERVER['DOCUMENT_ROOT'].'/php/tmpl/body.php';
?>
<!-- begin content -->
<div class="body-content">
	<div class="body-section hero">
		<div class="body-hero">
			<div id="hero-container">
				<img src="/assets/img/logo.png" class="logo" alt="Twine logo">
				<img src="/assets/img/video.jpg" class="video-hero" alt="Twine video">
			</div>
			<div class="hero-content">
				<h1>Listen to Your World.<br>Talk to the Web.</h1>
				<a href="http://vimeo.com/2619976" target="_blank" class="video-link">Watch the Video.</a>
				<p>Give us your email, and we'll let you know when it's available to the public.</p>
				<form id="email-form" name="email-form">
					<input type="email" name="email" class="email-input" placeholder="Email" required>
					<button class="email-button" type="submit" name="submit" title="Subscribe to Twine for early product availability notifications.">Submit</button>
				</form>
			</div>
		</div>
	</div>
	<div class="body-section details">
		<div class="body-details">
			<div class="details-content">
				<h1>Connect your things<br>to the Internet,<br>without a nerd degree.</h1>
				<div class="anim-container">
					<div class="anim-content">
						<div class="anim-img"><img src="/assets/img/animation-1.png"></div>
						<div class="anim-left"></div>
						<div class="anim-mid"></div>
						<div class="anim-right"></div>
					</div>
				</div>
				<p><strong>Twine is the simplest possible way to get the objects in your life texting, tweeting or emailing.</strong></p>
				<p class="desc">Want to hook up things to the Web?  Maybe you want to get a tweet when your laundry's done, or get an email when the basement floods while you're on vacation.  Even if you're good with electronics and programming, these are involved projects.  Instead of worrying about wiring or networking code, you can focus on your idea.</p>
			</div>
		</div>
	</div>
	<div class="body-section foot">
		<div class="body-foot">
			<div class="foot-content">
				<h1>Objects that<br>Connect Us.</h1>
				<p class="desc">Drawing on our experience in hardware and software, we've spent the last few months creating working prototypes and near-final forms.  We are truly excited about getting Twine into people's hands to see what new uses others will find for it.</p>
				<a href="#" class="foot-link">Get Excited With Us.</a>
				<form id="email-form2" name="email-form2">
					<input type="email" name="email2" class="email-input" placeholder="Email" required>
					<button class="email-button" type="submit" name="submit" title="Subscribe to Twine for early product availability notifications.">Submit</button>
				</form>
				<img src="/assets/img/widgets.png" class="social-widgets">
				<small>&copy; Supermechanical Limited Liability Company.  All Rights Reserved.  Austin, Texas.</small>
			</div>
		</div>
	</div>
</div>
<!-- end content -->
<?php
require $_SERVER['DOCUMENT_ROOT'].'/php/tmpl/footer.php';
?>
<!-- begin foot js -->
<script src="/assets/js/email.js"></script>
<!-- end foot js -->
<?php require $_SERVER['DOCUMENT_ROOT'].'/php/tmpl/end.php';