/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    var altura = $('.menu').offset().top;
    $(window).on('scroll', function(){
        if( $(window).scrollTop() >= 300 ){//hace una evaluacion si la altura es menor hasta el inicio de la pagina
            $('.menu').addClass('menu-fixed');
        }else{
            $('.menu').removeClass('menu-fixed');
        }
    });
});
