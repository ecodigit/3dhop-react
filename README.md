# Prototipo visualizzatore 3DHOP per Ecodigit
## Descrizione
Questo prototipo ha il compito di automatizzare la visualizzazione di modelli 3D, generando dinamicamente la pagina di 3DHOP a partire dai metadati dell'oggetto. Il prototipo è pensato per essere agganciato al prototipo di pagina di ricerca.

## Istruzioni
Build image:  
`docker build -t 3dhop_ecodigit .`  
Run docker:  
`docker run -p 127.0.0.1:5001:80/tcp -d --name 3dhop_ecodigit 3dhop_ecodigit`  
Stop container:  
`docker stop 3dhop_ecodigit`  
Start container:  
`docker start 3dhop_ecodigit`
