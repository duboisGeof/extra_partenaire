<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
/**
 * TypeStructureRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TypeStructureRepository extends \Doctrine\ORM\EntityRepository
{

	public function listeType()
    {
		$connexion = $this->getEntityManager()->getConnection();

		$query="SELECT * FROM type_structure";
        $statement = $connexion->query($query);
		return $statement->fetchAll();
		
    }
}