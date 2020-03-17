$(document).ready(function() {

    // tableau pour connaitre l'url
    var path = window.location.pathname.split('/');
    var button = '';

    //toggle formulaire demande
    $("#id_r_cnx_btn_code").click(function() {

        if ($('#form_demande').is(':hidden')) $('#form_demande').slideDown();
        else $('#form_demande').slideUp();

    });

    
    $("select").attr("style", "display: unset;");

   

    $('#demandesAttente').DataTable();

    $('#demandesGest').DataTable();

    //Modales pour validation et refus de demande de compte
    var valider;
    $(".valideCompteLink").click(function(e) {
        e.preventDefault();
        valider = $(this).attr("href");
        $("#valideCompteModal").modal("show");
    });

    $("#valideCompteModalNo").click(function(e) {
        $("#valideCompteModal").modal("hide");
    });

    $("#valideCompteModalClose").click(function(e) {
        $("#valideCompteModal").modal("hide");
    });

    $("#valideCompteModalYes").click(function(e) {
        window.location.href = valider;
    });

    var refuser;
    $(".refuseCompteLink").click(function(e) {
        e.preventDefault();
        refuser = $(this).attr("href");
        $("#refuseCompteModal").modal("show");
    });

    $("#refuseCompteModalNo").click(function(e) {
        $("#refuseCompteModal").modal("hide");
    });

    $("#refuseCompteModalClose").click(function(e) {
        $("#refuseCompteModal").modal("hide");
    });

    $("#refuseCompteModalYes").click(function(e) {
        window.location.href = refuser;
    });


    $(".refuseCompteLinks").click(function(e) {
        e.preventDefault();
        $("#refuseCompteModals").modal("show");
    });

    $("#refuseCompteModalNo").click(function(e) {
        $("#refuseCompteModal").modal("hide");
    });

    $("#refuseCompteModalClose").click(function(e) {
        $("#refuseCompteModal").modal("hide");
    });
	    /*Creation d'une table avec Datatable*/
    var table = $('#tablepanier').DataTable();

    

    


    
    
    

    
	
	
 	

    /*Creation évenement click sur le bouton du tableau offre*/

    $("#tablepanier tbody").on('click', '.btn-add', function() {
        /*Récupération donnée de la ligne de la table qu'il y a eu l'évenement */

        var data = table.row($(this).parents('tr')).data();
        /*Récupération du numéro de la ligne de la table qu'il y a eu l'évenement */
        var data2 = table.row($(this).parents('tr'));
        $('.offres_select').append("<li class=" + data2[0] + ">Nom de l'offre:</br>" + data[1] + "</li>");

        //Changement de boutons
        $(this).toggleClass('btn-eff');
        $(this).text("Désinscrire");
    });
    $("#tablepanier tbody").on('click', '.btn-eff', function() {

        var data2 = table.row($(this).parents('tr'));
        //effacer l'info de la ligne que l'on avait ajouté
        $("." + data2[0] + "").remove();
        $(this).addClass('btn-add');
        $(this).text("S'inscrire");
	});

    //Cacher le popup affichant la liste des offres sélectionnées
    $(".pop_offre").hide();
    //Fonction appelée lorsque l'on clique sur le lien Afficher la fenêtre
    $('#afficherPopup').on('click', function() {
        if ($(this).hasClass('selected')) {
            deselect($(this));
        } else {
            $(this).addClass('selected');
            $('.pop_offre').slideFadeToggle();
        }
        return false;
    });
    //Fonction appelée lorsque l'on clique sur le lien Fermer la fenêtre
    $('.close').on('click', function() {
        deselect($('#afficherPopup'));
        return false;
    });

});

//Fonction utilisée pour fermer la popup et enlever la classe selected sur le lien
function deselect(e) {
    $('.pop_offre').slideFadeToggle(function() {
        e.removeClass('selected');
    });
}

//Fonction d'animation de la fenêtre. Elle permet d'afficher ou de masquer la fenêtre
$.fn.slideFadeToggle = function(easing, callback) {
    return this.animate({
        opacity: 'toggle',
        height: 'toggle'
    }, 'fast', easing, callback);
};
