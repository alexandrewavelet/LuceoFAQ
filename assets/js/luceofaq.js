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

	// the question form is loaded via AJAX, we bind the click event to the button when the modal opens
	$(document).on('opened.fndtn.reveal', '[data-reveal]', function () {
		$('#submitQuestion').unbind('click').click(saveQuestion); // Unbind is here to prevent foundation bug of the "opened" event firing twice.
		$(document).foundation();
	});

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
	var id = $('#questionIdInput').val();
	var question = $('#questionLabelInput').val();
	var answer = $('#questionAnswerInput').val();
	if (question && answer && isInt(id)) {

		// We fill the args with form data
		var argsArray = [];
		argsArray[argsArray.length] = id;
		argsArray[argsArray.length] = question;
		argsArray[argsArray.length] = answer;

		// AJAX call
		var params = {
			phpclass:'QuestionActions',
			method:'saveQuestion',
			args: argsArray
		}

		sendAjaxRequest(params, afterQuestionAdded, handleErrorPage);
	} else{
		addErrorMessage('The fields "Question" and "Answer" are mandatory.', '#addQuestion');
	};

	// Cancel the click on the button
	return false;
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

function addSuccessMessage(message, divToAppend)
{
	var alertBox = constructAlertBox(message, 'success');
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

/**
 * Executes an AJAX request to the AJAX controller
 * @param  {array} params        		Contains the class, method, and params of the behavior to execute
 * @param  {function} successFunction 	Function to fire in case of success
 * @param  {function} failFunction    	Function to fire in case of PHP error
 */
function sendAjaxRequest(params, successFunction, failFunction)
{
	successFunction = (typeof successFunction === 'undefined') ? '' : successFunction;
	failFunction = (typeof failFunction === 'undefined') ? handleErrorPage : failFunction;

	$.ajax({
		method: 'POST',
		url: 'actions/ajaxactions.php',
		data: params,
		dataType: 'json',
		success: function (response) {
			if (!response.error) {
				if(typeof successFunction === 'function') {
					successFunction(response);
				}
			} else {
				if(typeof failFunction === 'function') {
					failFunction(response.message);
				}
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			handleErrorPage('Something unexpected happened :(');
			console.log(textStatus + ' : ' + errorThrown);
		}
	});
}

/**
 * Function fired after saving a question to DB : close the modal, refresh the question list
 * @param  {json} ajaxResponse Informations about the question added/saved
 */
function afterQuestionAdded(ajaxResponse)
{
	console.log('Question id added : ' + ajaxResponse.id);
	addSuccessMessage(ajaxResponse.message, '#alertPanePage');
	$('#addQuestion').foundation('reveal', 'close');
}

/**
 * Adds an error to the page and close the modal
 * @param  {string} message Error message to display
 */
function handleErrorPage(message)
{
	addErrorMessage(message, '#alertPanePage');
	$('#addQuestion').foundation('reveal', 'close');
}

/**
 * Check if the param is an integer
 * @param  {mixed}  	value var to test
 * @return {Boolean}    true if value is an integer, false otherwise
 */
function isInt(value) {
	return !isNaN(value) && (function(x) { return (x | 0) === x; })(parseFloat(value))
}