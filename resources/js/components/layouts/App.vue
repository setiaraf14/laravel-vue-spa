<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <router-link :to="{ name: 'home' }" class="navbar-brand"
        >Laravel-Vue SPA</router-link
      >
      <button
        class="navbar-toggler"
        data-toggle="collapse"
        data-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link
              class="nav-link"
              data-toggle="collapse"
              :to="{ name: 'home' }"
            >
              Home
            </router-link>
          </li>

          <li class="nav-item">
            <router-link
              class="nav-link"
              data-toggle="collapse"
              :to="{ name: 'about' }"
            >
              About
            </router-link>
          </li>

          <li class="nav-item">
            <router-link
              class="nav-link"
              data-toggle="collapse"
              :to="{ name: 'login' }"
            >
              Login
            </router-link>
          </li>

          <li class="nav-item">
            <router-link
              class="nav-link"
              data-toggle="collapse"
              :to="{ name: 'product' }"
            >
              Product
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
              class="nav-link"
              data-toggle="collapse"
              :to="{ name: 'dagangan-form' }"
            >
              Dagangan
            </router-link>
          </li>
          <li class="nav-item">
            <div class="logout" v-if="token"><button class="btn btn-danger" @click="logout()">Logout</button></div>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  data() {
            return {
                
                token: null,
            }
  },

  mounted() {
    this.token = localStorage.getItem('_token')
  },

  watch: {
    $route() {
      $("#navbarCollapse").collapse("hide");
    },
  },

  methods: {
    logout() {
      localStorage.removeItem('_token')
      this.$router.push({ name: 'login' }) 
    }
  }
};
</script>