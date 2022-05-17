var filter = document.getElementById('filter');
filter.style.display = 'none';

var btnFilter = document.getElementById('filtro');

var inputSearch = document.getElementById('inputSearch');

var titulos = document.getElementsByClassName('title');
console.log(titulos);

const titulosFilter = document.getElementsByClassName('span');
console.log(titulosFilter);

var msg = document.getElementById('msgP');

function limpaInputSearch () {
    inputSearch.value = '';
    msg.innerHTML = '';
    
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
        closeSearch.style.cursor = 'pointer';
    }
})

var filtro = document.getElementById("inputSearch");
var fornecedor = document.querySelectorAll(".item");

filtro.addEventListener("input", function() {
    if(this.value.length > 0){
        for( var i = 0; i < fornecedor.length; i++) {
            var item = fornecedor[i];
            var eNome = item.querySelector(".nome-solucao");
            var nome = item.textContent;
            var expressao = new RegExp(this.value,"i");
            if(!expressao.test(nome)){
                item.classList.add("invisivel");
                itemPai = item.parentNode;
                itemPai.classList.add("invisivel");
                
            }else{
                item.classList.remove("invisivel");
                itemPai = item.parentNode;
                itemPai.classList.remove("invisivel");
            }
        }
    }else{
        for(var i = 0; i < fornecedor.length; i++) {
            var item = fornecedor[i];
            item.classList.remove("invisivel");
            itemPai = item.parentNode;
            itemPai.classList.remove("invisivel");
        }
    }
});