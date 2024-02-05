var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function (req, res, next) {

    var leagues = [
        'premier',
        'bbva'
    ];

    res.render('leagues', { title: 'Leagues', leagues: leagues });
});

module.exports = router;
