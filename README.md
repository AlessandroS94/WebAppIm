# Realizzazione di una web application di pubblicazione delle immagini.

## Requisiti:
Realizzare un’unica pagina (homepage) che mostra:
1. immagini prese da un database
2. un pulsante per caricare (upload) una nuova foto
3. un paginatore
4. un filtro di ricerca
5. una serie di comandi per l'ordinamento (select o pulsanti)
6. un selettore (select o pulsante) per cambiare visualizzazione (vedi punto 5)
7. un pulsante per attivare/disattivare la visualizzazione delle immagini escluse (vedi punto 7)
8. Le immagini (il loro path) e le altre informazioni sono memorizzati in un database a scelta
9. Ogni immagine deve avere un titolo, un’immagine (file), ed una data di caricamento
10. Nella homepage l’utente avrà la possibilità di visualizzare le immagini come lista (tabella) in cui ogni riga ha: titolo, immagine, data oppure come una griglia di “card” in cui ogni card avrà immagine, titolo e data. Sarà quindi necessario un pulsante per passare dalla visualizzazione tabellare a griglia e viceversa
11. L'utente potrà decidere se ordinare per data, per titolo o in ordine casuale.
12. L’utente ha un pulsante per escludere una o più immagini. Se ad esempio esclude la prima, quando ricarica la pagina quell’immagine deve essere esclusa. Il sito deve mantenere escluse le immagini che l’utente aveva escluso anche in altre sessioni. Se viene attivata la visualizzazione delle immagini escluse queste dovranno avere uno stile diverso e riconoscibile ed un pulsante per riammetterle alla visualizzazione standard.
13. Implementare una ricerca per sito che mostra solamente le immagini che nel titolo hanno la/le parola/e inserite o anche una parte di esse (se ho un’immagine con il titolo “gatti” e cerco “gatt”, l’immagine mi viene restituita tra i risultati.
14. L'utente deve avere la possibilità di caricare nuove immagini inserendo il file e il titolo.
15. BONUS: se l'immagine contiene metadati (coordinate, data dello scatto etc.) mostrarle assieme altre informazioni.
16. BONUS: se l'immagine contiene tra i metadati estrarre la località e mostrare il meteo attuale interrogando  https://open-meteo.com/ o servizi simili
17. BONUS: se l'immagine contiene tra i metadati la località e la data dello scatto mostrare i meteo storico
