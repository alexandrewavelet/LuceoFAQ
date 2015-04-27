<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Luceo FAQ</title>
	<link rel="stylesheet" href="assets/css/normalize.css" />
	<link rel="stylesheet" href="assets/css/foundation.min.css" />
	<link rel="stylesheet" href="assets/fonts/foundation-icons.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="assets/js/vendor/modernizr.js"></script>
</head>
<body>
	<div class="row">
		<div class="column small-12 medium-2 large-2">
			<img src="assets/images/luceo-logo.png" alt="Luceo FAQ">
		</div>
		<div class="column small-12 medium-8 large-8 luceofaq-searchbox">
			<div class="large-12 columns">
				<div class="row collapse">
					<div class="small-10 columns">
						<input type="text" placeholder="Type your question here...">
					</div>
					<div class="small-2 columns">
						<a href="#" class="button postfix">Go</a>
					</div>
				</div>
			</div>
		</div>
		<div class="column small-12 medium-2 large-2 luceofaq-searchbox">
			<a href="views/modal/addQuestion.php" class="button postfix" data-reveal-id="addQuestion" data-reveal-ajax="true">
				<i class="fi-plus"></i>
				Add
			</a>
		</div>
	</div>

	<div class="row">
		<div class="column small-12" id="accordion">
			<h3>Tags</h3>
			<div>
				<ul class="small-block-grid-4">
				 	<li class="switch">
				 		<input type="checkbox" id="tag1">
				 		<label for="tag1"></label>
				 		<span class="tag-accordion">tag1</span>
				 	</li>
				 	<li class="switch">
				 		<input type="checkbox" id="tag2">
				 		<label for="tag2"></label>
				 		<span class="tag-accordion">tag2</span>
				 	</li>
				 	<li class="switch">
				 		<input type="checkbox" id="tag3">
				 		<label for="tag3"></label>
				 		<span class="tag-accordion">tag3</span>
				 	</li>
				 	<li class="switch">
				 		<input type="checkbox" id="tag4">
				 		<label for="tag4"></label>
				 		<span class="tag-accordion">tag4</span>
				 	</li>
				 	<li class="switch">
				 		<input type="checkbox" id="tag5">
				 		<label for="tag5"></label>
				 		<span class="tag-accordion">tag5</span>
				 	</li>
				 	<li class="switch">
				 		<input type="checkbox" id="tag6">
				 		<label for="tag6"></label>
				 		<span class="tag-accordion">tag6</span>
				 	</li>
				 	<li class="switch">
				 		<input type="checkbox" id="tag7">
				 		<label for="tag7"></label>
				 		<span class="tag-accordion">tag7</span>
				 	</li>
				 	<li class="switch">
				 		<input type="checkbox" id="tag8">
				 		<label for="tag8"></label>
				 		<span class="tag-accordion">tag8</span>
				 	</li>
				 	<li class="switch">
				 		<input type="checkbox" id="tag9">
				 		<label for="tag9"></label>
				 		<span class="tag-accordion">tag9</span>
				 	</li>
				 	<li class="switch">
				 		<input type="checkbox" id="tag10">
				 		<label for="tag10"></label>
				 		<span class="tag-accordion">tag10</span>
				 	</li>
				 	<li class="switch">
				 		<input type="checkbox" id="tag11">
				 		<label for="tag11"></label>
				 		<span class="tag-accordion">tag11</span>
				 	</li>
				 	<li class="switch">
				 		<input type="checkbox" id="tag12">
				 		<label for="tag12"></label>
				 		<span class="tag-accordion">tag12</span>
				 	</li>
				 	<li class="switch">
				 		<input type="checkbox" id="tag13">
				 		<label for="tag13"></label>
				 		<span class="tag-accordion">tag13</span>
				 	</li>
				 	<li class="switch">
				 		<input type="checkbox" id="tag14">
				 		<label for="tag14"></label>
				 		<span class="tag-accordion">tag14</span>
				 	</li>
				 	<li class="switch">
				 		<input type="checkbox" id="tag15">
				 		<label for="tag15"></label>
				 		<span class="tag-accordion">tag15</span>
				 	</li>
				 	<li class="switch">
				 		<input type="checkbox" id="tag16">
				 		<label for="tag16"></label>
				 		<span class="tag-accordion">tag16</span>
				 	</li>
				 	<li class="switch">
				 		<input type="checkbox" id="tag17">
				 		<label for="tag17"></label>
				 		<span class="tag-accordion">tag17</span>
				 	</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row luceofaq-content">
	<?php include ('views/modal/listQuestion.php'); ?>
	</div>

	<div id="addQuestion" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
	</div>

	<script src="assets/js/vendor/jquery.js"></script>
	<script src="assets/js/vendor/jquery-ui.min.js"></script>
	<script src="assets/js/vendor/fastclick.js"></script>
	<script src="assets/js/foundation.min.js"></script>
	<script src="assets/js/luceofaq.min.js"></script>
</body>
</html>