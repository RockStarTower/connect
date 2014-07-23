<?php
include 'header.php';

function generate_ogv() {
$ogvs = array(
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/panda.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/owl.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/milkyway.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/lakeice.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/utahmtn.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/greenbutterflies.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/butterflysitting.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/mountains.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/Duckling_Getty.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/Easter_Island.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/bunnies.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/frogclimbing.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/woodpecker.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/MoerakiBoulders.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/MachuPicchu.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/StBeatusCaves.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/DominicanSunset.ogv" type="video/ogg">
		</video>',
	'<video class="panda" autoplay="autoplay" loop>
	   	<source src="video/Honeybee.ogv" type="video/ogg">
		</video>',
	'<img class="panda" src="video/crab.jpg" />',
	'<img class="panda" src="video/tarsier.jpg" />',
	'<img class="panda" src="video/lion.jpg" />',
	'<img class="panda" src="video/craterlake.jpg" />',
	'<img class="panda" src="video/hippopotamus.jpg" />',
	'<img class="panda" src="video/drops.jpg" />',
	'<img class="panda" src="video/chameleons.jpg" />',
	'<img class="panda" src="video/finch.jpg" />',
	'<img class="panda" src="video/adelaidefrog.jpg" />',
	'<img class="panda" src="video/GreenIguana.jpg" />',
	'<img class="panda" src="video/CastorCanadensis.jpg" />',
	'<img class="panda" src="video/Caiman.jpg" />',
	'<img class="panda" src="video/PelicanMigration.jpg" />',
	'<img class="panda" src="video/BabyMeerkat.jpg" />',
	'<img class="panda" src="video/GrizzlyMom.jpg" />',
	'<img class="panda" src="video/PiDay.jpg" />',
	'<img class="panda" src="video/BonsaiRock.jpg" />',
	'<img class="panda" src="video/GriswoldSunflower.jpg" />',
);

$num_ogvs = count($ogvs) -1;

$rand = mt_rand(0, $num_ogvs);

return $ogvs[$rand];
}

?>

<?php
$video = generate_ogv();
echo
'<div class="body-wrapper">

	<a class="topLinks" id="tasksQ" href="tasks.php">TASKS</a>
	<a class="topLinks" id="customQ" href="customweb.php">CUSTOM WEB REPORTS</a>
	<a class="topLinks" id="contentbuildQ" href="contentbuilder.php">CONTENT</a>
	<a class="topLinks" id="designbuilderQ" href="designbuilder.php">DESIGN</a>
	<a class="topLinks" id="devbuilderQ" href="devbuilder.php">DEVELOPMENT</a>
	<a class="topLinks" id="feedbackQ" href="suggestion.php">FEEDBACK</a>
	<img src="images/boostsearch.png" class="searchImg" />
	<div class="full-width">
		'.$video.'
	</div>
	

</div></body>'

?>
