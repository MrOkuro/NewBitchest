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



function AfficheFormSolde(url)
{
  console.log(url);
  $.ajax({
    url: url,
    method: "GET"
  }).done(function( data ) {
    console.log('solde ok');
    console.log(data);
    $( "#solde" ).empty().append(data);
  }).fail(function( data ) {
    console.log('solde nok');
    console.log(data);
  });
}