var filter = document.getElementById('filter');
filter.style.display = 'none';

var btnFilter = document.getElementById('filtro');

var closeSearch = document.getElementById('closeP');
closeSearch.style.color = '#fff';
closeSearch.style.cursor = 'default';

var inputSearch = document.getElementById('inputSearch');

var titulos = document.getElementsByClassName('title');
console.log(titulos);

const titulosFilter = document.getElementsByClassName('span');
console.log(titulosFilter);

function limpaInputSearch () {
    inputSearch.value = '';
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

closeSearch.addEventListener ('click', function (event) {
    limpaInputSearch();
    closeSearch.style.color = '#fff';
    closeSearch.style.cursor = 'default';
})