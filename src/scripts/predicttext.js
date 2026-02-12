function shadowtext(){
    const input = document.querySelector("#notetext");
    if (input) {
    input.addEventListener('input', function() {
        console.log('Received input');
    });
    }
}

shadowtext();