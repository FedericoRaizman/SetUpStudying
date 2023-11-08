<?php 
  session_start();

function listadoDirectorio($directorio){
  $listado = scandir($directorio);	    
  unset($listado[array_search('.', $listado, true)]);    
  unset($listado[array_search('..', $listado, true)]);
  if (count($listado) < 1) {
      return;
  }
  

  foreach($listado as $elemento){
      if(!is_dir($directorio.'/'.$elemento)) {
          echo "<li>- <a href='$directorio/$elemento'>$elemento</a></li>";
      }
      if(is_dir($directorio.'/'.$elemento)) {
          echo '<li class="open-dropdown"><a href="?folder_name='.$elemento.'">+ '.$elemento.'</a></li>';
         //echo '<ul class="dropdown d-none">';
             //listadoDirectorio($directorio.'/'.$elemento);
          //echo '</ul>';
      }
  }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Pantalla principal</title>
  <style>
    /* Estilos previos */
    body {
      overflow: hidden; /* Oculta la barra de tareas */
      font-family: Arial, sans-serif;
      background-color: #EBEFFF;
    }

    .linea-horizontal {
  border: 1px solid rgba(97, 97, 97, 0.5); /* Color con nivel de transparencia */
  margin: 5px 0; /* Ajusta el espacio entre la línea y las secciones */
}

    .linea-hori{
  border: 3px solid rgb(255, 0, 0); /* Color con nivel de transparencia */
  margin: 5px 0; /* Ajusta el espacio entre la línea y las secciones */
    }



    .form button {
  border: none;
  background: none;
  color: #8846dd;
}
/* styling of whole input container */
.form {
  --timing: 0.3s;
  --width-of-input: 200px;
  --height-of-input: 40px;
  --border-height: 2px;
  --input-bg: #fff;
  --border-color: #e92e2e;
  --border-radius: 30px;
  --after-border-radius: 1px;
  position: relative;
  width: var(--width-of-input);
  height: var(--height-of-input);
  display: flex;
  align-items: center;
  padding-inline: 0.8em;
  border-radius: var(--border-radius);
  transition: border-radius 0.5s ease;
  background: var(--input-bg,#fff);
  margin-left:-12px;
  margin-bottom: 19px;
}
/* styling of Input */
.input {
  font-size: 0.9rem;
  background-color: transparent;
  width: 100%;
  height: 100%;
  padding-inline: 0.5em;
  padding-block: 0.7em;
  border: none;
}
/* styling of animated border */
.form:before {
  content: "";
  position: absolute;
  background: var(--border-color);
  transform: scaleX(0);
  transform-origin: center;
  width: 100%;
  height: var(--border-height);
  left: 0;
  bottom: 0;
  border-radius: 1px;
  transition: transform var(--timing) ease;
}
/* Hover on Input */
.form:focus-within {
  border-radius: var(--after-border-radius);
}

input:focus {
  outline: none;
}
/* here is code of animated border */
.form:focus-within:before {
  transform: scale(1);
}
/* styling of close button */
/* == you can click the close button to remove text == */
.reset {
  border: none;
  background: none;
  opacity: 0;
  visibility: hidden;
}
/* close button shown when typing */
input:not(:placeholder-shown) ~ .reset {
  opacity: 1;
  visibility: visible;
}
/* sizing svg icons */
.form svg {
  width: 17px;
  margin-top: 3px;
}
.container-menu {
    background-color: #656ED3;
    width: 200px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: -200px; /* Inicialmente oculto fuera de la pantalla */
    z-index: 10;
    border-radius: 5px;
    padding: 35px;
    transition: left 0.8s; /* Agregar transición para un efecto suave */
}

/* Mostrar el menú al pasar el cursor sobre el contenedor */
.container-menu:hover {
    left: 0;
}

/* Desactivar el evento :hover en el área de la search box */
.searchBox {
    pointer-events: none;
}

/* Ocultar secciones cuando el contenedor está oculto */
.container-menu:not(:hover) .secciones {
    display: none;
}

    .seccion {
      margin: 10px 0;
      display: flex;
      align-items: center; /* Alinea verticalmente hacia el centro */
    }

    .seccion i {
      margin-right: 30px; /* Espacio entre el icono y el texto */
    }

    /* Mostrar secciones cuando el contenedor se abre */
    .container-menu:hover .secciones {
      display: flex;
      flex-direction: column;
      margin-top: 20px;
    }
    

    


    .user-info {
  text-align: center;
  margin-bottom: 30px;
  margin-top: -20px;
  margin-left: -120px;
  color: white;
  font-size: 14px; /* Establece el tamaño de la letra en 14px o ajusta el valor según tus preferencias */
}

    #cerrarSesion{
        margin-right:8px;
    }

    .home {
    float: left;
    /* Añade otros estilos para la sección "home" según tus necesidades */
}

#Fotoent {
    float: right;
    margin: 10px;
    width: 29px;
    height: auto;
    margin-right: -13px; /* Ajusta el valor según tu preferencia */
    margin-top: 60px;
}

