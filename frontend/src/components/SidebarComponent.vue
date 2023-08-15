<template>

<aside id="sidebar">
    <!-- Content for Sidebar-->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="#">Gonza</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Admin Elements
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-list"></i>
                    Tablero
                </a>
            </li>
            <li class="sidebar-item">
                <a 
                    href="#"
                    class="sidebar-link collapsed" 
                    data-bs-target="#users"
                    data-bs-toggle="collapse"
                    arial-expanded="false"
                >
                    <i class="bi bi-person pe-2"></i>
                    Propietarios
                </a>
                <ul id="users" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <!--<a href="#" class="sidebar-link">Registrar</a>-->
                        <router-link to="/owner" class="sidebar-link">Registrar</router-link>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Page 2</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a 
                    href="#"
                    class="sidebar-link collapsed" 
                    data-bs-target="#communities"
                    data-bs-toggle="collapse"
                    arial-expanded="false"
                >
                    <i class="bi bi-building pe-2"></i>
                    Comunidades
                </a>
                <ul id="communities" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        
                        <router-link to="/community_type" class="sidebar-link">Tipo de Comunidad</router-link>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Comunidad 2</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a 
                    href="#"
                    class="sidebar-link collapsed" 
                    data-bs-target="#associations"
                    data-bs-toggle="collapse"
                    arial-expanded="false"
                >
                    <i class="bi bi-building pe-2"></i>
                    Asociaciones
                </a>
                <ul id="associations" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Asociacion 1</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Asociacion 2</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

</template>

