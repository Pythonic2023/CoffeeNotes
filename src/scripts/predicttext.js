function inputlistener(){
    const words = ['apple', 'banana', 'orange'];
    typedinput = [];
    let input = document.querySelector("#notetext");
    let shadowDisplay = document.querySelector("#shadowtext");

    if (input) {
        input.addEventListener('keydown', function(e) {
            const val = e.target.value
            const allWords = e.target.value.split(/\s+/);
            const lastWord = allWords[allWords.length - 1].toLowerCase();

            if (lastWord.length >= 2) {
                const matches = words.find(word => word.startsWith(lastWord));
                const prefix = val.substring(0, val.lastIndexOf(lastWord));
                shadowDisplay.textContent = prefix + matches;
                if (e.key === 'Tab'){
                    e.preventDefault();

                    allWords[allWords.length - 1] = matches;
                    e.target.value = allWords.join(" ") + " ";
                    //let length = allWords.join("").length;
                    console.log(length);
                }
            } else {
                shadowDisplay.textContent = "";
            }
        });
        /*
        input.addEventListener('keydown', function(e) {
                if (e.key === 'Tab'){
                    console.log('Tab pressed');
                    e.preventDefault();
                    
                }
            });
        */
    }
}

inputlistener();