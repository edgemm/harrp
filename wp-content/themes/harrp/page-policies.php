<?php
// Template Name: Policies
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
			<?php
				//$arr_index = array( [0] => array( [name] => 'conf', [desc] => 'Confidentiality' ),
				//		   [1] => array( [name] => 'intuse', [desc] => 'Internet Use' ),
				//		   [2] => array( [name] => 'leave', [desc] => 'Medical Leave' ),
				//		   [3] => array( [name] => 'perpol', [desc] => 'Personnel Policies' ),
				//		   [4] => array( [name] => 'pet', [desc] => 'Pet Policies' ),
				//		   [5] => array( [name] => 'prof', [desc] => 'Professional Services Contract' ),
				//		   [6] => array( [name] => 'reas', [desc] => 'Reasonable Accommodation' ),
				//		   [7] => array( [name] => 'substance', [desc] => 'Substance Abuse' ),
				//		   [8] => array( [name] => 'vehicle', [desc] => 'Vehicle Use' )
				//		   );
				//
				//foreach($arr_index as $arr) {
				//	echo '<li class="sideNav-item"><a class="sideNav-link" href="#' . $arr['name'] . '">' . $arr['desc'] . '</a></li>';
				//}
				//
				//$count = count($arr_index);
				//for( $i = 0; $i < $count; $i++ ) {
				//	echo '<li class="sideNav-item"><a class="sideNav-link" href="#' . $arr_index[$i]['name'] . '">' . $arr_index[$i]['desc'] . '</a></li>';
				//}
			?>
			<li class="sideNav-item"><a class="sideNav-link" href="#conf">Confidentiality</a></li>
			<li class="sideNav-item"><a class="sideNav-link" href="#intuse">Internet Use</a></li>
			<li class="sideNav-item"><a class="sideNav-link" href="#leave">Medical Leave</a></li>
			<li class="sideNav-item"><a class="sideNav-link" href="#perpol">Personnel Policies</a></li>
			<li class="sideNav-item"><a class="sideNav-link" href="#pet">Pet Policies</a></li>
			<li class="sideNav-item"><a class="sideNav-link" href="#prof">Professional Services Contract</a></li>
			<li class="sideNav-item"><a class="sideNav-link" href="#reas">Reasonable Accomodation</a></li>
			<li class="sideNav-item"><a class="sideNav-link" href="#substance">Substance Abuse</a></li>
			<li class="sideNav-item"><a class="sideNav-link" href="#vehicle">Vehicle Use</a></li>			
		</ul>
		<?php
		$selected_sidebar_replacement = get_post_meta($post->ID, 'sbg_selected_sidebar_replacement', true);
		if(!$selected_sidebar_replacement[0] == 0) {
			generated_dynamic_sidebar();
		}
		?>
	</div>
<?php get_footer(); ?>