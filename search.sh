#!/bin/sh
read -p "Saisir la recherche : " recherche
find ./ -follow -type f|xargs grep "$recherche" > ./logFind.txt