
function AtualizaJanela(pagina, janela) {
$(function(){
//$("#carregandoJanela_" + janela).show();

/// ajustes pra funcionar no ie
if(pagina.substr(-3,3) == 'php') {
$("#janela_" + janela).load(pagina + '?ie=' +Math.random()); 
} else {
$("#janela_" + janela).load(pagina + '&ie=' +Math.random()); 
}

});
}