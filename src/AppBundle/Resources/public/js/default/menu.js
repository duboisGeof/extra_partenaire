$(document).ready(function() {  
	// Par defaut, le sous menus est caché
    $(".navigation ul.subMenu").hide();
	
	// Si on se trouve sur un element d'un sous menu, alors on ouvre le sous menu, on mets le lien où l'on se trouve en surbrillance
	// On modifie le sens de la fleche
	if ($("a").hasClass("active")) {
		//var test = $(this).find('subMenuActive');
		var lienActive = $(this).find('li.toggleSubMenu a.active');
	 	arrow = lienActive.parent().parent().parent().find("i");
	 	arrow.removeClass("right");
        arrow.addClass("down");
	 	lienActive.parent().parent().slideDown("normal");
		lienActive.parent().parent().parent().addClass("subMenuActive"); 
		$(".subMenuActive").find("a").addClass("linkVisible");
		$(".subMenuActive").find("a").removeClass("hover");
	}else{
		$(".subMenuActive").find("a").addClass("lol");
	}
    
	// Action quand on click sur le menu ayant un sous menu
    $(".navigation li.toggleSubMenu > a").click(function() {
		// Change le sens de la fleche
        arrow = $(this.childNodes);
        arrow.removeClass("right");
        arrow.addClass("down");
		$(".subMenuActive").find("a").addClass("hover");
		
		// Initialise les valeurs par defaut (Pas de classe active, pas de classe visible, fleche a droite)
		$(".navigation li.toggleSubMenu > a").parent().not(this).removeClass("subMenuActive")
		$(".navigation li.toggleSubMenu > a").not(this).removeClass("linkVisible")
		$(".navigation li.toggleSubMenu > a i").not(this).removeClass("down")
		$(".navigation li.toggleSubMenu > a i").not(this).addClass("right")
		
        // Si le sous-menu était déjà ouvert, on le referme :
        if ($(this).next("ul.subMenu:visible").length != 0) {
            $(this).next("ul.subMenu").slideUp("normal");
            $(this).parent().removeClass("subMenuActive");
            $(".toggleSubMenu").find("a").removeClass("linkVisible");
			$(this).addClass("hover");
            arrow.removeClass("down");
            arrow.addClass("right");
			// Si on referme le menu, on remet le bottom par defaut
			$(".wlp-bighorn-footer").css("bottom", "0px");
        }
        // Si le sous-menu est caché, on ferme les autres et on l'affiche :
        else {
            $(".navigation ul.subMenu").slideUp("normal");
            $(this).next("ul.subMenu").slideDown("normal");
            $(this).parent().addClass("subMenuActive");
		 	$(this).removeClass("hover");
            $(".subMenuActive").find(".niveau2 a").addClass("linkVisible");
			 arrow.removeClass("right");
        	arrow.addClass("down");
			// Si on ouvre le menu, on descend le footer
			//$(".wlp-bighorn-footer").css("bottom", "-200px");
        }
        // On empêche le navigateur de suivre le lien :
        return false;
    });
		
});
