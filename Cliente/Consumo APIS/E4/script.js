const test = {
    'En directo': { 'En directo': [{ 'grupo': '', 'link': '/livescore' }] },
    'España': {
        'Primera división': [{ 'grupo': '', 'link': '/primera' }],
        'Segunda división': [{ 'grupo': '', 'link': '/segunda' }],
        'Copa del Rey': [{ 'grupo': '', 'link': '/copa_del_rey' }],
        'Supercopa de España': [{ 'grupo': '', 'link': '/supercopa' }]
    },
    'Inglaterra': {
        'Premier': [{ 'grupo': '', 'link': '/premier' }],
    },
    'Italia': {
        'Serie A': [{ 'grupo': '', 'link': '/serie_a' }],
    },

    'Alemania': {
        'Bundesliga': [{ 'grupo': '', 'link': '/bundesliga' }],
    },

    'Francia': {
        'Ligue 1': [{ 'grupo': '', 'link': '/ligue_1' }],
    },

    'Liga de Campeones': {
        'Grupos': [{ 'grupo': 'A', 'link': '/champions/grupo1' },
        { 'grupo': 'B', 'link': '/champions/grupo2' },
        { 'grupo': 'C', 'link': '/champions/grupo3' },
        { 'grupo': 'D', 'link': '/champions/grupo4' },
        { 'grupo': 'E', 'link': '/champions/grupo5' },
        { 'grupo': 'F', 'link': '/champions/grupo6' },
        { 'grupo': 'G', 'link': '/champions/grupo7' },
        { 'grupo': 'H', 'link': '/champions/grupo8' }
        ],
        'Eliminatoria': [{ 'grupo': '', 'link': '/champions/eliminatoria' }]
    },

    'Liga Europa de la UEFA': {
        'Grupos': [{ 'grupo': 'A', 'link': '/uefa/grupo1' },
        { 'grupo': 'B', 'link': '/uefa/grupo2' },
        { 'grupo': 'C', 'link': '/uefa/grupo3' },
        { 'grupo': 'D', 'link': '/uefa/grupo4' },
        { 'grupo': 'E', 'link': '/uefa/grupo5' },
        { 'grupo': 'F', 'link': '/uefa/grupo6' },
        { 'grupo': 'G', 'link': '/uefa/grupo7' },
        { 'grupo': 'H', 'link': '/uefa/grupo8' }
        ],
        'Eliminatoria': [{ 'grupo': '', 'link': '/uefa/eliminatoria' }]
    },

    'Liga Conferencia de la UEFA': {
        'Grupos': [{ 'grupo': 'A', 'link': '/conference-league/grupo1' },
        { 'grupo': 'B', 'link': '/conference-league/grupo2' },
        { 'grupo': 'C', 'link': '/conference-league/grupo3' },
        { 'grupo': 'D', 'link': '/conference-league/grupo4' },
        { 'grupo': 'E', 'link': '/conference-league/grupo5' },
        { 'grupo': 'F', 'link': '/conference-league/grupo6' },
        { 'grupo': 'G', 'link': '/conference-league/grupo7' },
        { 'grupo': 'H', 'link': '/conference-league/grupo8' }
        ],
        'Eliminatoria': [{ 'grupo': '', 'link': '/conference-league/eliminatoria' }]
    },

    'Eurocopa': {
        'Grupos': [{ 'grupo': 'A', 'link': '/eurocopa/grupo1' },
        { 'grupo': 'B', 'link': '/eurocopa/grupo2' },
        { 'grupo': 'C', 'link': '/eurocopa/grupo3' },
        { 'grupo': 'D', 'link': '/eurocopa/grupo4' },
        { 'grupo': 'E', 'link': '/eurocopa/grupo5' },
        { 'grupo': 'F', 'link': '/eurocopa/grupo6' },
        ],
        'Eliminatoria': [{ 'grupo': '', 'link': '/eurocopa/eliminatoria' }],
        'Clasificación Eurocopa': [{ 'grupo': 'A', 'link': '/clasificacion_eurocopa/grupo1' },
        { 'grupo': 'B', 'link': '/clasificacion_eurocopa/grupo2' },
        { 'grupo': 'C', 'link': '/clasificacion_eurocopa/grupo3' },
        { 'grupo': 'D', 'link': '/clasificacion_eurocopa/grupo4' },
        { 'grupo': 'E', 'link': '/clasificacion_eurocopa/grupo5' },
        { 'grupo': 'F', 'link': '/clasificacion_eurocopa/grupo6' },
        { 'grupo': 'G', 'link': '/clasificacion_eurocopa/grupo7' },
        { 'grupo': 'H', 'link': '/clasificacion_eurocopa/grupo8' },
        { 'grupo': 'I', 'link': '/clasificacion_eurocopa/grupo9' },
        { 'grupo': 'J', 'link': '/clasificacion_eurocopa/grupo10' },
        ],
    },

    'Liga de las Naciones de la UEFA': {
        'Grupos': [{ 'grupo': 'A', 'link': '/liga_de_las_naciones_de_la_uefa/grupo1' },
        { 'grupo': 'B', 'link': '/liga_de_las_naciones_de_la_uefa/grupo2' },
        { 'grupo': 'C', 'link': '/liga_de_las_naciones_de_la_uefa/grupo3' },
        { 'grupo': 'D', 'link': '/liga_de_las_naciones_de_la_uefa/grupo4' },
        ],
        'Eliminatoria': [{ 'grupo': '', 'link': '/liga_de_las_naciones_de_la_uefa/eliminatoria' }],
        'Playoffs descenso': [{ 'grupo': '', 'link': '/liga_de_las_naciones_de_la_uefa/grupo5' }]
    },

    'Europeo Sub 21': {
        'Grupos': [{ 'grupo': 'A', 'link': '/europeo_sub_21/grupo1' },
        { 'grupo': 'B', 'link': '/europeo_sub_21/grupo2' },
        { 'grupo': 'C', 'link': '/europeo_sub_21/grupo3' },
        { 'grupo': 'D', 'link': '/europeo_sub_21/grupo4' },
        ],
        'Eliminatoria': [{ 'grupo': '', 'link': '/europeo_sub_21/eliminatoria' }]
    },

    'Mundial': {
        'Grupos': [{ 'grupo': 'A', 'link': '/mundial/grupo1' },
        { 'grupo': 'B', 'link': '/mundial/grupo2' },
        { 'grupo': 'C', 'link': '/mundial/grupo3' },
        { 'grupo': 'D', 'link': '/mundial/grupo4' },
        { 'grupo': 'E', 'link': '/mundial/grupo5' },
        { 'grupo': 'F', 'link': '/mundial/grupo6' },
        { 'grupo': 'G', 'link': '/mundial/grupo7' },
        { 'grupo': 'H', 'link': '/mundial/grupo8' }
        ],
        'Eliminatoria': [{ 'grupo': '', 'link': '/mundial/eliminatoria' }]
    },

    'Partidos amistosos': {
        'Partidos amistosos': [{ 'grupo': '', 'link': '/partidos_amistosos' }]
    },
}

console.log(JSON.stringify(test));