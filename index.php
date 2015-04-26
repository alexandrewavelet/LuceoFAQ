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
			<div id="tagSearchlist">
				<?php require_once('views/search/tagsList.php'); ?>
			</div>
		</div>
	</div>

	<div class="row" id="alertPanePage">
		<div class="column small-12 alertBoxDiv"></div>
	</div>

	<div class="row luceofaq-content">
		<div class="column small-12 luceofaq-question">
			<h3>Lorem ipsum dolor. <span class="anchor"><a href="#">#</a></span><a href="#" class="button tiny right">Edit</a></h3>
			<p>
				<span class="label">tag1</span>
				<span class="label">tag2</span>
				<span class="label">tag3</span>
			</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore ab neque error dolor laudantium! Tenetur hic doloremque esse facere autem repudiandae est eveniet quas inventore illum. Dolores impedit, maiores. Saepe?</p>
		</div>
		<div class="column small-12 luceofaq-question">
			<h3>Lorem ipsum dolor sit amet.  <span class="anchor"><a href="#">#</a></span><a href="#" class="button tiny right">Edit</a></h3>
			<p>
				<span class="label">tag10</span>
				<span class="label">tag16</span>
			</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, expedita amet dolorem a libero soluta quasi quae suscipit possimus, sed quo qui modi esse repudiandae quos magni, labore molestiae accusamus.</p>
		</div>
		<div class="column small-12 luceofaq-question">
			<h3>Perspiciatis, fugit dolorum quia doloremque.  <span class="anchor"><a href="#">#</a></span><a href="#" class="button tiny right">Edit</a></h3>
			<p>
				<span class="label">tag5</span>
				<span class="label">tag8</span>
				<span class="label">tag10</span>
				<span class="label">tag11</span>
			</p>
			<p>Maiores facere doloremque inventore voluptate excepturi veritatis soluta ipsam fuga, voluptatum odit eum odio, totam aliquam illo. Facilis blanditiis quaerat at minima ratione earum ut a! Pariatur quibusdam ad vero.</p>
		</div>
		<div class="column small-12 luceofaq-question">
			<h3>Repellat iste modi, est ab.  <span class="anchor"><a href="#">#</a></span><a href="#" class="button tiny right">Edit</a></h3>
			<p>
				<span class="label">tag2</span>
				<span class="label">tag14</span>
			</p>
			<p>Quia eos, iste commodi expedita optio aperiam voluptatem vel ipsum eveniet nemo nostrum quisquam culpa est sit nam, nesciunt molestias repellendus quam dolorum. Consequuntur quis praesentium libero, in cumque facilis.</p>
		</div>
		<div class="column small-12 luceofaq-question">
			<h3>Dignissimos, voluptas, explicabo. Placeat, harum.  <span class="anchor"><a href="#">#</a></span><a href="#" class="button tiny right">Edit</a></h3>
			<p>
				<span class="label">tag6</span>
			</p>
			<p>Et necessitatibus incidunt similique, nesciunt unde porro ex, magni atque voluptate eaque eos? Eaque porro magnam odit voluptate impedit, dolor fuga quasi, repellat ut, voluptatem cum praesentium aliquid laudantium ullam.</p>
		</div>
		<div class="column small-12 luceofaq-question">
			<h3>Cum eaque possimus ullam dicta.  <span class="anchor"><a href="#">#</a></span><a href="#" class="button tiny right">Edit</a></h3>
			<p>
				<span class="label">tag7</span>
				<span class="label">tag15</span>
				<span class="label">tag17</span>
			</p>
			<p>Quam est, tempora sequi et itaque consectetur eum obcaecati nulla sed eius, praesentium in id neque dolore fuga illo excepturi? Ducimus et repellendus minima culpa ipsa, nostrum odit. Perspiciatis, similique!</p>
		</div>
		<div class="column small-12 luceofaq-question">
			<h3>Est cupiditate consequuntur earum, consectetur!  <span class="anchor"><a href="#">#</a></span><a href="#" class="button tiny right">Edit</a></h3>
			<p>
				<span class="label">tag8</span>
				<span class="label">tag11</span>
			</p>
			<p>Optio quasi, ratione! Saepe temporibus, animi. Alias, possimus. Nemo illo beatae porro eligendi! Soluta cumque expedita itaque sapiente, maiores atque, ut pariatur ducimus nesciunt reiciendis harum, ipsum voluptatibus deleniti, optio.</p>
		</div>
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