// Foundation initialisation
$(document).foundation();

// On DOM ready
$(function()
{

	// Enabling the tag-search accordion
	$( "#accordion" ).accordion({
		collapsible: true,
		active: false
	});

	// Adding the onClick function to add questions
	$('#submitQuestion').click(saveQuestion);

	// Event on modal closure : We remove any alert message displayed inside
	$(document).on('closed.fndtn.reveal', '[data-reveal]', function () {
		var modalId = this.id;
		$('#' + modalId + ' .alertBoxDiv').empty();
	});

});

/**
 * Get the informations in the question form, then send an AJAX request to save the question
 */
function saveQuestion()
{
	var question = $('#questionLabelInput').val();
	var answer = $('#questionAnswerInput').val();
	if (question && answer) {
		alert(question + ' : ' + answer);
		// AJAX call
	} else{
		addErrorMessage('The fields "Question" and "Answer" are mandatory.', '#addQuestion');
	};
}

/**
 * Adds an error message in the .alertBoxDiv of an element
 * @param {string} message     Error message to display
 * @param {string} divToAppend Id of the div element where to display the error
 */
function addErrorMessage(message, divToAppend)
{
	var alertBox = constructAlertBox(message, 'alert');
	$(divToAppend + ' .alertBoxDiv').append(alertBox);
	$(document).foundation();
}

/**
 * Construct alert box HTML depending on type and insert message
 * @param  {string} message Message to display in the alert box
 * @param  {string} type    Type of the alert box : success, warning, info, alert, secondary
 * @return {string}         HTML of the alert box
 */
function constructAlertBox(message, type)
{
	var alertBox = '<div data-alert class="alert-box ' + type + '">';
		alertBox += message;
		alertBox += '<a href="#" class="close">&times;</a>';
	alertBox += '</div>';

	return alertBox;
}