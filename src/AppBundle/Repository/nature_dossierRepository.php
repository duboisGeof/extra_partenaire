<?php

namespace AppBundle\Repository;

/**
 * nature_dossierRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class nature_dossierRepository extends \Doctrine\ORM\EntityRepository
{
	
		public function getListeNatureDossier ()
	{
		$connexion = $this->getEntityManager()->getConnection();

        $sql = "select distinct id, libelle from nature_dossier order by id ";

        $statement = $connexion->query($sql);
        return $statement->fetchAll();
	}
}
