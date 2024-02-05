var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function (req, res, next) {

    var teams = [
        'Racing de Ferrol',
        'Cártama Estación',
        'Carratraca FC',
        'Puente Genil FC',
        'Atlético Malagueño',
        'El Palo FC'
    ];

    res.render('teams', { title: 'Teams', teams: teams });
});

module.exports = router;
