import {SparqlEndpointFetcher} from "fetch-sparql-endpoint";
const myFetcher = new SparqlEndpointFetcher();
let a = myFetcher.fetchBindings('http://150.146.207.67/sparql/ds', 'SELECT * WHERE { ?s ?p ?o } LIMIT 100');
a.then(s => {
  s.on("data", (bindings) => console.log(bindings));
});