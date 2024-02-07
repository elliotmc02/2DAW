const apiUrl = 'https://fakestoreapi.com/products?limit=6';

const fetchApi = async () => {
    return await fetch(apiUrl)
        .then(response => response.json())
        .then(data => data)
        .catch(error => console.log('error', error));
};

export default fetchApi;