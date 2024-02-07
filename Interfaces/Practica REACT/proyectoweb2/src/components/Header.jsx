import React from 'react';

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
                        <li><a href="/">INICIO</a></li>
                        <li><a href="/blog">BLOG/PROYECTOS</a></li>
                        <li><a href="/">FORMACIÓN</a></li>
                        <li><a href="/">CONTACTO</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    );
}

export default Header;