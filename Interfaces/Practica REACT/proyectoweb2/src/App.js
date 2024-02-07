import './App.css';
import React, { useEffect, useState } from 'react';

// import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';

import Header from './components/Header';
import Card from './components/Card';
import Aside from './components/Aside';
import Article from './components/Article';
import Footer from './components/Footer';

import fetchApi from './api/api';

function App() {

  const [articulos, setArticulos] = useState([]);

  useEffect(() => {
    (async () => {
      setArticulos(await fetchApi());
    })();
  }, []);

  return (
    <div>
      <Header />
      <main className="wrap">
        <section id="info">
          <div id="banner">
            <h1>Diseño de CSS por Elliot Moyano</h1>
          </div>
          <div id="cards">
            <Card icono={'H'} categoria={'Desarrollo Web'} descripcion={'Aprende los principales lenguajes para desarrollar Webs. ¡Conviértete en Web Master!'} />
            <Card icono={'_'} categoria={'Sistemas Operativos'} descripcion={'Aprende a administrar sistemas operativos linux y windows.'} />
            <Card icono={'S'} categoria={'Hardware'} descripcion={'Conoce los entresijos del hardware.'} />
            <Card icono={'u'} categoria={'Redes e Internet'} descripcion={'Aprende a configurar y administrar redes informáticas y servidores.'} />
            <Card icono={'a'} categoria={'Bases de Datos'} descripcion={'Aprende a instalar y administrar bases de datos.'} />
          </div>
        </section>
        <div className="clearfix"></div>
        <section className="main-container">
          <Aside />
          <section id="articles">
            <h2>Últimos artículos</h2>
            <div className="clearfix"></div>
            {articulos.map(articulo => <Article key={articulo.id} articulo={articulo} />)}
            <article id="blog">
              <a href="/blog">Ir al Blog/Proyectos</a>
            </article>
          </section>
        </section>
      </main>
      <Footer />
    </div>
  );
}

export default App;