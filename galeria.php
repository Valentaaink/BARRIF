<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ======== Favicon ======= -->
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon" />
    <!-- ======== Boxicons ======= -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- ======== Slider Js ======= -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.5/swiper-bundle.min.css"
    />
<script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>

    <!-- ======== StyleSheet ======= -->
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/contacto.css">


    <title>Galeria  ! Barrif </title>
    <link rel="stylesheet" href="css/fotos.css">
  </head>

  <body>
   
  
    <!-- Preloader
    <div class="loader">
     
    </div> <img src="./images/preloader.gif" alt="" />
  header -->
  
  <header class="" id="">
      <!-- Navigation -->
      <div class="navigation">
        <nav class="nav d-flex">
          <div class="logo">
            <a href="/">
              <img src="./images/logo.png" />
              
            </a>
          </div>
          <ul class="nav-list d-flex">
            <li class="nav-item">
              <a href="index.html">Inicio</a>
            </li>
            <li class="nav-item">
              <a href="nosotros.html" >Nosotros</a>
            </li>
            <li class="nav-item">
              <a href="servicio.php" >Servicios</a>
            </li>
            <li class="nav-item">
              <a href="galeria.php">Galeria</a>
            </li>
            <li class="nav-item">
              <a href="contacto.html" >Contacto</a>
            </li>

            <li class="nav-item"> <a href="https://www.facebook.com/profile.php?id=100085725699474&mibextid=ZbWKwL"><i class="fab fa-facebook-f"></i></a>     </li>
              <li class="nav-item"> <a href="https://www.instagram.com/barrif_consultora/?igshid=NzZlODBkYWE4Ng%3D%3D"><i class="fab fa-instagram"></i></a>     </li>
                <li class="nav-item"> <a href="https://www.linkedin.com/posts/barrif-ingenier%C3%ADa-y-consultor%C3%ADa_sst-capacitacionessst-hse-activity-7034548159393488896-4L1p"><i class="fab fa-linkedin-in"></i></a>     </li>
                  <li class="nav-item"> <a href="https://api.whatsapp.com/message/AMKTEKT2KMTQK1?autoload=1&app_absent=0"><i class="fa fa-whatsapp"></i></a>     </li>
          </ul>


          <div class="hamburger">
            <i class="bx bx-menu-alt-left"></i>
          </div>
        </nav>
      </div>

      <!-- Hero -->
    
      </div>

      

      <div class="content">

      </div>
    </header>
<section class="header">
    <div class="tarjetas">
                    <?php
            // Conexión a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "TiC0ntr4#";
            $database = "barrif";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Consulta SQL para recuperar los datos de la base de datos
            $sql = "SELECT id, imagen FROM galeria";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Generar las tarjetas
                while ($row = $result->fetch_assoc()) {
                  echo '<div class="tarjeta">';
                  if (!empty($row["imagen"])) {
                      if (strpos($row["imagen"], 'Gallery/') !== false) {
                          // La ruta completa ya está incluida en el campo "imagen"
                          echo '<img src="' . $row["imagen"] . '">';
                      } else {
                          // Agregar la ruta completa para los servicios sin edición
                          echo '<img src="Gallery/' . $row["imagen"] . '">';
                      }
                  } else {
                      // Puedes mostrar una imagen de reemplazo o un mensaje indicando que no hay imagen disponible.
                      echo '<img src="Gallery/imagen_no_disponible.png" alt="Imagen no disponible">';
                  }
                  echo '</div>';            
                }
            } else {
                echo "No se encontraron fotos en la base de datos.";
            }

            $conn->close();
            ?>
                </div>
</section>

  </article>
</main>



    <main class="main">
      <!-- About Section -->
      <div class="content">
      
      </div>
          

      <!-- discount Section -->
 
         
          <span class="video-control d-flex"><i class="bx bx-play"></i></span>
        </div>
      </section>

      
      <!-- More Section -->
<br><br><br><br><br><br><br><br><br><br>
    <!-- Footer -->
    <footer>

      <div class="container__footer">
          <div class="box__footer">
              <div class="logo">
              <h2>BARRIF</h2>
              </div>
              <div class="terms">
                <p>Si desea dejarnos un mensaje, no dude en comunicarse con nosotros, estaremos felices de atenderlo. Nos ubicamos en la Av. Andrés Aramburú N° 477 - San Isidro con hora de atencion del Lunes a Viernes de 8 a. m a 17:30 p. m
                </p>
              </div>
          </div>
          <div class="box__footer">
            <h2>Acerca de</h2>
            <a href="nosotros.html">Nosotros</a>
            <a href="proyectos.html">Proyectos</a>
            <a href="servicio.html">Servicios</a>   
          </div>

          <div class="box__footer">
              <h2>Ayuda y Normas</h2>
              <a href="politicasdeprivacida.html">Política de Privacidad</a>
              <a href="terminosycondiciones.html">Terminos y Condiciones</a>
              <a href="cookies.html">Cookies</a>
              <a href="ayuda.html">Ayuda</a>              
          </div>

          <div class="box__footer">
              <h2>Redes Sociales</h2>
              <a href= "https://www.facebook.com/profile.php?id=100085725699474&mibextid=ZbWKwL" > <i class="fab fa-facebook-square"></i> Facebook</a>
              <a href= "https://www.instagram.com/barrif_consultora/?igshid=NzZlODBkYWE4Ng%3D%3D" ><i class="fab fa-instagram-square"></i> Instagram</a>
              <a href= "https://www.linkedin.com/posts/barrif-ingenier%C3%ADa-y-consultor%C3%ADa_sst-capacitacionessst-hse-activity-7034548159393488896-4L1p" ><i class="fab fa-linkedin"></i> Linkedin</a>

     
          </div>

      </div>

      <div class="box__copyright">
          <hr>
          <p>Todos los derechos reservados © 2023-2024 <a href="administradores.php"
        style="color: #ffcc00; font-weight: bold;" >BARRIF</a></p>
      </div>
  </footer>

    <!-- ======== SwiperJS ======= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.5/swiper-bundle.min.js"></script>
    <!-- ======== SCROLL REVEAL ======= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/4.0.9/scrollreveal.min.js"></script>
    <!-- ======== SliderJS ======= -->
    <script src="js/slider.js"></script>
    <!-- ======== IndexJS ======= -->
    <script src="js/index.js"></script>
  </body>
</html>
<a href="https://api.whatsapp.com/message/AMKTEKT2KMTQK1?autoload=1&app_absent=0" class="btn-wsp" target="_blank">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<i class="fa fa-whatsapp icono"></i>
</a>