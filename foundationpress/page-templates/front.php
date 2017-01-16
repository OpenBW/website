<?php
/*
Template Name: Front
*/
get_header(); ?>

<header id="front-hero" role="banner">
	<div class="marketing">
		<div class="tagline">
			<h1><?php bloginfo( 'name' ); ?></h1>
			<h4 class="subheader"><?php bloginfo( 'description' ); ?></h4>
			<a role="button" class="download large button sites-button hide-for-small-only" href="http://www.openbw.com/?page_id=6">Explore OpenBW</a>
		</div>

		<div id="watch">
			<section id="youtube">
				<a href="https://www.youtube.com/channel/UChZ-_5R_01TlaMTPgAqAQrw">OpenBW Channel</a>
			</section>
			<section id="twitter">
				<a href="https://twitter.com/OpenBW_Team">@OpenBW_Team</a>
			</section>
			<section id="reddit">
				<a href="https://www.reddit.com/r/openbw/">/r/openbw/</a>
			</section>
		</div>
	</div>

</header>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="intro" role="main">
	<div class="fp-intro">

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php do_action( 'foundationpress_page_before_comments' ); ?>
			<?php comments_template(); ?>
			<?php do_action( 'foundationpress_page_after_comments' ); ?>
		</div>

	</div>

</section>
<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>

<div class="section-divider">
	<hr />
</div>


<section class="benefits">
	<header>
		<h2>OpenBW - free and open-source</h2>
		<h4>OpenBW is the most advanced project for players, developers, and researchers interested in RTS gaming.</h4>
	</header>

	<div class="semantic">
		<a href="http://www.openbw.com/core-engine/">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cogwheel.svg" alt="semantic">
			<h3>Core</h3>
			<p>Open-source game engine, fully compatible with Brood War.</p>
		</a>
	</div>

	<div class="responsive">
		<a href="http://www.openbw.com/bwhd-module/">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hd.svg" alt="responsive">
			<h3>BW HD</h3>
			<p>Higher resolution to accommodate for todays screens.</p>
		</a>
	</div>

	<div class="customizable">
		<a href="http://www.openbw.com/replay-module/">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/video-player.svg" alt="customizable">
			<h3>Replay Viewer</h3>
			<p>View replays in your browser - at any resolution!</p>
		</a>
	</div>

	<div class="professional">
		<a href="http://www.openbw.com/bwai-ide/">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/robot.svg" alt="professional">
			<h3>BW AI</h3>
			<p>Start developing your own OpenBW AI bot.</p>
		</a>
	</div>

	<!-- <div class="why-foundation">
		<a href="/kitchen-sink">See what's in Foundation out of the box →</a>
	</div>  -->

</section>



<?php get_footer();
