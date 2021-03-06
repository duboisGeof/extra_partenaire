<?php

namespace AppBundle\Repository;

/**
 * newsletterRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class newsletterRepository extends \Doctrine\ORM\EntityRepository
{
    public function getListe() {
        $connexion=$this->getEntityManager()->getConnection();
        $sql = "select 
				newsletter.id, newsletter.titre, newsletter.content, newsletter.dateCreation, fos_user.username 
                from newsletter
                left join fos_user 
                on newsletter.user_id = fos_user.id";
        $statement = $connexion->query($sql);
        return $statement->fetchAll();
    }
	
	public function getById($id){
		$connexion=$this->getEntityManager()->getConnection();
        $sql = "select * from newsletter";
        $statement = $connexion->query($sql);
        return $statement->fetchAll();
	}
	
	public function getLastNewsletter(){
		$connexion=$this->getEntityManager()->getConnection();
        $sql = "SELECT id, content FROM newsletter ORDER BY ID DESC LIMIT 1";
        $statement = $connexion->query($sql);
		dump($sql);
        return $statement->fetch();
	}
}
