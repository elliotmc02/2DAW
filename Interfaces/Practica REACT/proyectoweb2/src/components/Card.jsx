import React from 'react';

const Card = ({ icono, categoria, descripcion }) => {
    return (
        <div className="card">
            <p className="icon">{icono}</p>
            <h2 className="category">{categoria}</h2>
            <p className="description">{descripcion}</p>
        </div>
    );
};

export default Card;