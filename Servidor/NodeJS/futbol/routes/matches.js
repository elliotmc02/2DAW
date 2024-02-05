var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function (req, res, next) {

    var matches = [
        {
            local: 'Barcelona',
            localGoals: 1,
            visitor: 'Madrid',
            visitorGoals: 0
        },
        {
            local: 'Osasuna',
            localGoals: 3,
            visitor: 'Betis',
            visitorGoals: 4
        }
    ];

    res.render('matches', { title: 'Matches', matches: matches });
});

module.exports = router;
