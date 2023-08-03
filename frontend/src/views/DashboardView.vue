<template>

    <div class="wrapper">
        <SidebarComponent />
        <div class="main">
            <NavComponent />
            
            <ContentComponent>
                <router-view></router-view>
            </ContentComponent>

        </div>
    </div>
    
</template>
<script setup>
import SidebarComponent from '../components/SidebarComponent.vue';
import NavComponent from '../components/NavComponent.vue';
import ContentComponent from '../components/ContentComponent.vue'
</script>