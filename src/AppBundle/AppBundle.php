<?php

namespace AppBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Doctrine\DBAL\Types\Type;

class AppBundle extends Bundle{
	
	/*public function boot()
        {
            $em = $this->container->get('doctrine.orm.entity_manager');

            // Ajout des nouveaux types à notre entity manager
            Type::addType('blob', 'AppBundle\ORM\BlobType');
            $em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('blob', 'blob');
        }*/
}
