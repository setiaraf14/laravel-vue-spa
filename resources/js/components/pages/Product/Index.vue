<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
              <div class="title">Productttt</div>
              <router-link class="btn btn-primary" to="/product/form"> Add Product </router-link>
          </div>

          <div class="card-body">
              <table class="table table-hover"> 
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <!-- <ul id="example-1">
                    <li v-for="item in items" :key="item.message">
                      {{ item.message }}
                    </li>
                  </ul> -->
                    <tr v-for="items in buku" :key="items.id">
                        <td>{{ items.judul_buku }}</td>
                        <td>{{ items.pengarang}}</td>
                        <td>{{ items.penerbit }}</td>
                        <td>{{ items.harga }}</td>
                        <td>
                            <button class="btn btn-primary" type="button" @click="toggleShowModal(items.id)">Edit Buku</button>
                            <button class="btn btn-danger" v-on:click="deleteDataBuku(items.id)">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
        
        <div v-if="showModal == true">
                <div class="modal-mask">
                    <div class="modal-wrapper">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" @click="showModal = false">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="number" id="idbuku" v-model="dataModal.id" hidden>
                                    <div class="form-group">
                                        <label for="judul_buku">Judul Buku</label>
                                        <input type="text" class="form-control" id="judul_buku" v-model="dataModal.judul_buku" placeholder="Isi judul buku...">
                                    </div>
                                    <div class="form-group">
                                        <label for="pengarang">Pengarang</label>
                                        <input type="text" class="form-control" id="pengarang" v-model="dataModal.pengarang"  placeholder="Isi pengarang buku...">
                                    </div>
                                    <div class="form-group">
                                        <label for="penerbit">Penerbit</label>
                                        <input type="text" class="form-control" id="penerbit" v-model="dataModal.penerbit"  placeholder="Isi penerbit buku...">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">harga</label>
                                        <input type="text" class="form-control" id="harga" v-model="dataModal.harga"  placeholder="Isi harga buku...">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button @click="editBuku()" type="button" class="btn btn-primary" >Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>           
        </div>

      </div>
    </div>
  </div>
</template>

<script>
export default {
     data() {
            return {
                buku: [],
                showModal: false,
                dataModal: {},
            }
        },

      mounted() {
        this.fetchDataBuku()
      },

      methods: {
          async fetchDataBuku() {
            let data = await axios.get(`/api/get-buku/json`).then(reseponse => {
              console.log(reseponse.data.data)
              this.buku = reseponse.data.data
            })
          },

          deleteDataBuku(id) {
            console.log(id)
            let idbuku = id
            axios.get(`/api/delete-buku/json?idbuku=${idbuku}`).then(response => {
                let i = this.buku.map(data => data.id).indexOf(id);
                console.log(i)
                this.buku.splice(i, 1)
              });
          },

          async toggleShowModal(id) {
                this.showModal = !this.showModal;
                let edit = await axios.get(`/api/edit-buku/json/${id}`)
                this.dataModal = edit.data  
          },
          async editBuku() {
            let idBuku = document.getElementById('idbuku').value
            let judulBuku = document.getElementById('judul_buku').value
            let pengarang = document.getElementById('pengarang').value
            let penerbit = document.getElementById('penerbit').value
            let harga = document.getElementById('harga').value

            console.log(idBuku, judulBuku, pengarang, penerbit, harga)

            let store = await axios.get(`/api/update-buku/json?judul=${judulBuku}&pengarang=${pengarang}&penerbit=${penerbit}&harga=${harga}&idBuku=${idBuku}`);
            if(store.status){
              this.showModal = false
              this.fetchDataBuku()
            }
        }
      }
}
</script>

<style scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-title {
        font-size: 18px;
        font-weight: 500;
    }
</style>