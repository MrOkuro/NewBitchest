function affiche_form_achat(url)
{
  
  var request = $.ajax({
    url: url,
    method: "GET"
  });  
  request.done(function( data ) {
    $( "#form_achat" ).empty().append(data);
  });
}