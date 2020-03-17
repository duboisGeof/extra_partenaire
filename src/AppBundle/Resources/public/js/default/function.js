// Recupère l'id (bdo) qui se trouve dans une class/id
function recupId(divclass) {
	// Récupère la dernier class de la loupe qui contient l'id => "id1"
	recup_class = $(divclass).attr('class').split(' ').pop();
	// Récupère l'id sans le mot "id" avant le chiffre
	recup_id = recup_class.split("id");
	//console.log("lol "+recup_class)
	// Supprime la virgule avant l'id
	id = recup_id.slice(1);
	//alert($(this).attr('class'));
	return id
} 

function messageFlash(){
	$(".alert").fadeTo(2000, 500).slideUp(500, function(){
		$(".alert").slideUp(500);
	});   
}