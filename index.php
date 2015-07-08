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
						<input type="text" id="searchQuestionInput" placeholder="Type your question here...">
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
			<div id="tagSearchlist">
			</div>
		</div>
	</div>

	<div class="row" id="alertPanePage">
		<div class="column small-12 alertBoxDiv"></div>
	</div>

	<div class="row luceofaq-content" id="questionList">
		<?php require 'views/questions/list.php'; ?>
	</div>

	<div id="addQuestion" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
	</div>

	<script src="assets/js/vendor/jquery.js"></script>
	<script src="assets/js/vendor/jquery-ui.min.js"></script>
	<script src="assets/js/vendor/fastclick.js"></script>
	<script src="assets/js/foundation.min.js"></script>
	<script src="assets/js/luceofaq.js"></script>
</body>
</html>