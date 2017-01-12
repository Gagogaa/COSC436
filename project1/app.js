/*
	Gregory Mann
	people.emich.edu/gmann1
	COSC 436
	Assignment 01/05
	WINTER 2017
	This project searches and replaces strings of text within a text area.
	It loads a specified UTF-8 file from the users machine to do the searching. 
*/

// search replace replace clauses replace to make a duplicate of the file and append it to the end
// TODO make readfile part of the search_replace object
function init(){
	window.search_replace = (function () { // search_replace is a global object
		var textArea = document.querySelector("textArea"),
				pointer = -1,
				searchText = textArea.value,
				searchTerm = "",
				matches = [],
				obj = {};

		// getMatches takes a body of text and a search term (baseStr, searchStr)
		// Returns an array consisting of every matches starting index
		function getMatches(baseStr, searchStr){
			var indexes = [],
					nextIndex = 0;

			for(var i = 0; /* nothing */; i++){
				nextIndex = baseStr.indexOf(searchStr, nextIndex);

				if(nextIndex === -1) // no match found 
					break;
				
				indexes[i] = nextIndex;
				nextIndex++;
			}
			return indexes;
		}

		// replace replaces the currently highlighted search result with the replace term
		obj.replace = function (){
			if(matches.length > 0){
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

				if(pointer > 0)
					pointer = pointer - 1; // decrement pointer so search() doesn't accidently skip a match

				obj.search();
			}
		};

		// search will highlight matches one at a time in sequential order 
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

			if(pointer === matches.length - 1) // wrap around after highlighting the last match
				pointer = -1;
			
			pointer = pointer + 1;
			textArea.focus();
			textArea.setSelectionRange(matches[pointer], matches[pointer] + searchTerm.length);
		}

		return obj;
	})(); // END: search_replace
} // END: init

// Read file pickup from http://www.alecjacobson.com/weblog/?p=1645
function readFile(){
	var file = document.getElementById("fileInput").files[0];

	if (file) {
		var reader = new FileReader();

		reader.readAsText(file, "UTF-8");

		reader.onload = function (event) {
			var text = event.target.result;
			document.getElementById("textArea").value = text;
			document.getElementById('filenput').disabled = true;
		}
	}
}
