<?php

/* ======================================================================
	Comments.php
	Template for post comments.
 * ====================================================================== */

?>

<?php
	// If post is password protected, don't display comments
	if ( post_password_required() ) {
		return;
	}
?>

<?php if ( $comments ) : // If there are comments ?>

	<?php if ( comments_open() || $comments ) : ?>
		<h2 id="comments"><?php comments_number( __( 'Comment', 'kraken' ), __( '1 Comment', 'kraken' ), __( '% Comments', 'kraken' ) ); ?></h2>
	<?php endif; ?>

	<?php foreach ($comments as $comment) : ?>

		<article id="comment-<?php comment_ID() ?>">

			<?php if ($comment->comment_approved == '0') : // If the comment is held for moderation ?>
				<p><?php _e( 'Your comment is being held for moderation.', 'kraken' ) ?></p>
			<?php endif; ?>

			<header>
				<figure>
					<?php echo get_avatar( $comment, $size = '120' ); // $size at 2x for retina displays ?>
				</figure>
				<h3>
					<?php comment_author_link() ?>
				</h3>
				<aside>
					<?php comment_date('F jS, Y') ?><?php edit_comment_link('Edit', ' &bull; ', ''); ?>
				</aside>
			</header>

			<?php comment_text() ?>

		</article>

	<?php endforeach; // end for each comment ?>


<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : // if there are no comments ?>
	<p><?php _e( 'Comments are closed.', 'kraken' ) ?></p>
<?php endif; ?>


<?php if ( comments_open() ) : // If comments are allowed ?>

	<h2 id="respond"><?php _e( 'Leave a Comment', 'kraken' ) ?></h2>

	<?php if ( get_option('comment_registration') && !$user_ID ) : // If user must be logged in to comment ?>
		<p><?php printf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'kraken' ), wp_login_url( get_permalink() . '#respond' ) ); ?></p>
	<?php else : ?>
	<form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

		<?php if ( $user_ID ) : // If user is logged in ?>
			<p><?php printf( __( 'Logged in as %s.', 'kraken' ), $user_identity ); ?> <a href="<?php echo wp_logout_url( get_permalink() . '#respond' ); ?>"><?php _e( 'Logout', 'kraken' ) ?></a></p>
		<?php else : ?>
			<div>
				<label for="author"><?php _e( 'Name', 'kraken' ) ?></label>
				<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" required>
			</div>

			<div>
				<label for="email"><?php _e( 'Email', 'kraken' ) ?></label>
				<input type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" required>
			</div>

			<div>
				<label for="url"><?php _e( 'Website (optional)', 'kraken' ) ?></label>
				<input type="url" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" >
			</div>
		<?php endif; ?>
			<div>
				<textarea name="comment" id="comment" tabindex="4" required></textarea>
			</div>

			<div>
				<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e( 'Submit Comment', 'kraken' ) ?>">
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>">
				<?php do_action('comment_form', $post->ID); ?>
			</div>

	</form>

	<?php endif; // end if registration required and not logged in ?>

<?php endif; // end if comments are open ?>