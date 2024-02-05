const http = require('http');
const host = '127.0.0.1';
const port = 8000;

const server = http.createServer((request, response) => {
    response.writeHead(200, { 'Content-Type': 'text/plain' });
    response.end('Hola mundo');
});

server.listen(port, host, () => {
    console.log(`Server running at port ${port}`);
});