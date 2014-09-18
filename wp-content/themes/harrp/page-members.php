<?php
// Template Name: Members
get_header(); ?>
	<?php
	if(get_post_meta($post->ID, 'pyre_full_width', true) == 'yes') {
		$content_css = 'width:100%';
		$sidebar_css = 'display:none';
	}
	elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'left') {
		$content_css = 'float:right;';
		$sidebar_css = 'float:left;';
	} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'right') {
		$content_css = 'float:left;';
		$sidebar_css = 'float:right;';
	} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'default') {
		if($data['default_sidebar_pos'] == 'Left') {
			$content_css = 'float:right;';
			$sidebar_css = 'float:left;';
		} elseif($data['default_sidebar_pos'] == 'Right') {
			$content_css = 'float:left;';
			$sidebar_css = 'float:right;';
		}
	}
	?>
	<div id="content" style="<?php echo $content_css; ?>">
		<?php while(have_posts()): the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php global $data; if(!$data['featured_images_pages'] && has_post_thumbnail()): ?>
			<div class="image">
				<?php the_post_thumbnail('blog-large'); ?>
			</div>
			<?php endif; ?>
			<div class="post-content">
				<?php the_content(); ?>
			</div>
			<?php if($data['comments_pages']): ?>
				<?php wp_reset_query(); ?>
				<?php comments_template(); ?>
			<?php endif; ?>
		</div>
		<?php endwhile; ?>
	</div>
	<div id="sidebar" style="<?php echo $sidebar_css; ?>">
		<ul class="side-nav sideNav">
			<li class="sideNav-item"><a class="sideNav-link" href="http://harrp.com/members/agendas">Agendas</a></li>
			<li class="sideNav-item"><a class="sideNav-link" href="http://harrp.com/members/harrp-members">HARRP MEMBERS</a></li>
			<li class="sideNav-item"><a class="sideNav-link" href="http://harrp.com/members/harrp-notes">HARRP Notes</a></li>
			<li class="sideNav-item"><a class="sideNav-link" href="http://harrp.com/members/coverage-agreement">Coverage Agreement</a></li>
			<li class="sideNav-item"><a class="sideNav-link" href="http://harrp.com/members/intergovernmental-cooperation-agreement">Intergovernmental Cooperation Agreement</a></li>
			<li class="sideNav-item"><a class="sideNav-link" href="http://harrp.com/members/annual-report">Annual Report</a></li>
		</ul>
		<?php
		$selected_sidebar_replacement = get_post_meta($post->ID, 'sbg_selected_sidebar_replacement', true);
		if(!$selected_sidebar_replacement[0] == 0) {
			generated_dynamic_sidebar();
		}
		?>
	</div>
<?php get_footer(); ?>