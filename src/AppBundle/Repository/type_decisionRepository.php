<?php

namespace AppBundle\Repository;

/**
 * type_decisionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class type_decisionRepository extends \Doctrine\ORM\EntityRepository
{
	    public function getListeDecision(){
         return $this->createQueryBuilder('decision')
          ->where(1)	;
			
	}
}