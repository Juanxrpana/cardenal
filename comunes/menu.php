<div class="sidebar">
    <input type="hidden" id="nivelUsuario" value="<?php echo isset($_SESSION['nivel']) ? $_SESSION['nivel'] : ''; ?>">


    <ul class="menu">
        <li class="active">
            <a href="?pagina=inicio">
                <p1 class="icon-home3"></p1>
                <span>Inicio</span>
            </a>
        </li>

        <li id="proveedor-lista">
            <a href="?pagina=proveedor">
                <p1 class="icon-users"></p1>
                <span>Proveedores</span>
            </a>
        </li>
        <li>
            <a href="?pagina=materia_prima">
                <p1 class="icon-truck"></p1>
                <span>Materia prima</span>
            </a>
        </li>
        <li>
            <a href="?pagina=cafe_tostado">
                <p1 class="icon-contrast"></p1>
                <span>Café tostado</span>
            </a>
        </li>
        <li>
            <a href="?pagina=cafe_final">
                <p1 class="icon-mug"></p1>
                <span>Café Final</span>
            </a>
        </li>
        <li>
            <a href="?pagina=reporte">
                <p1 class="icon-file-text2"></p1>
                <span>Reportes</span>
            </a>
        </li>
        <li id="usuario-lista">
            <a href="?pagina=usuario">
                <p1 class="icon-user-tie"></p1>
                <span>Usuarios</span>
            </a>
        </li>
        <li class="logout">
            <a href="?pagina=logout">
                <p1 class="icon-reply1"></p1>
                <span>Salir</span>
            </a>
        </li>
        <br>
        <br>
        <br>
    </ul>
    <br>
    <br>
    
</div>