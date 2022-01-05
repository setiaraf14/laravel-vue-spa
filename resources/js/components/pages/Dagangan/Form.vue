<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
              <div class="title">Form Dagangan</div>
          </div>

          <div class="card-body">
              <div v-show="state == 0">
                    <div class="row text-center mt-4 box">
                        <div class="box-kotak col-lg-4">
                            <img :src="test" width="20%" />
                        </div>
                        <div class="box-kotak col-lg-4"></div>
                        <div class="box-kotak col-lg-4"></div>
                    </div>
                    <div class="mt-4">
                        <label for="exampleInputEmail1">Nama Suplier</label>
                        <input type="text" v-model="suplier" class="form-control" />
                    </div>
                    <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6 text-right">
                            <div
                                :class="state == 1 ? 'active' : ''"
                                class="mt-4"
                            >
                                <a @click="state = 1">
                                    <button class="btn btn-dark" type="button">
                                        Next
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="9"
                                            height="8"
                                            fill="currentColor"
                                            class="bi bi-caret-right-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"
                                            />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-show="state == 1">
                    <div class="row text-center mt-4 box">
                       <div class="box-kotak col-lg-4">
                            <img :src="test" width="20%" />
                        </div>
                        <div class="box-kotak col-lg-4">
                                <img :src="test1" width="20%" />
                        </div>
                        <div class="box-kotak col-lg-4"></div>
                    </div>
                    <div class="mt-4">
                        <br />
                        <hr style="border: 1px solid black;" />
                        <!-- <div class="text-right">
                            <button class="btn btn-warning">+</button>
                        </div> -->
                        <label for="exampleInputEmail1" class="mt-3"
                            >Nama Barang</label
                        >
                        <input type="text" v-model="namaBarang" class="form-control" />

                        <label for="exampleInputEmail1" class="mt-3"
                            >Quantity</label
                        >
                        <input type="text" v-model="quantity" class="form-control" />

                        <label for="exampleInputEmail1" class="mt-3"
                            >Gambar</label
                        >
                        <input type="file" class="form-control" />
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div
                                :class="state == 0 ? 'active' : ''"
                                class="mt-4"
                            >
                                <a @click="state = 0">
                                    <button
                                        class="btn btn-danger"
                                        type="button"
                                    >
                                        Previous
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="9"
                                            height="8"
                                            fill="currentColor"
                                            class="bi bi-caret-right-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"
                                            />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <div
                                :class="state == 2 ? 'active' : ''"
                                class="mt-4"
                            >
                                <a @click="state = 2">
                                    <button class="btn btn-dark" type="button">
                                        Next
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="9"
                                            height="8"
                                            fill="currentColor"
                                            class="bi bi-caret-right-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"
                                            />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-show="state == 2">
                    <div class="row text-center mt-4 box">
                        <div class="box-kotak col-lg-4">
                            <img :src="test" width="20%" />
                        </div>
                        <div class="box-kotak col-lg-4">
                            <img :src="test1" width="20%" />
                        </div>
                        <div class="box-kotak col-lg-4">
                            <img :src="test2" width="20%" />
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="exampleInputEmail1" class="mt-3"
                            >Penanggung jawab </label
                        >
                        <input type="text" v-model="agen" class="form-control" />
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div
                                :class="state == 1 ? 'active' : ''"
                                class="mt-4"
                            >
                                <a @click="state = 1">
                                    <button
                                        class="btn btn-danger"
                                        type="button"
                                    >
                                        Previous
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="9"
                                            height="8"
                                            fill="currentColor"
                                            class="bi bi-caret-right-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"
                                            />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <div
                                :class="state == 1 ? 'active' : ''"
                                class="mt-4"
                            >
                                <a @click="state = 1">
                                    <button class="btn btn-success" type="button">
                                        Next
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="9"
                                            height="8"
                                            fill="currentColor"
                                            class="bi bi-caret-right-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"
                                            />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                            <div class="button-submit">
                                <button type="button" class="btn btn-warning" @click="submitDagangan()">Submit</button>
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
import test from "../../image/ss_step_1.png"
import test1 from "../../image/step_2.png"
import test2 from "../../image/step_3.png"


export default {
    components: {
        test
    },
    data(){
        return {
            data: [],
            state: 0,
            disable: 0,
            suplier : '',
            namaBarang : '',
            quantity : 0,
            agen : '',
            imek: '', 
            test: test,
            test1:test1,
            test2: test2
        }
    },

    methods:{
        // async submitBuku() {
        //     let judulBuku = document.getElementById('judul_buku').value
        //     let pengarang = document.getElementById('pengarang').value
        //     let penerbit = document.getElementById('penerbit').value
        //     let harga = document.getElementById('harga').value

        //     let store = await axios.get(`/api/store-buku/json?judul=${judulBuku}&pengarang=${pengarang}&penerbit=${penerbit}&harga=${harga}`);
        //     if(store.status){
        //       this.$router.push({ name: 'product' }) 
        //     }
        // },

        async submitDagangan() {
            try {
                let params = { suplier: this.suplier, 
                           nama_barang: this.namaBarang,  
                           quantity: this.quantity,
                           agen: this.agen,
                         }
                let store = await axios.post(`/api/dagangan/store-dagangan`, params)
                console.log(store);
            } catch (error) {
                
            }
            

            
        }
    }
}
</script>