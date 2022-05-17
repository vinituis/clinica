var btnMenu = document.getElementById('menu');

var navi = document.getElementsByClassName('nav-item');

btnMenu.addEventListener("click", function (){
    var i = 0;

    if(navi[0].style.display == 'flex'){
        for(var i = 0; i < navi.length; i++){
            navi[i].style.display = 'none';
        }
    } else {
        for(var i = 0; i < navi.length; i++){
            navi[i].style.display = 'flex';
        }
    }

});