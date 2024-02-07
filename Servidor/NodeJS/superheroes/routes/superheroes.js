var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function (req, res, next) {

    const superheroes = [
        'manolo',
        'paco',
        'bonifacio'
    ];

    res.render('superheroes/index', { title: 'Superheroes', superheroes: superheroes });
});

module.exports = router;
