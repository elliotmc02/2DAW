import React from 'react'
import PropTypes from 'prop-types';

export const Buscador = () => {
    return (
        <div className="search" >
            <h3 className="title">Buscador</h3>
            <form>
                <input type="text" id="search_field" />
                <button id="search">Buscar</button>
            </form>
        </div>
    );
}
export const Crear = () => {
    return (
        <div className="add">
            <h3 className="title">Añadir pelicula</h3>
            <form>
                <input type="text" id="title" placeholder="Titulo" />
                <textarea id="description" placeholder="Descripción"></textarea>
                <input type="submit" id="save" value="Guardar" />
            </form>
        </div>
    );
}
export const Listado = ({ n }) => {
    return (
        <article className="peli-item">
            <h3 className="title">Contenido {n}</h3>
            <p className="description">Descripción {n}</p>

            <button className="edit">Editar</button>
            <button className="delete">Borrar</button>
        </article>
    );
}
Listado.propTypes = {
    n: PropTypes.number.isRequired,
}
export const Footer = () => {
    return (
        <footer className="footer">
            &copy; José Miguel Cabezuelo - Proyecto en REACT
        </footer>
    );
}
export const Navbar = () => {
    return (
        <nav className="nav">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Peliculas</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    );
}
export const Header = () => {
    return (
        <header className="header">
            <div className="logo">
                <div className="play"></div>
            </div>

            <h1>MisPelis</h1>
        </header>
    );
}