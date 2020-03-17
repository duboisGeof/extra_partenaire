<?php

namespace AppBundle\Repository;

/**
 * transmission_dossierRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class transmission_dossierRepository extends \Doctrine\ORM\EntityRepository
{
	//partie partenaire : récapitulatif
    public function getTransmission($partenaire,$NbJoursRecup) {
        $connexion=$this->getEntityManager()->getConnection();
		
        $sql = "SELECT t.id as id,n.libelle as demande_id,d.libelle as decision,nom_patro,dateReception,observation,naissance,agent,tel,nom_mari,prenom,dateInstruction,ordreArchivage,observationPart,observationInter,agentCPAM,numDossier,dateTransmission,numDossier,DATEDIFF(dateInstruction,dateReception) AS delai from transmission_dossier t, nature_dossier n, type_decision d WHERE dateReception is not Null and partenaire_id=".$partenaire." and PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<".$NbJoursRecup." and demande_id=n.id and decision_id=d.id";

        $statement = $connexion->query($sql);

        return $statement->fetchAll();
	}
	//Partie partenaire, dossiers en cours = dossiers qui n'ont pas de dates de réception
	public function getDossierCoursPartenaire($partenaire) {
        $connexion=$this->getEntityManager()->getConnection();

        //$sql = "SELECT t.id as id,n.libelle as demande,d.libelle as decision,nom_patro,dateReception,observation,naissance,agent,tel,nom_mari,prenom,dateInstruction,numeroSemaine,ordreArchivage,observationPart,agentCPAM,numDossier,dateTransmission,numDossier from transmission_dossier t, nature_dossier n, type_decision d WHERE partenaire_id=$partenaire and dateReception is Null and demande_id=n.id and decision_id=d.id";
		$sql = "SELECT t.id as id,n.libelle as demande,nom_patro, dateReception, observation, naissance, agent,tel, nom_mari,prenom,numDossier, urgence,pj from transmission_dossier t, nature_dossier n WHERE partenaire_id=".$partenaire." and dateReception is Null and demande_id=n.id";
        $statement = $connexion->query($sql);

        return $statement->fetchAll();
	}
		//Partie gestionnaire
	    public function getTransmissionAll() {
        $connexion=$this->getEntityManager()->getConnection();
        $sql = " SELECT partenaire_id,t.id as id, s.nom as nomStructure, max(t.dateTransmission) as lastDate, count(t.id) as nbDossier 
		from transmission_dossier t, nature_dossier n, type_decision d, structure s WHERE demande_id=n.id and decision_id=d.id and partenaire_id=s.id GROUP BY partenaire_id";
        $statement = $connexion->query($sql);
 
        return $statement->fetchAll();
	}
	
		public function getTransmissionEnCours($partenaire,$NbJoursRecup) {
        $connexion=$this->getEntityManager()->getConnection();
		$sql = "SELECT t.id as id,n.libelle as demande_id,d.libelle as decision,nom_patro,dateReception,observation,naissance,agent,tel,nom_mari,prenom,dateInstruction,ordreArchivage,observationPart,observationInter,agentCPAM,numDossier,dateTransmission,numDossier,DATEDIFF(dateInstruction,dateReception) AS delai from transmission_dossier t, nature_dossier n, type_decision d WHERE dateReception is not Null and partenaire_id=".$partenaire." and PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<".$NbJoursRecup." and demande_id=n.id and t.decision_id=d.id and d.id=1";
        $statement = $connexion->query($sql);
 
        return $statement->fetchAll();
	}
	
		public function getNewsTransmission() {
        $connexion=$this->getEntityManager()->getConnection();
        //$sql = " SELECT partenaire_id,t.id as id, s.nom as nomStructure, max(t.dateTransmission) as lastDate, count(t.id) as nbDossier from transmission_dossier t, nature_dossier n, type_decision d, fos_user u, structure s WHERE demande_id=n.id and decision_id=d.id and partenaire_id=u.id and u.structure_id=s.id and dateReception IS NULL GROUP BY partenaire_id";
		
		//modif sylvie le 02.03.2020
		$sql = " select t.partenaire_id,t.id as id, s.nom as nomStructure, max(t.dateTransmission) as lastDate, count(t.id) as nbDossier from transmission_dossier t,  structure s where s.id=t.partenaire_id GROUP BY t.partenaire_id";
			
        $statement = $connexion->query($sql);
 
        return $statement->fetchAll();
	}
	
    public function getById($id){
        $connexion=$this->getEntityManager()->getConnection();
        $sql = " SELECT partenaire_id,t.id as id,demande_id, decision_id,nom_patro,dateReception,observation,naissance,agent,tel,nom_mari,prenom,dateInstruction,ordreArchivage,observationPart,observationInter,agentCPAM,numDossier,dateTransmission,numDossier,DATEDIFF(dateInstruction,dateReception) AS delai from transmission_dossier t, nature_dossier n, type_decision d where t.id=".$id." and demande_id=n.id and decision_id=d.id";
        $statement = $connexion->query($sql);
        return $statement->fetch();
    }
	
    public function updateDateReception($date){
        $connexion=$this->getEntityManager()->getConnection();
        //$sql = " UPDATE transmission_dossier set dateReception='$date' where dateReception IS NULL and numeroSemaine=$Semaine";
		$sql = " UPDATE transmission_dossier set dateReception='".$date."' where dateReception IS NULL";

        $statement = $connexion->query($sql);
	}
    
    public function SidateReceptionNULL($partenaire){
        $connexion=$this->getEntityManager()->getConnection();
        $sql = " SELECT count(partenaire_id) AS nbdate_reception from transmission_dossier where partenaire_id=".$partenaire." AND dateReception IS NULL";
        $statement = $connexion->query($sql);
        return $statement->fetch();
	}

	/*public function getNumeroSemaine($partenaire){
        $connexion=$this->getEntityManager()->getConnection();
        $sql = "select numeroSemaine from transmission_dossier t where partenaire_id='$partenaire' and not numeroSemaine='' and not dateReception is null group by numeroSemaine";
        $statement = $connexion->query($sql);
        return $statement->fetchAll();
	}*/
	/************************************************ Statistiques ***********************************************************/
		//////////////////////Nbre total dossiers transmis PUMA+CMUC/ACS+AME (hors mise à jour)/////////////////////
	public function StatsNbHorsMAJ($jour,$partenaire){
        $connexion=$this->getEntityManager()->getConnection();
		$sql = "select count(*) as NbHorsMAJ from transmission_dossier where PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<".$jour." and demande_id in (select id from nature_dossier where id Between 1 and 17 and not id = 5) $partenaire";
        $statement = $connexion->query($sql);
        return $statement->fetch();
	}
		//////////////////////Part dossiers complet transmis PUMA+CMUC/ACS+AME (hors mise à jour)/////////////////////
	public function StatsPartHorsMAJ($jour,$partenaire){
        $connexion=$this->getEntityManager()->getConnection();
		$sql = "select count(*) as part from transmission_dossier, type_decision d where PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' and decision_id=d.id and demande_id in (select id from nature_dossier where id Between 1 and 17 and not id = 5) and not decision_id=1 and not d.libelle like '%demande de p%' $partenaire";
        $statement = $connexion->query($sql);
        return $statement->fetch();
	} 
		////////////////////Nombre total de dossiers par partenaire ou tous/////////////////////
	public function StatsNbTotal($jour,$partenaire){
        $connexion=$this->getEntityManager()->getConnection();
		$sql = " SELECT count(t.id) as nbDossier from transmission_dossier t WHERE PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' and dateReception is not NULL $partenaire";       
        $statement = $connexion->query($sql);

        return $statement->fetch();
	}    
		////////////////////Nombre partenaire où il y a délai négatif/////////////////////
	public function StatsNbPartenaireDelaiNegatif($jour,$partenaire){
        $connexion=$this->getEntityManager()->getConnection();
		$sql = "select count(distinct(partenaire_id)) as somme from transmission_dossier where PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' and DATEDIFF(dateInstruction,dateReception)<0 $partenaire";       
        $statement = $connexion->query($sql);

        return $statement->fetch();
	} 

		/////////////////////Nombre de délai de traitement négatif/////////////////////
	public function StatsNbDelaiNegatif($jour,$partenaire){
        $connexion=$this->getEntityManager()->getConnection();
		$sql = "select count(*) as NbDelaiNegatif from transmission_dossier where PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' and DATEDIFF(dateInstruction,dateReception)<0 $partenaire";       
        $statement = $connexion->query($sql);

        return $statement->fetch();
	}

		//////////////////////Nombre de dossiers qui ont un délai de traitement <=30 Jours/////////////////////
	public function StatsNbDelaiMoinsMois($jour,$partenaire){
        $connexion=$this->getEntityManager()->getConnection();
		$sql = "select count(*) as nb from transmission_dossier where PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' and DATEDIFF(dateInstruction,dateReception)<=30 $partenaire";       
        $statement = $connexion->query($sql);

        return $statement->fetch();
	}   
		////////////////////////Delai traitement moyen selon la demande/////////////////////
	public function StatsDelaiMoyen($jour,$demande,$partenaire){
        $connexion=$this->getEntityManager()->getConnection();
			$sql = "select avg(DATEDIFF(dateInstruction, dateReception)) as val from transmission_dossier t, nature_dossier n where PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' and demande_id=n.id and n.libelle $demande and dateInstruction is not null $partenaire";		       
        $statement = $connexion->query($sql);
        return $statement->fetch();
	}

			////////////////////////Delai traitement moyen cas particulier concerne que Décisions autres/////////////////////
	public function StatsDelaiMoyenCasParticulier($jour,$demande,$partenaire){
        $connexion=$this->getEntityManager()->getConnection();
		$sql = "select avg(DATEDIFF(dateInstruction, dateReception)) as val from transmission_dossier t, type_decision n where PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' and decision_id=n.id and n.libelle $demande and dateInstruction is not null $partenaire";       
        $statement = $connexion->query($sql);
		//dump($sql);
        return $statement->fetch();
	}
			////////////////////////Delai traitement moyen cas particulier concerne que Décisions autres/////////////////////
	public function StatsDelaiMoyenMAJCMUC($jour,$partenaire){
        $connexion=$this->getEntityManager()->getConnection();
		$sql = "select avg(DATEDIFF(dateInstruction, dateReception)) as val from transmission_dossier t, type_decision d, nature_dossier n  where PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' and decision_id=d.id
		and demande_id=n.id and (d.libelle like '%taires MUTATION%' or d.libelle like '%taires divers%' or d.libelle like '%mise à jour%') and not (n.libelle like '%AME mise à jour%' or n.libelle like '%AME recours gracieux%' )
		and dateInstruction is not null $partenaire";       
        $statement = $connexion->query($sql);
        return $statement->fetch();
	} 
			////////////////////////Delai traitement moyen Total/////////////////////
	public function StatsDelaiMoyenTotal($jour,$partenaire){
        $connexion=$this->getEntityManager()->getConnection();
		$sql = "select avg(DATEDIFF(dateInstruction, dateReception)) as val from transmission_dossier t, type_decision n where PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' and decision_id=n.id and dateInstruction is not null $partenaire";       
        $statement = $connexion->query($sql);
		//dump($sql);
        return $statement->fetch();
	} 
		////////////////////////Nb selon la décision  /////////////////////
	public function StatsNbDecision($jour,$decision,$partenaire){
        $connexion=$this->getEntityManager()->getConnection();
		if ($decision=="like '%accord CMUC ACS%'")
		{
			$sql = "select count(*) AS nb from transmission_dossier t, type_decision n where PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' and decision_id=n.id and ( n.libelle like '%accord CMUC%' OR n.libelle Like '%accord ACS%') $partenaire";  
		}else if($decision=='like "%taires MUTATION%" or n.libelle like "%taires divers%" or n.libelle like "%mise à jour%"'){
			$sql = "select count(*) AS nb from transmission_dossier t, type_decision n where PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' and decision_id=n.id and ( n.libelle like '%taires MUTATION%' or n.libelle like '%taires divers% ' or n.libelle like '%mise à jour%') $partenaire";  
		}
		else{
			$sql = "select count(*) AS nb from transmission_dossier t, type_decision n where PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' and decision_id=n.id and n.libelle $decision $partenaire";  	
		}
     
        $statement = $connexion->query($sql);
		//dump($sql);
        return $statement->fetch();
	}   
		////////////////////////Nb selon la demande  /////////////////////
	public function StatsNbDemande($jour,$demande,$partenaire){
        $connexion=$this->getEntityManager()->getConnection();
		$sql = "select count(*) AS nb from transmission_dossier t, nature_dossier n where PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' and demande_id=n.id and n.libelle $demande and not decision_id=1 $partenaire";       
        $statement = $connexion->query($sql);
		//dump($sql);
		return $statement->fetch();
	} 
		////////////////////////Nb MAJ AME /////////////////////
	public function StatsNbMAJAME($jour,$demande1,$partenaire){
        $connexion=$this->getEntityManager()->getConnection();
		$sql = "select count(*) AS nb from transmission_dossier t, nature_dossier n where PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' and demande_id=n.id and (n.libelle $demande1)  and decision_id=20 $partenaire";       
        $statement = $connexion->query($sql);
		//dump($sql);
		return $statement->fetch();
	}   
			/*********************************Indicateur SPPR*********************************************/
	public function Somme_delai_dateInstruc_M($jour,$Mois,$partenaire){
        $connexion=$this->getEntityManager()->getConnection();
		$sql = "select sum(DATEDIFF(dateInstruction,dateReception)) as somme_delai from transmission_dossier t where month(dateInstruction)=$Mois and decision_id in (select id from type_decision where not libelle like '%demande de pièces complémentaires CMUC ACS%' and (libelle like '%CMUC%' or libelle like '%ACS%')) and PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' $partenaire";       
        $statement = $connexion->query($sql);
		//dump($sql);
		return $statement->fetch();
	} 
	public function Nb_dossier_dateRecep_M($jour,$Mois,$partenaire){
        $connexion=$this->getEntityManager()->getConnection();
		$sql = "select count(t.id) as nbDossier_dateRecept  from transmission_dossier t where month(dateReception)=$Mois and PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' and not demande_id is null  $partenaire";       
        $statement = $connexion->query($sql);
		//dump($sql);
		return $statement->fetch();
	} 
	public function Nb_dossier_dateInstruc_M($jour,$Mois,$partenaire){
        $connexion=$this->getEntityManager()->getConnection();
		$sql = "select count(t.id) as nbDossier_dateInstru from transmission_dossier t where month(dateInstruction)=$Mois and decision_id in (select id from type_decision where not libelle like '%demande de pièces complémentaires CMUC ACS%' and (libelle like '%CMUC%' or libelle like '%ACS%')) and PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(dateTransmission,'%Y%m'))<'$jour' $partenaire";       
        $statement = $connexion->query($sql);
		//dump($sql);
		return $statement->fetch();
	} 
	/*******************************************************************************************************************/
}
