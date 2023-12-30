<header>
    <nav class="mi-nav">
        <ul class="mi-nav-list mis-items">
            <?php $url = basename($_SERVER["REQUEST_URI"]); ?>
            <li><a href="<?php echo $url == 'notificaciones.php' ? '../' : './' ?>">Ver Deudas</a></li>
            <li><a href="<?php echo $url == 'notificaciones.php' ? '' : 'views/notificaciones.php' ?>">Notificaciones</a></li>
        </ul>
        <ul class="mi-nav-list">
            <li><a class="texto-rojo" href="<?php echo $url == 'notificaciones.php' ? 'funciones/cerrar_sesion.php' : 'views/funciones/cerrar_sesion.php' ?>">Cerrar Sesión</a></li>
        </ul>
    </nav>
</header>