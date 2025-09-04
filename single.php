<?php get_header(); ?>

<?php get_template_part('template-parts/part-header-single', 'a'); ?>

<?php get_template_part('template-parts/part-main-nav', 'a'); ?>

<main>
	<?php if (have_posts()): ?>
		<section>
			<div class="container">
				<?php while (have_posts()): 
					the_post();
					?>
					<article>
						<?php if (has_post_thumbnail()): ?>
							<figure>
								<?php the_post_thumbnail('large'); ?>
							</figure>
						<?php endif; ?>
						
						<?php the_content(); ?>
					</article>
				<?php endwhile; ?>
			</div>
		</section>
	<?php endif; ?>
</main>

<?php get_template_part('template-parts/part-footer', 'a'); ?>

<?php get_footer(); ?>
