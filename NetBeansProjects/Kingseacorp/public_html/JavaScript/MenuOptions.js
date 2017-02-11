/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(Menu);//hasta que se cargue el documento se ejecuta main

var contador=1;

function Menu(){
    $('.Menu').click(function(){
        if(contador==1){
            $('nav').animate({
                left:'0'
            });
            contador=0;
        }else{
            $('nav').animate({
                left:'-100%'
            });
            contador=1;
        }
    });
    $('.Inicio').click(function(){
        $(this).children('.SubMenu').slideToggle();
    });
}