#Fotoentr {
    float: right;
    margin: 10px;
    width: 25px;
    height: auto;
    margin-right: -36.6px; /* Ajusta el valor según tu preferencia */
    margin-top: 100px;
}

#Fotoentra {
    float: right;
    margin: 10px;
    width: 25px;
    height: auto;
    margin-right: -36.5px; /* Ajusta el valor según tu preferencia */
    margin-top: 145px;
}

#Fotoentrad {
    float: right;
    margin: 10px;
    width: 24px;
    height: auto;
    margin-right: -37px; /* Ajusta el valor según tu preferencia */
    margin-top: 185px;
}

    /* Cambiar el icono de cerrar sesión */
.cerrar-sesion i {  
  background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAATFJREFUOE+dU9FtwlAQs5OqTRoqMQIj0AkQE7RMQJgAmCAdASYoTNBu0G5QNigj8NHmJRKJqxclEqAESO/nSad7PvvOR5SRJJoKmAHoVTkSGxAr75bLKnf60iZMqlcJzxRs4edBUQ9ElGeYBwHf60D4YxS6RARh6PvcNnVqZBAn+gKwvve4aPvZ1tMk0l4YPvg8pF6LZdneEE8S5hXbVgDGyM7ko0AvJbcCqGjFsRaOi3EGTI4AilUS/WtmYbfm8GQGxiiEg8G1AAR2rSVI6qYpohyw6z+WcKmzHSIdvEnoZnuMOh1uWjEoJBJj7w4jkrvKB9+5sA58vlxiUGvlJNHM+l05Hv9lZYv6a7RyiIFyLDN7gWW4Qp8Opnth0uTU4hqLizQKRUyJIx9sIaz9M/L+AGfkrjsr92lUAAAAAElFTkSuQmCC');
  
}
    .iconocerrar{
    margin-top: 0 0 100px 0;
    
    }

    .container-menu a {
      text-decoration: none; /* Quuitar subrayado de los enlaces */
      color: white; /* Cambiar el color del texto de los enlaces si es necesario */
    }

    /* Estilo para los enlaces cuando se pasa el cursor por encima */
    .container-menu a:hover {
      text-decoration: underline; /* Subrayar los enlaces al pasar el cursor por encima */
    }

    /* Mover la sección "Cerrar Sesión" hacia abajo del contenedor */
    .cerrar-sesion {
     margin-top: 280px;
     margin-right: 30px; /* Espacio entre el icono y el texto */
    }
    .user-info img {
  width: 50px; /* Cambia el ancho de la imagen */
  height: 50px; /* Cambia la altura de la imagen */
  margin-left: 11px;
}
.user-info img {
  display: inline-block; /* Coloca la imagen junto al texto */
  vertical-align: middle; /* Alinea verticalmente la imagen con el texto */
}

.user-info p {
  display: inline-block; /* Puedes aplicar esto para el párrafo si es necesario */
  vertical-align: middle; /* Alinea verticalmente el párrafo con la imagen */
}

.searchBox {
  display: flex;
  max-width: 400px;
  max-height: 55px; /* Reducimos la altura máxima */
  align-items: center;
  justify-content: space-between;
  gap: 8px;
  background: #33333300;
  border-radius: 50px;
  position: relative;
  margin-left: 500px;
  border: 1px solid #333333; /* Agregar un borde fino gris oscuro */
}



