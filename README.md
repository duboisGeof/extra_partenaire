# PHPK - Skeleton

## Création du projet

### Étape 1 - Récupération du package

Tout d'abord, téléchargez le bundle via **Composer** :

`composer create-project cnamts/phpk/skeleton`

Cette action va télécharger le Skeleton SK PHP et l'ensemble de ses dépendances

### Étape 2 - Activation des dépendances

Ensuite, activez les bundles PHPKCoreBundle, PHPKWebProfilerBundle et AsseticBundle en les ajoutant
dans la liste des bundles enregistrés dans votre fichier `app/AppKernel.php` :

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new CNAMTS\PHPK\CoreBundle\PHPKCoreBundle(),

        );
        
        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            // ...
            $bundles[] = new CNAMTS\PHPK\WebProfilerBundle\PHPKWebProfilerBundle();
        }

        // ...
    }

    // ...
}
```

### Étape 3 - Finalisation

- Rendez la page `web/app_dev.php` accessible si elle ne l'est pas
- Donnez les droits en écriture sur les répertoires `app/cache`, `app/logs` et `app/sessions`

Votre application est désormais disponible à l'adresse suivante :
http://IP/repertoire/web/app_dev.php
