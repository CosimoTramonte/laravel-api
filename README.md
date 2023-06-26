# Laravel Boolfolio - Base

Creiamo con Laravel il nostro sistema di gestione del nostro Portfolio di progetti.

Oggi iniziamo un nuovo progetto che si arricchirà nel corso delle prossime lezioni: man mano aggiungeremo funzionalità e vedremo la nostra applicazione crescere ed evolvere.

## Descrizione:

Ripercorriamo gli steps fatti a lezione ed iniziamo un nuovo progetto usando laravel breeze ed il pacchetto Laravel 9 Preset con autenticazione.

Separamo gli ambienti Guest da quelli Admin per quanto riguarda stili, js, controller, viste e layout come abbiamo visto in classe.
Per ora è importante avere gli ambienti puliti e separati e non preoccupatevi che siano “belli”. 

L’importante è che tutto il flusso, sia guest che admin funzioni correttamente.

Ognuno di voi immagini quali dati servono per un portfolio e quindi generate la migration.
Il seeder è opzionale, l’importante che tutta la CRUD funzioni correttamente con tutte le funzionalità viste

BONUS: in edit e create sostituire la textarea con un CK Editor come visto in classe

continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo e aggiungiamo una nuova entità **Type**. Questa entità rappresenta la tipologia di progetto ed è in relazione **one to many** con i progetti.
I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:
- creare la migration per la tabella `types`
- creare il model `Type`
- creare la migration di modifica per la tabella `projects` per aggiungere la chiave esterna
- aggiungere ai model Type e Project i metodi per definire la relazione one to many
- visualizzare nella pagina di dettaglio di un progetto la tipologia associata, se presente
- permettere all’utente di associare una tipologia nella pagina di creazione e modifica di un progetto
- gestire il salvataggio dell’associazione progetto-tipologia con opportune regole di validazione

Bonus 1:
creare il seeder per il model Type e il seeder della tabella ‘projects’ con l’id del type (random) in relazione

Bonus 2:
aggiungere le operazioni CRUD per il model Type, in modo da gestire le tipologie di progetto direttamente dal pannello di amministrazione.
