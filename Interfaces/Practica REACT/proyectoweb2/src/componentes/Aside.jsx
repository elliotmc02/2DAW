import React from 'react';

const Aside = () => {
    return (
        <aside id="lateral">
            <h3>BUSCAR</h3>
            <div id="search">
                <form>
                    <input type="text" />
                    <input type="button" value="L" className="icon" />
                </form>
            </div>
            <h3>LOGIN</h3>
            <div id="login" className="caja-lateral">
                <form>
                    <label id="user" className="icon">U</label>
                    <input type="email" />
                    <label id="password" className="icon">w</label>
                    <input type="password" />
                    <input type="submit" value="Entrar" />
                    <input type="reset" value="Limpiar" />
                    <a href="/">Regístrate aquí</a>
                    <a href="/">Has olvidado tu contraseña?</a>
                </form>
            </div>
            <h3>REDES SOCIALES</h3>
            <div id="social" className="caja-lateral">
                <div className="twitter">
                    <a href="/" className="icon">t</a>
                    <p className="overlay">Twitter</p>
                </div>
                <div className="facebook">
                    <a href="/" className="icon">f</a>
                    <p className="overlay">Facebook</p>
                </div>
                <div className="youtube">
                    <a href="/" className="icon">y</a>
                    <p className="overlay">Youtube</p>
                </div>
            </div>
            <h3>PATROCINADORES</h3>
            <div id="sponsors" className="caja-lateral"></div>
        </aside>
    );
}

export default Aside;