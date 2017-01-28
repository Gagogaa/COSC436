/**
 * Gregory Mann
 * people.emich.edu/gmann1
 * COSC 436
 * Assignment 01/12
 * WINTER 2017
 * This project searches and replaces strings of text within a text area.
 * It loads a specified UTF-8 file from the users machine to do the searching.
 */

function init(){

	/**
	 * Search_replace is an object that contains methods for loading a file
	 * into a text area, searching it's contents for a string, and replacing
	 * the matched string with another string.
	 */
	window.search_replace = (function () { // Search_replace is a global object
		var textArea = document.querySelector("textArea"),
				pointer = -1,
				searchText = textArea.value,
				searchTerm = "",
				matches = [],
				obj = {};
 
		/**
		 * Returns an array containing the starting index of
		 * each instance of searchStr in baseStr.
		 *
		 * @param {String} baseStr
		 * @param {String} searchStr
		 */
		function getMatches(baseStr, str){
			var indexes = [],
					nextIndex = 0,
					searchStr;
			
			var swappedChars = function (str){
				var array = [],
						temp,
						temp2;
				
				for(var i = 0; i < str.length - 1; i++){
					temp = str.charAt(i);
					temp2 = str.charAt(i + 1);

					array[i] = str.slice(0, i) + temp2 + temp + str.slice(i + 2, str.length);
				}
				return array;
			}(str);
			
			var removedChars = function (str){
				var array = [];
				for(var i = 0; i < str.length; i++){
					array[i] = str.slice(0, i)  + (i !== str.length - 1 ? str.slice(i - str.length + 1) : "");
				}
				return  array;
			}(str);

			searchStr = str + "|" + swappedChars.join("|") + "|" + removedChars.join("|"); 

			var testReg = new RegExp(searchStr, "gm"),
					myArray = [],
					i = 0;

			while((myArray = testReg.exec(baseStr)) !== null){
				indexes[i] = testReg.lastIndex - str.length;
				i++;
			}

			return indexes;
		}

		/**
		 * Reads a UTF-8 file from an input[type = file] element
		 * and assigns the value of the text to the textarea.
		 *
		 * With help from this link: http://www.alecjacobson.com/weblog/?p=1645
		 */
		obj.readFile = function(){
			var file = document.getElementById("fileInput").files[0];

			if (file) {
				var reader = new FileReader();

				reader.readAsText(file, "UTF-8");

				reader.onload = function (event) {
					var text = event.target.result;

					document.getElementById("textArea").value = text;
					searchText = textArea.value;
					pointer = -1;

					if(searchTerm == ""){
						matches = [];
					}else{
						matches = getMatches(searchText, searchTerm);
					}
					obj.search();
				} //END: onload
			}
		}; // END: readFile

		/**
		 * Replaces the currently highlighter search result with
		 * the value in the input[id="replaceParam"] element.
		 */
		obj.replace = function (){
			var newTerm = document.getElementById("searchParam").value;

			if (newTerm !== searchTerm) // Don't replace if search term has changed since last search
				return;

			if(matches.length !== 0){
				searchText = textArea.value;

				var newWord = document.getElementById("replaceParam").value,
						startStr = searchText.substring(0, matches[pointer]),
						replaceText= searchText.substring(matches[pointer]),
						regExp = new RegExp(searchTerm),
						finalText = "";

				replaceText = replaceText.replace(regExp, newWord);
				finalText = startStr + replaceText;
				searchText = finalText;
				textArea.value = finalText;

				searchText = textArea.value;
				matches = getMatches(searchText, searchTerm);

				if(pointer !== -1)
					pointer = pointer - 1; // Decrement pointer so search() doesn't accidentally skip a match

				obj.search();
			}
		};

		/**
		 * Search will highlight each instance of the value in
		 * input[id="searchParam"] one at a time in sequential
		 * order within the textarea.
		 */
		obj.search = function (){
			var newSearch = document.getElementById("searchParam").value;
			searchText = textArea.value;

			if(searchTerm !== newSearch){ // If the word in the search box has changed
				pointer = -1;
				searchTerm = newSearch;

				if(searchTerm == ""){
					matches = [];
				}else{
					matches = getMatches(searchText, searchTerm);
				}
			}

			if(pointer === matches.length - 1) // Wrap around after highlighting the last match
				pointer = -1;

			pointer = pointer + 1;

			textArea.focus();
			scrollTo(textArea, matches[pointer]);
			textArea.setSelectionRange(matches[pointer], matches[pointer] + searchTerm.length);
		};

		return obj;
	})(); // END: search_replace

	// Link: google chrome scroll fix from: http://stackoverflow.com/questions/7464282/javascript-scroll-to-selection-after-using-textarea-setselectionrange-in-chrome#7464299

	/**
	 * Scroll textarea to position.
	 *
	 * @param {HTMLInputElement} textarea
	 * @param {Number} position
	 */
	function scrollTo(textarea, position) {
		if (!textarea) { return; }
		if (position < 0) { return; }

		var body = textarea.value;
		if (body) {
			textarea.value = body.substring(0, position);
			textarea.scrollTop = position;
			textarea.value = body;
		}
	}
} // END: init
