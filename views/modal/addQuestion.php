<h3 id="modalTitle">Add a question</h3>
<div class="alertBoxDiv"></div>
<form>
	<input type="hidden" value="0" id="questionIdInput">
	<div class="row">
		<div class="large-12 columns">
			<label>Question
				<input type="text" id="questionLabelInput" required/>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="large-12 columns">
			<label>Answer
				<textarea id="questionAnswerInput" rows="6" required></textarea>
			</label>
		</div>
	</div>
	<fieldset>
		<legend>Tags</legend>
		<div class="column small-12">
			<div class="row">
				<div class="small-12 columns">
					<div class="row collapse">
						<div class="small-10 columns">
							<input type="text" placeholder="Enter a tag name...">
						</div>
						<div class="small-2 columns">
							<a href="#" class="button postfix">Add</a>
						</div>
					</div>
				</div>
				<div class="small-12 column">
					<h4>Current tags</h4>
				</div>
			</div>
		</div>
	</fieldset>
	<div class="row">
		<div class="column small-12">
			<input type="submit" class="button" id="submitQuestion" value="Add the question" />
		</div>
	</div>
</form>
<a class="close-reveal-modal" aria-label="Close">&#215;</a>