<template>
    <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
              <div class="title">Form Login</div>
          </div>

          <div class="card-body">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Isi eamil...">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" placeholder="Isi password...">
                </div>
                <button @click="login()" type="button" class="btn btn-primary" >Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data(){
        return {
            data: [],
        }
    },

    methods:{
        async masuk() {
            let email = document.getElementById('email').value
            let password = document.getElementById('password').value

            let store = await axios.get(`/api/masuk/json?judul=${judulBuku}&pengarang=${pengarang}&penerbit=${penerbit}&harga=${harga}`);
            if(store.status){
              this.$router.push({ name: 'product' }) 
            }
        },

        async login() {
            let email = document.getElementById('email').value
            let password = document.getElementById('password').value
            let params = { email: email, password: password }
            let store = await axios.post(`/api/masuk/`, params );
            console.log(store.data.message.token);
            if(store.status){
              localStorage.setItem('_token', store.data.message.token);
              this.$router.push({ name: 'product' });
            }
        }
    }
}
</script>