<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! is_singular() ) : ?>
		<header class="article-header">
			<hgroup>
				<?php
				if ( has_post_thumbnail() ) {
					?><figure class="article-thumbnail"><?php the_post_thumbnail( array( 132, 132, true ) ); ?></figure><?php
				}

				if ( function_exists( 'wsuwp_uc_get_meta' ) ) {
					$display_fields = array( 'prefix', 'first_name', 'last_name', 'title', 'title_secondary', 'office', 'email', 'phone' );
					$display_data = array();
					foreach( $display_fields as $df ) {
						$display_data[ $df ] = wsuwp_uc_get_meta( get_the_ID(), $df );
					}

					$display_name = trim( join( ' ', array( $display_data['prefix'], $display_data['first_name'], $display_data['last_name'] ) ) );

					if ( empty( $display_name ) ) : $display_name = get_the_title(); endif; ?>
					<h2 class="article-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo esc_html( $display_name ); ?></a></h2><?php

					if ( ! empty( $display_data['title'] ) ) : ?><div class="person-title"><?php echo esc_html( $display_data['title'] ); ?></div><?php endif;
					if ( ! empty( $display_data['title_secondary'] ) ) : ?><div class="person-title-secondary"><?php echo esc_html( $display_data['title_secondary'] ); ?></div><?php endif;

				} ?>
			</hgroup>
		</header>

		<div class="article-summary">
			<?php
			// If a manual excerpt is available, display this. Otherwise, only the most basic information is needed.
			if ( $post->post_excerpt ) {
				echo get_the_excerpt();
			}
			?>
		</div><!-- .article-summary -->
	<?php else : ?>
		<div class="article-body">
			<?php the_content(); ?>
		</div>
	<?php endif; ?>

</article>