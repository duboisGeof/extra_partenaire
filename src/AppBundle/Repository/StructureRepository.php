<?php

namespace AppBundle\Repository;

/**
 * StructureRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StructureRepository extends \Doctrine\ORM\EntityRepository
{

	public function listeStructure()
    {
		$connexion = $this->getEntityManager()->getConnection();

		$query="SELECT * FROM structure";
        $statement = $connexion->query($query);
		return $statement->fetchAll();
    }
	public function getStructure($id)
    {
		$connexion = $this->getEntityManager()->getConnection();

		$query="SELECT id,nom FROM structure where id=".$id;
        $statement = $connexion->query($query);
		return $statement->fetch();
    }
	
}
