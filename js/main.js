// function carregaCatalogo() {
//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             carregaXml(this);
//         }
//     };
//     xhr.open('GET' , './js/xml/empresas.xml' , true);
//     xhr.send();
// }

// function carregaXml(xml) {
//     var docXML = xml.responseXML;
//     var card = "";
//     var empresas = docXML.getElementsByTagName('empresa');
//     for (var i = 0; i<empresas.length; i++) {
//         card += "<div class='item'><img src='";
//         card += empresas[i].getElementsByTagName('imagem')[0].textContent;
//         card += "' onclick='carregaCatalogo();'></div>";
//     }

//     document.getElementById('manufatura').innerHTML = card;
// }

// carregaCatalogo();

var item = document.getElementsByClassName('item');

console.log(item);

var div = document.getElementById('descritivo');
div.style.display = 'none';

var content = document.getElementById('conteudo');
content.style.display = 'block';

var filter = document.getElementById('filter');
filter.style.display = 'none';

var btnFilter = document.getElementById('filtro');

var closeSearch = document.getElementById('closeP');
closeSearch.style.color = '#fff';

var inputSearch = document.getElementById('inputSearch');

function limpaInputSearch () {
    inputSearch.value = '';
}

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
    
    // var p = document.createElement('pt');
    // p.textContent = 'teste';
    // p.style.cssText = 
    // 'color: #fff;' + 
    // 'backgroud-color: yellow;';
    // div.appendChild(p);

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

btnFilter.addEventListener ('click', function (event) {
    if (filter.style.display == 'none'){
        filter.style.display = 'block';
    } else {
        filter.style.display = 'none';
    }
    
})

inputSearch.addEventListener ('click', function (event) {
    if (closeSearch.style.color == 'rgb(255, 255, 255)') {
        closeSearch.style.color = '#696969';
    }
})

closeSearch.addEventListener ('click', function (event) {
    limpaInputSearch();
    closeSearch.style.color = '#fff';
})