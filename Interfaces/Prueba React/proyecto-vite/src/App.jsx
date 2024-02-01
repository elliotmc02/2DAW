// import { useState } from 'react'
// import reactLogo from './assets/react.svg'
// import viteLogo from '/vite.svg'
import './App.css'
import { Buscador, Crear, Footer, Navbar, Header, Listado } from './componentes/Contenidos'

function App() {
  // const [count, setCount] = useState(0)

  return (
    <div className="layout">
      {/*Cabecera*/}
      <Header />

      {/*Barra de navegación*/}
      <Navbar />

      {/*Contenido principal*/}
      <section id="content" className="content">

        {/*aqui van las peliculas*/}
        <Listado n={1} />
        <Listado n={2} />
        <Listado n={3} />
        <Listado n={4} />

      </section>

      {/*Barra lateral*/}
      <aside className="lateral">
        <Buscador />
        <Crear />

      </aside>

      {/*Pie de página*/}
      <Footer />
    </div>
  )
}

export default App
