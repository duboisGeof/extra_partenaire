#!/bin/sh
read -p "Saisir le nom du commit : " nom_commit
read -p "Saisir le nom de la branche : " nom_branche
git add --all
git commit -m "$nom_commit"
git push -u origin $nom_branche



