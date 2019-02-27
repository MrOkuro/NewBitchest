function AfficheFormVente(obj)
{
	console.log('form vente ok');
	console.log(obj);
  crypto_id = obj.options[obj.selectedIndex].value;
  $('#Vente').show();
  $.ajax({
    url: '/client/crypto/form/vente/'+crypto_id,
    method: "GET"
  }).done(function( data ) {
    $( "#Vente" ).empty().append(data);
  });
}