<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ecd5745f4f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/landing.css">
    <link rel="stylesheet" href="./CSS/bootstrap.css">
  
    
    <title>modulo1</title>
</head>
<body>
    <header>
        <div class="icon">
             <img class="logo" src="./extras/LOGO.png" alt="" >
        </div>
        <input type="checkbox" id="nav_check" hidden> 
        <nav>
            <!-- <div class="icon">
                <img class="logo" src="../extras/LOGO.png" alt="" >
            </div> -->
            <ul class="lista">
                <li>
                    <a href="" class="activo">Inicio</a>
                </li>
                <li>
                    <a href="?pagina=persona">persona</a>
                </li>
                <li>
                    <a href="">Modulo3</a>
                </li>
                <li>
                    <a href="">Modulo4</a>
                </li>
                <li>
                    <a href="">Modulo5</a>
                </li>
                <li class="sesion">
                <a href="">Login <img src="./extras/usuario.png" class="usersesion"></a>
                </li>
            </ul>
        </nav>
        <label for="nav_check" class="barras" >
            <div></div>
            <div></div>
            <div></div>
        </label>
    </header>
<!-- Aquí empieza el formulario consta de dos partes left - right para ordenar segun la necesidad -->
    <main>
        <section class="banner">
			<div class="content-banner">
				<p>El amanecer del buen café</p>
				<h2>100% café arabigo<br />Café Fresco</h2>
				<a href="?pagina=persona">Registrar</a>
			</div>
		</section>
    </main><br>
        <section class="container top-products">
			<h1 class="heading-1">Mejores Productos</h1>
			<!--  -->
		</section>
    <section class="gallery">
				<img
					src="./extras/pexels-polina-tankilevitch-4109744.jpg"
					alt="Gallery Img1"
					class="gallery-img-1"
				/><img
					src="./extras/gallery2.jpg"
					alt="Gallery Img2"
					class="gallery-img-2"
				/><img
					src="./extras/café-árbol2.jpg"
					alt="Gallery Img3"
					class="gallery-img-3"
				/><img
					src="./extras/gallery3.jpg"
					alt="Gallery Img4"
					class="gallery-img-4"
				/><img
					src="./extras/gallery5.jpg"
					alt="Gallery Img5"
					class="gallery-img-5"
				/>
			</section>
    <footer class="footer">
			<div class="container container-footer">
				<div class="menu-footer">
					<div class="contact-info">
						<p class="title-footer">Información de Contacto</p>
						<ul>
							<li>
								Dirección: 71 Pennington Lane Vernon Rockville, CT
								06066
							</li>
							<li>Teléfono: 123-456-7890</li>
							<li>Fax: 55555300</li>
							<li>EmaiL: baristas@support.com</li>
						</ul>
					</div>

					<div class="information">
						<p class="title-footer">Información</p>
						<ul>
							<li><a href="#">Acerca de Nosotros</a></li>
							<li><a href="#">Información Delivery</a></li>
							<li><a href="#">Politicas de Privacidad</a></li>
							<li><a href="#">Términos y condiciones</a></li>
							<li><a href="#">Contactános</a></li>
						</ul>
					</div>

				</div>

				<div class="copyright">
					<p>
						Desarrollado por Programación para el mundo &copy; 2022
					</p>

				</div>
			</div>
		</footer>
</body>

<script src="./js/jquery-3.6.0.min.js"></script>
<script src="./js/bootstrap.min.js" ></script>
<script src="./js/cafe.js" ></script>

<script>
    barras = document.querySelector(".barras");
        nav = document.querySelector("nav");
        barras.onclick = function() {
            nav.classList.toggle("active");
        }
</script>
</html>