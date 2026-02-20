function inputlistener(wordlist){
    const input = document.querySelector("#notetext");
    const shadowDisplay = document.querySelector("#shadowtext");
    const position = input.value.length;
    input.selectionEnd = position;

    if (input) {
        input.addEventListener('input', function(e) {

            const result = analyzeString(e, wordlist);

            if (result.lastWord.length > 1) {
                if (result.matches) {
                    const lastWordIndex = result.val.length - result.lastWord.length;
                    const prefix = result.val.substring(0, lastWordIndex); // lastindexof returns the starting index of the word, and substring takes this and makes a new string excluding the word.
                    shadowDisplay.textContent = prefix + result.matches; // Shadow display the prefix plus matching word 
                } else {
                    shadowDisplay.textContent = "";
                }

            } else {
                shadowDisplay.textContent = "";
            }
        });

        input.addEventListener('keydown', function(e) {
            if (e.key === 'Tab'){
                    const result = analyzeString(e, wordlist);
                if (result.matches) {
                    e.preventDefault();
                    result.allWords[result.allWords.length - 1] = result.matches;
                    e.target.value = result.allWords.join(" ") + " ";
                    e.target.selectionStart = e.target.value.length;
                    e.target.selectionEnd = e.target.value.length;
                    shadowDisplay.textContent = "";
                }
            } 
        });

        input.addEventListener('mouseup', function(e){
            console.log(input.selectionEnd);
        });
    }
}

function analyzeString(e, wordlist) {
    const val = e.target.value; // equals the whole string
    const allWords = e.target.value.split(/\s+/); // Words seperated by spaces placed into their own elements into the array
    const lastWord = allWords[allWords.length - 1].toLowerCase(); // last word of the array allWords
    const matches = wordlist.find(word => word.startsWith(lastWord)); // search our words array one by one comparing it to lastWord
    
    return {
        val: val,
        matches: matches,
        allWords: allWords,
        lastWord: lastWord
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


