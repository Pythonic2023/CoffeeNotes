function inputlistener(wordlist){
    const input = document.querySelector("#notetext");
    const shadowDisplay = document.querySelector("#shadowtext");

    if (input) {

        input.addEventListener('input', function(e) {

            const result = analyzeString(e, wordlist);

            if (result.currentWord && result.currentWord.length > 0) {
                if (result.matches) {
                    //const prefix = result.val.substring(0, lastWordIndex); // lastindexof returns the starting index of the word, and substring takes this and makes a new string excluding the word.
                    const prefix = result.val.substring(0, result.start); // lastindexof returns the starting index of the word, and substring takes this and makes a new string excluding the word.
                    shadowDisplay.textContent = prefix + result.matches; // Shadow display the prefix plus matching word 
                } else {
                    shadowDisplay.textContent = " ";
                }

            } else {
                shadowDisplay.textContent = " ";
            }
        });

        input.addEventListener('keydown', function(e) {
            if (e.key === 'Tab'){
                    const result = analyzeString(e, wordlist);
                if (result.matches) {
                    e.preventDefault();
                    const beforeText = result.val.substring(0, result.start);
                    const afterText = result.val.substring(result.end);
                    e.target.value = beforeText + result.matches + " " + afterText;
                    const newCaretPos = result.start + result.matches.length + 1;
                    e.target.selectionStart = newCaretPos;
                    e.target.selectionEnd = newCaretPos;
                    shadowDisplay.textContent = "";
                }
            } 
        });

    }
}

function analyzeString(e, wordlist) {
    let matches = undefined;
    const val = e.target.value; // equals the whole string
    let caretPosition = e.target.selectionStart;
    let start = val.lastIndexOf(' ', caretPosition - 1);
    let end = val.indexOf(' ', caretPosition);
    const allWords = e.target.value.split(/\s+/); // Words seperated by spaces placed into their own elements into the array
    const lastWord = allWords[start + end]; // last word of the array allWords
    
    if (start === -1) {
        start = 0;
    } else {
        start = start + 1;
    }

    if (end === -1) {
        end = val.length;
    } else {
        end = end;
    }

    const currentWord = val.slice(start, end).trim();

    if (currentWord.length > 0) {
        matches = wordlist.find(word => word.startsWith(currentWord.toLowerCase())); // search our words array one by one comparing it to lastWord
    }

    console.log(currentWord);
    console.log(start);
    console.log(end);

    return {
        val: val,
        matches: matches,
        allWords: allWords,
        lastWord: lastWord,
        currentWord: currentWord,
        caretPosition: caretPosition,
        start: start,
        end: end, 
    };
}

async function getWordList() {
    const url = "http://127.0.0.1:8080/sgb-words.txt";
    console.log('retrieved word list');
    try {
        const retrievewords = await fetch(url);

        if (!retrievewords.ok) {
            throw new Error(`Error retrieving: ${retrievewords.status}`);
        }

        const data = await retrievewords.text();
        const wordarray = data.split('\n');
        inputlistener(wordarray);
    } catch (error) {
        console.error(error);
    }
}


getWordList();


