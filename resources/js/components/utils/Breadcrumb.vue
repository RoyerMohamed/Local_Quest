<!-- Breadcrumbs.vue -->
<template>
    <nav class="breadcrumbs">
      <template v-for="(crumb, index) in crumbs" :key="index">
        <router-link :to="crumb.to" class="breadcrumb">{{ crumb.label }}<span class="breadcrumb-divider">/</span></router-link>
      </template>
    </nav>
  </template>
  
  <script>
  export default {
    computed: {
      crumbs() {
        const routes = this.$route.matched
        const breadcrumbs = []
  
        // Ajoutez le chemin racine (Home) en premier
        breadcrumbs.push({ label: 'Home', to: '/' })
  
        // Parcourez les routes correspondantes pour créer les miettes de pain
        routes.forEach(route => {
          if (route.name) {
            breadcrumbs.push({ label: route.name, to: route.path })
          }
        })
  
        return breadcrumbs
      }
    }
  }
  </script>
  
  <style>
  .breadcrumbs {
    display: flex;
    align-items: center;
  }
  
  .breadcrumb-divider {
    margin: 0 5px;
  }
  
  .breadcrumb {
    text-decoration: none;
    color: #333;
    
  }
  </style>
  