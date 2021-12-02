<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
              <div class="title">Edit Product</div>
          </div>

          <div class="card-body">
                <div class="form-group">
                    <label for="judul_buku">Judul Buku</label>
                    <input type="text" class="form-control" id="judul_buku" placeholder="Isi judul buku..." v-model="data.judul_buku">
                </div>
                <div class="form-group">
                    <label for="pengarang">Pengarang</label>
                    <input type="text" class="form-control" id="pengarang" placeholder="Isi pengarang buku..."  v-model="data.pengarang">
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" placeholder="Isi penerbit buku..."  v-model="data.penerbit">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" placeholder="Isi harga..."  v-model="data.harga">
                </div>
                <button @click="submitBuku()" type="button" class="btn btn-primary" >Submit</button>
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
            data:{},
        }
    },

    mounted(){
        this.fetchDataBuku
    },
    created(){
        axios(`/edit-buku/json/${this.$routes.params.id}`)
        .then((response) => {
            console.log(response.data)
            this.data = response.data
        })
    },

    // methods: {
    //     fetchDataBuku(){
    //         console.log(this.$router.query.id)
    //         console.log(idbuku)
    //         // axios.get(`/api/edit-buku/json?idbuku=${idbuku}`)
    //     }
    // }

    // methods:{
    //     async submitBuku() {
    //         let judulBuku = document.getElementById('judul_buku').value
    //         let pengarang = document.getElementById('pengarang').value
    //         let penerbit = document.getElementById('penerbit').value
    //         let harga = document.getElementById('harga').value

    //         let store = await axios.get(`/api/store-buku/json?judul=${judulBuku}&pengarang=${pengarang}&penerbit=${penerbit}&harga=${harga}`);
    //         if(store.status){
    //           this.$router.push({ name: 'product' }) 
    //         }
    //     }
    // }
}
</script>