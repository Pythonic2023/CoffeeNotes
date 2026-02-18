function inputlistener(wordlist){
    typedinput = [];
    const input = document.querySelector("#notetext");
    const shadowDisplay = document.querySelector("#shadowtext");

    if (input) {
        input.addEventListener('input', function(e) {
            const val = e.target.value; // equals the whole string
            const allWords = e.target.value.split(/\s+/); // Words seperated by spaces placed into their own elements into the array
            const lastWord = allWords[allWords.length - 1].toLowerCase(); // last word of the array allWords
            if (lastWord.length >= 1) {
                const matches = wordlist.find(word => word.startsWith(lastWord)); // search our words array one by one comparing it to lastWord
                const prefix = val.substring(0, val.lastIndexOf(lastWord)); // lastindexof returns the starting index of the word, and substring takes this and makes a new string excluding the word.
                shadowDisplay.textContent = prefix + matches; // Shadow display the prefix plus matching word 
            } else {
                shadowDisplay.textContent = "";
            }
        });

        input.addEventListener('keydown', function(e) {
            if (e.key === 'Tab'){
                const val = e.target.value;
                const allWords = e.target.value.split(/\s+/); // Words seperated by spaces placed into their own elements into the array
                const lastWord = allWords[allWords.length - 1].toLowerCase(); // last word of the array allWords
                const matches = wordlist.find(word => word.startsWith(lastWord));
                allWords[allWords.length - 1] = matches;
                console.log(allWords);
                e.target.value = allWords.join(" ") + " ";
            } 
        });
    }
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

//inputlistener();
