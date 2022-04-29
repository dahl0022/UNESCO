<?php
/**
 * The template for displaying singleview
 */

get_header(); ?>

<?php if ( ( is_page() && ! inspiro_is_frontpage() ) && ! has_post_thumbnail( get_queried_object_id() ) ) : ?>

<div class="inner-wrap">
	<div id="primary" class="content-area">

<?php endif ?>

		<main id="main" class="site-main" role="main">
<button class="knap">TILBAGE</button>
<section class="projekt-oversigt">
<article>
	<h1></h1>
				<img src="" alt="" class="picture" />
	<p></p>
	<video class="video1" src=""></video>
	<video class="video2" src=""></video>
</article>
</section>

		</main><!-- #main -->

<?php if ( ( is_page() && ! inspiro_is_frontpage() ) && ! has_post_thumbnail( get_queried_object_id() ) ) : ?>


	</div><!-- #primary -->
</div><!-- .inner-wrap -->

<?php endif ?>
<script>
	let projekt;
	document.addEventListener("DOMContentLoaded",getJson);
	async function getJson(){
		console.log("id er",<?php echo get_the_ID()?>);
		let jsonData=await fetch (`http://dahliarindom.dk/kea/09_cms/unesco/wp-json/wp/v2/projekt/ <?php echo get_the_ID()?>`);
		projekt=await jsonData.json();
		visProjekt();
	}
	function visProjekt(){
		console.log("visProjekt");
                    document.querySelector(".picture").src=projekt.image.guid;
		document.querySelector("h1").textContent=projekt.overskrift.rendered;
		document.querySelector("p").textContent=projekt.beskrivelse;
		document.querySelector(".video1").src=projekt.video.guid;
		document.querySelector(".video2").src=projekt.video2.guid;

		document.querySelector(".knap").addEventListener("click",tilbage);
	}
	function tilbage(){
		history.back();
	}
</script>
<?php
get_footer();
