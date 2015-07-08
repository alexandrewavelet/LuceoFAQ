<?php

	require_once(dirname(dirname(__DIR__)) . '/models/autoload.php');

	$questionList = QuestionActions::getQuestionList();

	foreach ($questionList as $question) {
		?>

			<div class="column small-12 luceofaq-question">
				<h3><?php echo $question->getQuestion(); ?> <span class="anchor"><a href="#">#</a></span><a href="#" class="button tiny right">Edit</a></h3>
				<p>
					<?php
						foreach ($question->getTags() as $tag) {
						?>
							<span class="label"><?php echo $tag->getLabel(); ?></span>
						<?php
						}
					?>
				</p>
				<?php echo nl2br($question->getAnswer()); ?>
			</div>
			<hr>
		<?php
	}
