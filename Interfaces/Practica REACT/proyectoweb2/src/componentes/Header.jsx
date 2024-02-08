import React from 'react';
import { Link } from 'react-router-dom';

const Header = () => {
    return (
        <header id="header">
            <div className="wrap">
                <div id="logo">
                    <span className="gear">S</span>
                    <h3>BLOG</h3>
                </div>
                <nav id="menu">
                    <ul>
                        <li><Link to='/'>Inicio</Link></li>
                        <li><Link to='/articulos'>Ver Artículos</Link></li>
                        <li><Link to='/'>FORMACION</Link></li>
                        <li><Link to='/'>CONTACTO</Link></li>
                    </ul>
                </nav>
            </div>
        </header>
    );
}

export default Header;