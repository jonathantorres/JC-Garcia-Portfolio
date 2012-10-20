	<!-- Commenting functionality!!!!!! -->
	<?php
	
		if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!');
		
		// if there's a password
		if (!empty($post->post_password)) {
			// and it doesn't match the cookie
			if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  
		?>
		
		<p><?php _e('Password Protected'); ?></p>
		<p><?php _e('Enter the password to view comments.'); ?></p>
		
		<?php return;
		
			}
		}
	?>
	
<div class="comments">
	<?php if ($comments) : ?>
		<h3 class="comments_title">COMENTARIOS</h3>
		<ol class="comments_list">
			<?php foreach ($comments as $comment) : ?>
				<li <?php comment_class(); ?>>
					<div class="pic_circle48 avatar">
						<?php echo get_avatar($comment->comment_author_email, 48); ?>
					</div>
					<div class="comment_content">
						<div class="comment_meta">
							<h4 class="commenter_name"><?php comment_author(); ?></h4>
							<span class="comment_date"><?php comment_date('F j, Y'); ?></span>
						</div>
						<?php comment_text(); ?>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>
	<?php endif; ?>
	
	<?php if (comments_open()) : ?>
		<h3 class="reply_title">AÑADIR COMENTARIO</h3>
		<form id="jcomments_form" class="comments_form" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
			<ul>
				<!-- If The Admin or a user is logged in -->
				<?php if ($user_ID) : ?>
					<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> - Click <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">here</a> to logout.</p>
				<?php else : ?>
					<li>
						<label for="author">nombre</label>
						<input type="text" id="author" name="author" placeholder="nombre" value="<?php echo $comment_author; ?>">
					</li>
					<li>
						<label for="email">e-mail</label>
						<input type="text" id="email" name="email" placeholder="e-mail" value="<?php echo $comment_author_email; ?>">
					</li>
				<?php endif; ?>
				<li>
					<label for="comment">mensaje</label>
					<textarea id="comment" name="comment" placeholder="mensaje"></textarea>
				</li>
				<li>
					<input type="submit" class="gradient dark_button" id="send" name="send" value="Enviar">
				</li>
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" >
				<?php do_action('comment_form', $post->ID); ?>
			</ul>
		</form>
	<?php endif; ?>
</div><!-- .comments -->