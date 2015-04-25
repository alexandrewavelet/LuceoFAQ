<?php

	require_once(dirname(dirname(__DIR__)) . '/models/autoload.php');
	
	$tagsList = TagActions::getTagsList();

	?>

	<ul class="small-block-grid-4" id="searchTagList">

		<?php

			foreach ($tagsList as $tag) {
				?>

					<li class="switch">
						<input type="checkbox" <?php echo 'id="tag'.$tag->getId().'"'; ?>>
						<label <?php echo 'for="tag'.$tag->getId().'"'; ?>></label>
						<span class="tag-accordion"><?php echo $tag->getLabel().' ('.$tag->getNumberOfQuestions().')'; ?></span>
					</li>

				<?php
			}

		?>

	</ul>
