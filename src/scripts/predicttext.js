function inputlistener(wordlist){
    const input = document.querySelector("#notetext");
    const shadowDisplay = document.querySelector("#shadowtext");

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
/*
        input.addEventListener('input', function(e){
            const result = analyzeString(e, wordlist);
            //const text = input.value;
            //const caretPosition = input.selectionStart;
            console.log('Click event ran');
            console.log(word);
            if (text) {
                start = text.lastIndexOf(' ', caretPosition);
                if (start === -1){
                    start = 0;
                } else {
                    start = start + 1;
                }

                end = text.indexOf(' ', caretPosition);
                if (end === -1){
                    end = text.length;
                }
                
                const word = text.slice(start, end);
                result.lastWord = word;
                console.log(result.lastWord);
                const wordFind = wordlist.find(item => item.startsWith(word));
                if (word) {
                    console.log(wordFind);
                    shadowDisplay.textContent = wordFind;
                } else {
                    shadowDisplay.textContent = "";
                }
            }
            
            let word = text.slice(start, end);
            
            console.log(word);

        });
        */
    }
}

function analyzeString(e, wordlist) {
    const val = e.target.value; // equals the whole string
    const allWords = e.target.value.split(/\s+/); // Words seperated by spaces placed into their own elements into the array
    const lastWord = allWords[allWords.length - 1].toLowerCase(); // last word of the array allWords
    const matches = wordlist.find(word => word.startsWith(lastWord)); // search our words array one by one comparing it to lastWord
    let caretPosition = e.selectionStart;
    let start = val.lastIndexOf(' ', caretPosition);
    if (start === -1) {
        start = 0;
    } else {
        start = start + 1;
    }

    let end = val.indexOf(' ', caretPosition);
    if (end === -1) {
        end = e.length;
    } else {
        end + e.length;
    }

    const currentWord = val.slice(start, end);
    console.log(currentWord);

    console.log(start);
    console.log(end);


    return {
        val: val,
        matches: matches,
        allWords: allWords,
        lastWord: lastWord,
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


