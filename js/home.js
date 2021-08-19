document.addEventListener("DOMContentLoaded", new function(){
    var a = document.querySelector('.byn1');
    var b = document.querySelector('.byn2');
    var c = document.querySelector('.byn3');

    var gd1=document.querySelector('.m1');
    var gd2=document.querySelector('.m2');
    var gd3=document.querySelector('.m3');
    var gd4=document.querySelector('.m4');

    a.onclick = function(){
        gd1.classList.add('m1_rm');
        gd2.classList.add('m2_add');
        gd3.classList.remove('m3_add');
        gd4.classList.remove('m4_add');
    };
    b.onclick = function(){
        gd1.classList.add('m1_rm');
        gd3.classList.add('m3_add');
        gd2.classList.remove('m2_add');
        gd4.classList.remove('m4_add');
    };
    c.onclick = function(){
        gd1.classList.add('m1_rm');
        gd4.classList.add('m4_add');
        gd2.classList.remove('m2_add');
        gd3.classList.remove('m3_add');
    };

}, false)