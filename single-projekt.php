<style>
	h1{
		text-align: center;
	}
.indhold{
	display:grid;
	grid-template-columns: 1fr 1fr;
	gap: 30px;
	justify-content: center;
	margin-right:10%;
	margin-left:10%;
	margin-bottom:5%;
}
img{
	width: 100%;
}
.knap{
	background-color: white;
	border: solid 1.5px black;
	border-radius: 12px;
	margin-left: 2%;
}
.knap:hover{
	border:solid 1.5px #FA9628;
	color:black;
}
@media (max-width: 700px){
	.indhold{
	display:grid;
	grid-template-columns: 1fr ;

}
}


</style>
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
	<div class="indhold">
	<img src="" alt="" class="picture" />
	
	<p></p>
</div>
</article>
</section>

		</main><!-- #main -->

<?php if ( ( is_page() && ! inspiro_is_frontpage() ) && ! has_post_thumbnail( get_queried_object_id() ) ) : ?>


	</div><!-- #primary -->
</div><!-- .inner-wrap -->

<?php endif ?>
<script>
	"use strict";
	let billede = document.querySelector
	let projekt;
	document.addEventListener("DOMContentLoaded",getJson);
	async function getJson(){
		console.log("id er",<?php echo get_the_ID()?>);
		let jsonData=await fetch (`http://dahliarindom.dk/kea/09_cms/unesco/wp-json/wp/v2/projekt/<?php echo get_the_ID()?>`);
		projekt=await jsonData.json();
		visProjekt();
	}
	function visProjekt(){
		console.log("visProjekt",projekt);
		
		document.querySelector("h1").textContent=projekt.title.rendered;
                    document.querySelector(".picture").src=projekt.image.guid;
		
		document.querySelector("p").textContent=projekt.beskrivelse;

		document.querySelector(".knap").addEventListener("click",tilbage);
	}
	function tilbage(){
		history.back();
	}


</script>
<?php
get_footer();
