import React from 'react';

import Html5Icon from '../img/html5-badge-h-css3-graphics-multimedia-performance-semantics.png';
import FirefoxIcon from '../img/firefox-icon.png';
import ChromeIcon from '../img/chrome.png';
import SafariIcon from '../img/safari.png';
import AndroidIcon from '../img/android.png';
import OperaIcon from '../img/Opera_256x256.png';

import { Link } from 'react-router-dom';


const Footer = () => {
    return (
        <footer id="footer">
            <div className="wrap">
                <div id="menuFooter">
                    <h5>MENÚ</h5>
                    <ul>
                        <li><Link to='/'>INICIO</Link></li>
                        <li><Link to='/articulos'>BLOG/PROYECTOS</Link></li>
                        <li><Link to='/'>FORMACIÓN</Link></li>
                        <li><Link to='/'>CONTACTO</Link></li>
                    </ul>
                </div>
                <div id="location">
                    <h5>DÓNDE ESTAMOS?</h5>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3199.2996623515555!2d-4.462811723546774!3d36.69133637227841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd72f9c45623d2c3%3A0x7a634bd28c0cf953!2sMEDAC%20Nova%20%F0%9F%A5%87%20Centro%20Tecnol%C3%B3gico%20de%20FP!5e0!3m2!1ses!2ses!4v1698701252334!5m2!1ses!2ses"
                        width="600"
                        height="450"
                        title="Google Maps"
                        style={{ border: "0" }}
                        allowFullScreen=""
                        loading="lazy"
                        referrerPolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>
                <div id="info">
                    <h5>Desarrollado con</h5>
                    <p>
                        <img
                            src={Html5Icon}
                            alt="Creado con HTML y CSS"
                        />
                    </p>
                    <h5>Optimizado para</h5>
                    <p id="browsers">
                        <a href="/">
                            <img src={FirefoxIcon} alt="Firefox" />
                        </a>
                        <a href="/">
                            <img src={ChromeIcon} alt="Chrome" />
                        </a>
                        <a href="/">
                            <img src={SafariIcon} alt="Safari" />
                        </a>
                        <a href="/">
                            <img src={AndroidIcon} alt="Android" />
                        </a>
                        <a href="/">
                            <img src={OperaIcon} alt="Opera" />
                        </a>
                    </p>
                    <h5>AUTOR</h5>
                    <p>&copy; Elliot Moyano - 2º WEB</p>
                </div>
            </div>
        </footer>
    );
}

export default Footer;