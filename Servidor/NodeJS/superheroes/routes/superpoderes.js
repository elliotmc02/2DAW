var express = require('express');
var router = express.Router();

const { MongoClient } = require('mongodb');
const uri = "mongodb://localhost:27017";
const client = new MongoClient(uri);
const database = client.db('superheroes');
const superpoderescollection = database.collection("superpoderes");

/* GET home page. */
router.get('/', async function (req, res, next) {

    const superpoderes = await getAllSuperpoderes();

    res.render('superpoderes/index', { title: 'Superpoderes', superpoderes: superpoderes });
});

const getAllSuperpoderes = async () => {
    try {
        const superpoderes = await superpoderescollection.find({}).toArray();
        return superpoderes;
    } catch (error) {
        throw error;
    }
}

module.exports = router;
