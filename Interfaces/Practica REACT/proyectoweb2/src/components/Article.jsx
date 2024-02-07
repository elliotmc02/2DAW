import React from 'react';
const Article = ({ articulo }) => {
    const { price, title, category, description } = articulo;
    return (
        <article>
            <div className="datos">
                <span>Precio: {price}</span>
                <span>Categoría: {category}</span>
            </div>
            <h4>
                <a href="/">{title}</a>
            </h4>
            <p>{description}</p>
        </article>
    );
};

export default Article;