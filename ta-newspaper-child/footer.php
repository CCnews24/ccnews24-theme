<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
	<p id="back-top" style="display: block;">
		<a href="#top"><span><i class="fa fa-angle-up"></i></span></a>
	</p>
	<div class="container">
		<div class="row">
			
			<div class="col-12">
				
				<div class="footer-copyright clearfix">


					Copyright © 2019 CCnews24. All rights reserved.
					</div>

			</div>
		</div>
	</div>
                                
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<input type="button" onclick="notifSet ()" value="Notification">
	
<script>
	function notifyMe () {
		var notification = new Notification ("Все еще работаешь?", {
			tag : "ache-mail",
			body : "Пора сделать паузу и отдохнуть",
			icon : "https://itproger.com/img/notify.png"
		});
	}
	
	function notifSet () {
		if (!("Notification" in window))
			alert ("Ваш браузер не поддерживает уведомления.");
		else if (Notification.permission === "granted")
			setTimeout(notifyMe, 2000);
		else if (Notification.permission !== "denied") {
			Notification.requestPermission (function (permission) {
				if (!('permission' in Notification))
					Notification.permission = permission;
				if (permission === "granted")
					setTimeout(notifyMe, 2000);
			});
		}
	}
</script>
</body>
</html>
