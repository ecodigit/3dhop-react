# 3DHOP per il Progetto Ecodigit

Visualizzatore di modelli 3D basato su [3DHOP](http://vcg.isti.cnr.it/3dhop/) dell'[ISTI-CNR](https://www.isti.cnr.it/).

Questa versione si propone di automatizzare la generazione della pagina a partire dalle caratteristiche del modello da visualizzare e dalle specifiche esigenze di visualizzazione dell'utente. In particolare costruisce la pagina di visualizzazione richiamando le funzioni necessarie agli strumenti richiesti, passando a queste le opportune variabili.

## Prima mappatura 
Una prima mappatura organizzata si trova nei file:
* 3DobjDescription.yml: vi sono raccolte le caratteristiche degli oggetti 3D descritte da:
    * nome
    * tipologia dato
    * possibili valori
* functionsMap.yaml: vi sono raccolte le funzioni implementabili nella pagina del visualizzatore. Le funzioni sono descritte da:
    * un nome
    * una variabile boolena per indicare se la funzione è attiva oppure no. (Ce ne saranno alcune attive di default, altre da attivare quando selezionate).
    * eventuali valori da passare alla funzione (presi da file descrittore oggetti 3D)
    * eventuali funzioni che vengono chiamate dalla principale con:
        * nome
        * eventuali valori da passare (presi da file descrittore oggetti 3D)

Questa prima mappatura si riferisce alle funzioni presenti in questa prima fase relativa ad una configurazione minimale del visualizzatore. Non viene ad esempio contemplata la possibilità di lavorare con più modelli o l'attivazione di aree (*features*).