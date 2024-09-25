$(document).ready(function () {
    setTimeout(function (){
$('[data-tab]').click(function(e){
    var tab_id = $(this).attr('data-tab');
    $('[data-tab].ativo').removeClass('ativo')
    $('.ativo').removeClass('ativo');
    $($(this)).addClass('ativo')
    $("#"+tab_id).addClass('ativo');
    
})
},1000);
}); 