.searchButton {
  color: white;
  position: absolute;
  right: 8px;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: var(--gradient-2, linear-gradient(90deg, #782af5 0%, #656ED3 100%));
  border: 0;
  display: inline-block;
  transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
}
/*hover effect*/
button:hover {
  color: #fff;
  background-color: #1A1A1A;
  box-shadow: rgba(0, 0, 0, 0.5) 0 10px 20px;
  transform: translateY(-3px);
}
/*button pressing effect*/
button:active {
  box-shadow: none;
  transform: translateY(0);
}

.searchInput {
  border: none;
  background: none;
  outline: none;
  color: white;
  font-size: 15px;
  padding: 24px 46px 24px 26px;
}

.btn {
 width: 8.5em;
 height: 2.8em;
 margin: 0.5em;
 background: #656ED3;
 color: white;
 border: none;
 border-radius: 0.625em;
 font-size: 20px;
 font-weight: bold;
 cursor: pointer;
 position: relative;
 z-index: 1;
 overflow: hidden;
 margin-left: 300px;
 margin-top: -60px;
}

button:hover {
 color: white;
}



</style>

</head>
<body>

  <div class="container-menu">
    <div class="user-info">
      <img src = "data:image/png;base64,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" id = "cerrarSesion"> 
      <p>USER</p>
          </div>
    <div class="secciones">
      <form class="form">
        <button>
            <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search">
                <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9" stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>
        <input class="input" placeholder="Buscar en tu cuenta" required="" type="text">
        <button class="reset" type="reset">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </form>
      <a href="pantallaprincipal.html">
        <div class="seccion">
          <img src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IArs4c6QAAAVRJREFUOE/V1N1NwzAQB3BfPmxFykNHKBuwQckGdIKGCRghzQTABIQJYIOGDdigjNCHSJEvH4euiiM3hJZUlRB5Tfzz+e7vgLjwAxf2xEmwLMu567ob3rhpmigIgs9jRRwFDUZE74wAwOIU+iNYFMW1lPKVMaVUzKDWOmMUEZdhGH6MVToKdtiGiJ6UUmt7odZ6DQD3iBiNod9ArfUtADyPYQY2KBHdKaXe7A0PwLquV23bZkSUDisbHq9DE8dxYs/zXsz7HuwGsP0NNqg06QaV7wdnXpZlGbuum0gpr6ZkExG3QohUSpn9DVhVVUJEN10Oc9/3U/sEkyo0bSCifdM5LsPJTgK7SS6klBGDiMjZ5KD32fz/4AMALK2mc89m5shVVfHd3gGA6emsbVu+Vf2N6XPICxHxEQBWFriz76z5YQgh5tY3udnwIIdTwnz2//CcTb4Aq+QEJE0u4+oAAAAASUVORK5CYII=" id="cerrarSesion">
          <span>Home</span>
                  </div>
      </a>

      
      <a href="pantallacarpeta.php">
        <div class="seccion">
          <img src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAALNJREFUOE/dk9ENwjAMRH2NZClTwCZlE2ASyiTJKHQS2CKKpajI0EhJCepH/+qvyLnYytMdRORJREf6Lc/MV23HGAcAt4bmBRGZmBnlZQjhYozpiwEewIOZfanTt3sZQEQfWEX1el4wmIhoXOgcZsKHBuExQ8tQGxqq6LcEa73tA0TE/dmy+gUAXyOllCqIXdedAKjBshPVSKqrIBpj3F6MtDVMzTinlO7W2mGOs0I8t+L8Bp8PzOoXPapOAAAAAElFTkSuQmCC"; id="cerrarSesion">
          <span>Carpetas</span>
        </div>
      </a>
      <a href="#calendario">
        <hr class="linea-horizontal">
        <div class="seccion">
          <img src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAATRJREFUOE+Vk4FRwlAQRN92gBVoB2gFQgfYAalAqACsQK1AOpAOpAO1ArAC6eCcZe5jEojgn8kkc7ns7e5tRO1ExAB4lHRTr5fniHgHKkkfpaaIuAZmQC+vK2Df0ALyAL/bZn1qgDWwAr6AS2AEPB9jANwDy+ztAwMDBDCUtIoITx9JeuqQMAcWkjYp960AVMmiY/DRshksC8B/Pmz0FoC7P4zrArehLw0P2p0RYUN9bPJM0jQibORn1vce7Ew8ATCXNImIMbA5ACgSJG29jXTa2SBrvdbdEn4ZAA5UX1KVq70AvDYfr3UtyZJfU4IZNyVExG7KOStp52BYYuwQ5RRnwyZaxsL/CDAtA44BeLIZOJE2bJ5NJuT8j+sJrQN8Z/YPtnBCyi0wsSmT2t94jvzSY8YPP7E3v1foiRZrAAAAAElFTkSuQmCC" id = "cerrarSesion">
          <span>Calendario</span>
        </div>
      </a>
      <a href="#documentos">
        <div class="seccion">
        <img src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAASCAYAAACEnoQPAAAAAXNSR0IArs4c6QAAAYVJREFUOE+tkzFPG0EQhefN3qzOsgt3ULqkpIMOuqSkI13oKFEqRBXTmS78ApRfEbnCqULpEjqX7uzGuvXe7Q3ayLZOx10QUq6d+968eTOLLMuGzHwJYJ/efhMAQxH53VAjeO//qOpYVZ9U1W1/YuZPRHQB4LlNIMIPIYTbTqczq6p777+q6hciio7mzDyqO/gnTESnRVGMkyQ5UtWDusC7cAjhZwjh2Vp7XRfYwdEyMx8CmIvINM/z82ibmaeq+gJgT1XPiMhtM9jBG/AqBpfn+b2IHAO4IqLBNgtVTQH0AfwQkZtW202rybJsYIz5TkRLa+23HZym6dx7P2DmN/suimIWt9EKi8hRWZZDIjqodwUwSpLk1jm339p5tVr1jTFpFQ4huG63uwTgWjvXj+RDMxtjTlR1CGCX7kbAqeqdtXbUats5txSRmGa/2jXee1mWs16vN//vth9jmiIybpqz9ljijccnPP17JOv1+heAz++Blfpk8wonWCwW/aZZm8Sq88f6Kza1NiLLOV8UAAAAAElFTkSuQmCC" id = "cerrarSesion">
          <span>Documentos</span>
        </div>
      </a>
      <hr class="linea-horizontal">
    <div class="cerrar-sesion">
      <a href="pantallainicio.html">
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAATFJREFUOE+dU9FtwlAQs5OqTRoqMQIj0AkQE7RMQJgAmCAdASYoTNBu0G5QNigj8NHmJRKJqxclEqAESO/nSad7PvvOR5SRJJoKmAHoVTkSGxAr75bLKnf60iZMqlcJzxRs4edBUQ9ElGeYBwHf60D4YxS6RARh6PvcNnVqZBAn+gKwvve4aPvZ1tMk0l4YPvg8pF6LZdneEE8S5hXbVgDGyM7ko0AvJbcCqGjFsRaOi3EGTI4AilUS/WtmYbfm8GQGxiiEg8G1AAR2rSVI6qYpohyw6z+WcKmzHSIdvEnoZnuMOh1uWjEoJBJj7w4jkrvKB9+5sA58vlxiUGvlJNHM+l05Hv9lZYv6a7RyiIFyLDN7gWW4Qp8Opnth0uTU4hqLizQKRUyJIx9sIaz9M/L+AGfkrjsr92lUAAAAAElFTkSuQmCC" alt="Cerrar Sesión" id="cerrarSesion">
        <span>Cerrar Sesión</span>
      </a>

      
    </div>
    
  </div>

  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IArs4c6QAAAVRJREFUOE/V1N1NwzAQB3BfPmxFykNHKBuwQckGdIKGCRghzQTABIQJYIOGDdigjNCHSJEvH4euiiM3hJZUlRB5Tfzz+e7vgLjwAxf2xEmwLMu567ob3rhpmigIgs9jRRwFDUZE74wAwOIU+iNYFMW1lPKVMaVUzKDWOmMUEZdhGH6MVToKdtiGiJ6UUmt7odZ6DQD3iBiNod9ArfUtADyPYQY2KBHdKaXe7A0PwLquV23bZkSUDisbHq9DE8dxYs/zXsz7HuwGsP0NNqg06QaV7wdnXpZlGbuum0gpr6ZkExG3QohUSpn9DVhVVUJEN10Oc9/3U/sEkyo0bSCifdM5LsPJTgK7SS6klBGDiMjZ5KD32fz/4AMALK2mc89m5shVVfHd3gGA6emsbVu+Vf2N6XPICxHxEQBWFriz76z5YQgh5tY3udnwIIdTwnz2//CcTb4Aq+QEJE0u4+oAAAAASUVORK5CYII=" id="Fotoent">

  <img src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAALNJREFUOE/dk9ENwjAMRH2NZClTwCZlE2ASyiTJKHQS2CKKpajI0EhJCepH/+qvyLnYytMdRORJREf6Lc/MV23HGAcAt4bmBRGZmBnlZQjhYozpiwEewIOZfanTt3sZQEQfWEX1el4wmIhoXOgcZsKHBuExQ8tQGxqq6LcEa73tA0TE/dmy+gUAXyOllCqIXdedAKjBshPVSKqrIBpj3F6MtDVMzTinlO7W2mGOs0I8t+L8Bp8PzOoXPapOAAAAAElFTkSuQmCC"; id="Fotoentr">

  <img src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAATRJREFUOE+Vk4FRwlAQRN92gBVoB2gFQgfYAalAqACsQK1AOpAOpAO1ArAC6eCcZe5jEojgn8kkc7ns7e5tRO1ExAB4lHRTr5fniHgHKkkfpaaIuAZmQC+vK2Df0ALyAL/bZn1qgDWwAr6AS2AEPB9jANwDy+ztAwMDBDCUtIoITx9JeuqQMAcWkjYp960AVMmiY/DRshksC8B/Pmz0FoC7P4zrArehLw0P2p0RYUN9bPJM0jQibORn1vce7Ew8ATCXNImIMbA5ACgSJG29jXTa2SBrvdbdEn4ZAA5UX1KVq70AvDYfr3UtyZJfU4IZNyVExG7KOStp52BYYuwQ5RRnwyZaxsL/CDAtA44BeLIZOJE2bJ5NJuT8j+sJrQN8Z/YPtnBCyi0wsSmT2t94jvzSY8YPP7E3v1foiRZrAAAAAElFTkSuQmCC" id = "Fotoentra">

  <img src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAASCAYAAACEnoQPAAAAAXNSR0IArs4c6QAAAYVJREFUOE+tkzFPG0EQhefN3qzOsgt3ULqkpIMOuqSkI13oKFEqRBXTmS78ApRfEbnCqULpEjqX7uzGuvXe7Q3ayLZOx10QUq6d+968eTOLLMuGzHwJYJ/efhMAQxH53VAjeO//qOpYVZ9U1W1/YuZPRHQB4LlNIMIPIYTbTqczq6p777+q6hciio7mzDyqO/gnTESnRVGMkyQ5UtWDusC7cAjhZwjh2Vp7XRfYwdEyMx8CmIvINM/z82ibmaeq+gJgT1XPiMhtM9jBG/AqBpfn+b2IHAO4IqLBNgtVTQH0AfwQkZtW202rybJsYIz5TkRLa+23HZym6dx7P2DmN/suimIWt9EKi8hRWZZDIjqodwUwSpLk1jm339p5tVr1jTFpFQ4huG63uwTgWjvXj+RDMxtjTlR1CGCX7kbAqeqdtXbUats5txSRmGa/2jXee1mWs16vN//vth9jmiIybpqz9ljijccnPP17JOv1+heAz++Blfpk8wonWCwW/aZZm8Sq88f6Kza1NiLLOV8UAAAAAElFTkSuQmCC" id = "Fotoentrad">



</div>



<div class="searchBox">

  <input class="searchInput" type="text" name="" placeholder="Buscar fuentes/resumenes">
  <button class="searchButton" href="#">
         
        

                      <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
<g clip-path="url(#clip0_2_17)">
<g filter="url(#filter0_d_2_17)">
<path d="M23.7953 23.9182L19.0585 19.1814M19.0585 19.1814C19.8188 18.4211 20.4219 17.5185 20.8333 16.5251C21.2448 15.5318 21.4566 14.4671 21.4566 13.3919C21.4566 12.3167 21.2448 11.252 20.8333 10.2587C20.4219 9.2653 19.8188 8.36271 19.0585 7.60242C18.2982 6.84214 17.3956 6.23905 16.4022 5.82759C15.4089 5.41612 14.3442 5.20435 13.269 5.20435C12.1938 5.20435 11.1291 5.41612 10.1358 5.82759C9.1424 6.23905 8.23981 6.84214 7.47953 7.60242C5.94407 9.13789 5.08145 11.2204 5.08145 13.3919C5.08145 15.5634 5.94407 17.6459 7.47953 19.1814C9.01499 20.7168 11.0975 21.5794 13.269 21.5794C15.4405 21.5794 17.523 20.7168 19.0585 19.1814Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" shape-rendering="crispEdges"></path>
</g>
</g>
<defs>
<filter id="filter0_d_2_17" x="-0.418549" y="3.70435" width="29.7139" height="29.7139" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
<feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix>
<feOffset dy="4"></feOffset>
<feGaussianBlur stdDeviation="2"></feGaussianBlur>
<feComposite in2="hardAlpha" operator="out"></feComposite>
<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix>
<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2_17"></feBlend>
<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2_17" result="shape"></feBlend>
</filter>
<clipPath id="clip0_2_17">
<rect width="28.0702" height="28.0702" fill="white" transform="translate(0.403503 0.526367)"></rect>
</clipPath>
</defs>
</svg>
           

  </button>
</div>

<a href="formulariocrearcarpeta.html">
  <button class="btn">Agregar carpeta</button>
</a>
<div style="padding-left: 100px;">
<?php 
    $directorio = __DIR__ . DIRECTORY_SEPARATOR . "../uploads/".$_SESSION['Usu']."/".$_GET['folder_name'];
  // echo $directorio;
    listadoDirectorio($directorio);
    ?>
</div>
</div>

</form>

</body>
</html>
