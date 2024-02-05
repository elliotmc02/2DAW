const express = require('express');
const app = express();
const port = 3000;

app.get('/', (request, responde) => {
    responde.send('Hola mundo');
});

app.get('/adios', (request, response) => {
    response.send('Adios mundo');
});

app.listen(port, () => {
    console.log(`Server running at port ${port}`);
});