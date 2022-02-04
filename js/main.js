var item = document.getElementsByClassName('item');

console.log(item);

var div = document.getElementById('descritivo');
div.style.display = 'none';

var content = document.getElementById('conteudo');
content.style.display = 'block';

function limpaDescrição () {
   
    div.style.display='none';

    p = document.getElementsByTagName('pt');

    for (var i = 0; i < item.length; i++) {
        if (p.length > 0) {
            p[i].remove();
        }
    }
    
    content.style.display = 'block';

}

function criarDescrição () {
    
    div.style.display = 'block';
    
    var p = document.createElement('pt');
    p.textContent = 'teste';
    p.style.cssText = 
    'color: #fff;' + 
    'backgroud-color: yellow;';
    div.appendChild(p);

    content.style.display = 'none';

}

for (var i = 0; i < item.length; i++) {
    item[i].addEventListener('click', function (event) {
        if (div.style.display == 'none'){
            criarDescrição();
        } else {
            limpaDescrição();
        }
        
    })
}

