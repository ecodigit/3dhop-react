# Prototipo visualizzatore 3DHOP per Ecodigit
## Descrizione
Questo prototipo ha il compito di automatizzare la visualizzazione di modelli 3D, generando dinamicamente la pagina di 3DHOP a partire dai metadati dell'oggetto. Il prototipo è pensato per essere agganciato al prototipo di pagina di ricerca.  
In questo prototipo la pagina di ricerca è sostituita dalla pagina `index.php` che *simula* i risultati di una ricerca con i tre modelli identificati per il dimostratore del progetto.  


## Istruzioni
Build image:  
`docker build -t 3dhop_ecodigit .`  
Run docker:  
`docker run -p 127.0.0.1:5001:80/tcp -d --name 3dhop_ecodigit 3dhop_ecodigit`  
Stop container:  
`docker stop 3dhop_ecodigit`  
Start container:  
`docker start 3dhop_ecodigit`  

## Todo list
#### Versione base
 - [ ] *gatherer.php*: php per interrogare lo SPARQL-Endopoint ed ottenere i metadati utili al visualizzatore
 - [x] Generazione dinamica della pagina per modelli singoli
 - [x] Generazione dinamica con unità di misura
 - [x] Generazione dinamica con tutte le funzioni attivate
#### Versione completa 
 - [ ] Generazione dinamica della pagina per modelli costituiti da *N* sottomodelli
 - [ ] Generazione dinamica di *N* hotspot
 - [ ] Generazione dinamica con selezione delle funzioni attivate
