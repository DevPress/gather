<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gather
 */

get_header(); ?>

	<header class="page-header">
		<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
	</header><!-- .page-header -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<div id="posts-wrap" data-columns="<?php echo gather_get_columns(); ?>">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					$template = '';
					$type = get_post_type();

					if ( gather_load_masonry() ) {
						$template = 'masonry';
						if ( 'download' == $type ) {
							$template = 'masonry-download';
						}
					}

					get_template_part( 'content', gather_template_part() );
				?>

			<?php endwhile; ?>
			</div>

			<?php gather_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
