<?php
  $_servername = 'localhost';
  $_username = 'root';
  $_password = 'medac';
  $_database = 'db_comics';

  $_conexion = new mysqli($_servername, $_username, $_password, $_database) or die('Error de conexion');
?>