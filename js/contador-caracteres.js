var dor = document.getElementById('dor');

dor.addEventListener('keypress', function(e){
    var maxChar = 250;
    var n = document.getElementById('n-caracteres');
    inputLength = dor.value.length;
    n.textContent = inputLength + 1 + '/250';
    if(inputLength >= 249) {
        n.textContent = '250/250';
    }
    dor.addEventListener('keydown', function(e){
        inputLength = dor.value.length;
        n.textContent = inputLength - 1 + '/250';
        if(inputLength < maxChar) {
            dor.style.border = 'none';
            n.style.color = '';
        }
        if(inputLength <= 0){
            n.textContent = '0/250';
        }
        

    });

    if(inputLength >= maxChar) {
        e.preventDefault();
        dor.style.border = '2px solid red';
        n.style.color = 'red';
    }
});