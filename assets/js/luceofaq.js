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
	// We initialze the events when the "add question" modal is open
	$(document).on('opened.fndtn.reveal', '[data-reveal]', initModalQuestion);

});

/**
 * We binds the events on the elements of the modal
 */
function initModalQuestion() {
	$('#submitQuestion').unbind('click').click(saveQuestion); // Unbind is here to prevent foundation bug of the "opened" event firing twice.
	$('#addTagButton').unbind('click').click(addTagQuestion); // Unbind is here to prevent foundation bug of the "opened" event firing twice.
	$('#questionTagInput').unbind('keypress').keypress(function(e) {
		if(e.which == 13) { // If the user hits enter, we add the tag
			addTagQuestion();
		}
	});
	$(document).foundation();
}

/**
 * Get the informations in the question form, then send an AJAX request to save the question
 */
function saveQuestion()
{
	var id = $('#questionIdInput').val();
	var question = $('#questionLabelInput').val();
	var answer = $('#questionAnswerInput').val();
	if (question && answer && isInt(id)) {

		// We get the tags of the question
		var tags = [];
		$('.tagElement').each(function(){
			tags[tags.length] = {'id' : $(this).data('tagid'), 'name' : $(this).data('tagname')};
		});

		// We fill the args with form data
		var argsArray = [];
		argsArray[argsArray.length] = id;
		argsArray[argsArray.length] = question;
		argsArray[argsArray.length] = answer;
		argsArray[argsArray.length] = tags;

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
 * On click on the "Add" button for tags in the modal, adds the tag in the tags list and binds the events on tags
 * Will be completed with tag autocompletion
 */
function addTagQuestion(){
	event.preventDefault();
	var tagNode = $('#questionTagInput');
	if (tagNode.val() == '') { return false; };
	if (tagNode.val().length > 20) {
		addErrorMessage('Tag lenght can\'t be more than 20 characters', '#addQuestion');
		tagNode.val('');
		return false;
	};
	var tagElement = constructTagElement(tagNode.val());
	$('#tagsList').append(tagElement);
	tagNode.val('').focus();
	initTagsEvents();
}

/**
 * Init tags events : change style on hover and remove on click
 */
function initTagsEvents(){
	$('.tagElement').click(deleteTag).hover(function() {
		$(this).width($(this).width());
		$(this).addClass('alert').text('Remove');
	}, function() {
		$(this).removeClass('alert').text($(this).data('tagname'));
	});
}

/**
 * Construct the tag element
 * Will be completed with tag autocompletion
 * @param  {string} tagName Name of the tag
 * @return {string}         HTML of the tag element
 */
function constructTagElement(tagName){
	var tagElement 	= '<span class="button tagElement" data-tagid="0" data-tagname="' + tagName + '">';
		tagElement += tagName;
		tagElement += '</span>';
	return tagElement;
}

/**
 * Delete a tag node from HTML
 */
function deleteTag(){
	$(this).remove();
}

/**
 * Adds an error message in the .alertBoxDiv of an element
 * @param {string} message     Error message to display
 * @param {string} divToAppend Id of the div element where to display the error
 */
function addErrorMessage(message, divToAppend)
{
	var alertBox = constructAlertBox(message, 'alert');
	appendAlertMessage(alertBox, divToAppend);
}

/**
 * Adds a success message in the .alertBoxDiv of an element
 * @param {string} message     Success message to display
 * @param {string} divToAppend Id of the div element where to display the error
 */
function addSuccessMessage(message, divToAppend)
{
	var alertBox = constructAlertBox(message, 'success');
	appendAlertMessage(alertBox, divToAppend);
}

/**
 * Append the alertBox to the concerned div element
 * @param  {string} alertBox    alert box to display
 * @param  {string} divToAppend Element parent where to display the alert
 */
function appendAlertMessage(alertBox, divToAppend){
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
	var alertBox  = '<div data-alert class="alert-box ' + type + '">';
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