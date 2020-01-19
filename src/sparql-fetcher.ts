import {SparqlEndpointFetcher} from "fetch-sparql-endpoint";
var endpoint = 'http://150.146.207.67/sparql/ds';
var query = 'SELECT * WHERE { ?s ?p ?o } LIMIT 100'
const myFetcher = new SparqlEndpointFetcher();
let a = myFetcher.fetchBindings(endpoint, query);
a.then(s => {
  s.on("data", (bindings) => console.log(bindings));
});