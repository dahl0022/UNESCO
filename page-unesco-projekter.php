<style>
.projekt-oversigt{
	display: grid;
	grid-template-columns: repeat(auto-fill,minmax(250px,1fr));
	gap: 30px;
}
h2{
	font-size: 1rem;
}
main{
	margin-top: 50px;
}
#section_one{
	background-image: url(http://dahliarindom.dk/kea/09_cms/unesco/wp-content/uploads/2022/04/Artboard-1.png);
	background-size:contain;
	background-repeat: no-repeat;
	height:200px;
}
h1{
	text-align: center;
 vertical-align: middle;
 font-family: Montserrat,sans-serif;
}
/* dropdown */
.dropbtn {
  background-color: lightgrey;
  color: black;
  border:solid 1px rgb(169, 169, 169);
  border-radius: 5px;
  padding: 16px;
  font-size: 16px;
  cursor: pointer;

}

button .height{
	height:50px;

}
.dropdown {
  position: relative;
  display: inline-block;
  margin-bottom: 50px;
  margin-right:8px;
}
.filter{
width: 250px;	
height: 50px;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;

max-height: 400px;
overflow-x: hidden;
overflow-y: auto;
}

.dropdown-content a {
  color: black;
  text-decoration: none;
  display: block;
    width: 250px;
	overflow: hidden;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}


.knapper{
	display: flex;
	justify-content: center;
	flex-wrap: wrap;
}
.upload{
	position: fixed;
	bottom: 10%;
	right:5%;
	width: 300px;
	background-color: white;
	border: solid 1.5px black;
	border-radius: 12px;
}
.upload:hover{
	border:solid 1.5px #FA9628;
	color:black;
}
</style>
<?php
/**
 * The template for displaying all pages projekter
 */

get_header(); ?>

<?php if ( ( is_page() && ! inspiro_is_frontpage() ) && ! has_post_thumbnail( get_queried_object_id() ) ) : ?>

<div class="inner-wrap">
	<div id="primary" class="content-area">

<?php endif ?>
<button onclick="window.location.href='http://dahliarindom.dk/kea/09_cms/unesco/udload-unesco-projekt/';" class="upload">Upload projekt</button>
		<main id="main" class="site-main" role="main">
			<section id="section_one">
				<br>
				<H1>SE UNESCO PROJEKTER</H1>
	
			</section>
<p>Se UNESCO projekter indsendt af danske UNESCO verdensmålsskoler. Projekterne er alle med udgangspunkt i FNs 17 verdensmål og kan bruges som inspiration og motivation. Dette udgøre grundlaget for eksempelvis skoleprojekter, undersøgelser eller lignende.</p>
<div class="knapper">
<div class="dropdown">
  <button class="dropbtn">- Vælg klassetrin -</button>
  <div class="dropdown-content">
<nav id="filtrering"></nav>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">- Vælg verdensmål -</button>
  <div class="dropdown-content">
	  <button class="height"><a href="#">Alle verdensmål</a></button>
	  <button class="height"><a href="#">1: Afskaf fattigdom</a></button>
	  <button class="height"><a href="#">2: Stop sult</a></button>
	  <button class="height"> <a href="#">3: Sundhed og trivsel</a></button>
	  <button class="height"> <a href="#">4: Kvalitetsuddannelse</a></button>
	  <button class="height"><a href="#">5: Ligestilling mellem kønnene</a></button>
	  <button class="height"><a href="#">6: Rent vand og sanitet</a></button>
	  <button class="height"><a href="#">7: Bæredygtig energi</a></button>
	  <button class="height"><a href="#">8: Anstændige jobs og økonomisk vækst</a></button>
	   <button class="height"><a href="#">9: Industri, innovation og infrastruktur</a></button>
	  <button class="height"><a href="#">10: Mindre ullighed</a></button>
	  <button class="height"><a href="#">11: Bæredygtige byer og lokalsamfund</a></button>
	  <button class="height"><a href="#">12: Ansvarligt forbrug og produktion</a></button>
	  <button class="height"><a href="#">13: Klimaindsats</a></button>
	  <button class="height"><a href="#">14: Livet i havet</a> </button>
	  <button class="height"><a href="#">15: Livet på land</a></button>
	  <button class="height"><a href="#">16: Fred, retfærdighed og stærke institutioner</a></button>
	  <button class="height"><a href="#">17: Partnerskab for handling</a></button>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">- Vælg område -</button>
  <div class="dropdown-content">
	  <button class="height"><a href="#">Alle områder</a></button>
	  <button class="height"><a href="#">Bæredygtig udvikling</a></button>
	  <button class="height"><a href="#">Globalt medborgerskab</a></button>
	  <button class="height"> <a href="#">UNESCO verdensmålsskole</a></button>
  </div>
</div>
</div>
			

			<section class="projekt-oversigt">test</section>

		</main>

		
<template id="mytemplate">
			<article>
				<img src="" alt="" class="picture" />
				<h2 class="overskrift"></h2>
				<p class="beskrivelse"></p>
			</article>
</template>

<?php if ( ( is_page() && ! inspiro_is_frontpage() ) && ! has_post_thumbnail( get_queried_object_id() ) ) : ?>

	</div><!-- #primary -->
</div><!-- .inner-wrap -->

<?php endif ?>

<script>
	let projekter;
	let klassetrin;
	let filterKlasse = "alle";
	let filterProjekt = "alle";
	const liste = document.querySelector(".projekt-oversigt");
	const skabelon = document.querySelector("#mytemplate");
	console.log(skabelon);


	const url = "http://dahliarindom.dk/kea/09_cms/unesco/wp-json/wp/v2/projekt?per_page=100";
	const klasseurl = "http://dahliarindom.dk/kea/09_cms/unesco/wp-json/wp/v2/klassetrin";

	document.addEventListener("DOMContentLoaded", start);

	function start() {
		console.log("start");
		    getJson();
		
	}

	

	async function getJson () {
		let response = await fetch(url);
		let klassetrinresponse = await fetch(klasseurl);

		projekter = await response.json();
		klassetrin = await klassetrinresponse.json();
		console.log("klassetrin");
		
		visProjekter();
		opretKnapper();
	}
    
     function opretKnapper () {
            klassetrin.forEach(klasse => {
                document.querySelector("#filtrering").innerHTML += `<button class="filter" data-projekt=${klasse.id}">${klasse.name}</button>`
            })
            addEventListenersToButtons();

     }

	function addEventListenersToButtons() {
            document.querySelectorAll("#filtrering button").forEach(elm => {
                elm.addEventListener("click", filtrerProjekter);
            })
    };	

	function filtrerProjekter() {
					console.log("filtrerProjekter");
            filterProjekt = this.dataset.projekt;


            console.log(filterKlasse);
            visProjekter();
     }

    function visProjekter() {
			console.log("visProjekter");
			console.log(
			
			);
            
           liste.innerHTML="";
            console.log(projekter);
            projekter.forEach(projekt => {
                if( filterProjekt == "alle" || projekt.klassetrin.includes(parseInt(filterProjekt))) {
                    const klon = skabelon.cloneNode(true).content;
                    console.log(klon);
                    klon.querySelector("h2").textContent = projekt.overskrift_;
                    klon.querySelector("img").src = projekt.image.guid;
                    klon.querySelector("p").textContent = projekt.kort_beskrivelse;

                    klon.querySelector("article").addEventListener("click", () => {location.href = projekt.link;})
                    liste.appendChild(klon);
                }
            })
    }




</script>
<?php
get_footer();
