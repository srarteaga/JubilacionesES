<style>
.entes-menu{
    overflow: auto;
    max-height: 256px;
    min-height: 50px;
}
.boton-cargar{
    background: #08469e !important; 
    color: white !important;
    font-size: 16px !important;
}
</style>

<template>
    <div class="col-md-12">
        <div class="col-md-12">
            <a v-on:click="getLista" class="btn btn-primary boton-cargar" v-if="!lists.length">Cargar organismos</a>
            <div div v-else>
                <select class="custom-select custom-select-lg col-md-5" id="categoria_ente" v-model="categoria_ente">
                    <option disabled value="">Seleccione una categoria</option>
                    <option v-for="elmento in categorias" :value="elmento.categoria">{{ elmento.categoria }}</option>
                </select>

                <label class="col-md-1 col-form-label-lg text-center" v-show="categoria_ente">Entes</label>
                <select class="col-md-5 custom-select custom-select-lg" id="ente_id" v-model="ente_id" v-show="categoria_ente" name="ente_id">
                    <option disabled value="">Seleccione un ente</option>
                    <option v-for="item in searchList" :value="item.id">{{ item.nombre_ente }}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    
    export default {
        data () {
            return { 
                lists: [],
                categoria_ente: '',
                categorias: [],
                ente_id:'',

            }
        },
        methods: {


        },
        computed:{
            getLista: function () {
                var urlEntes = 'entes';
                axios.get(urlEntes).then(response => {
                    this.lists = response.data

                });

                var urlCategoria = 'categorias-entes';
                axios.get(urlCategoria).then(response => {
                    this.categorias = response.data

                });
            },
            searchList: function () {
                return this.lists.filter((item) => item.categoria.includes(this.categoria_ente));
            }
        }
    };    
    

        /*export default {
            mounted() {
                console.log('Component mounted.')
            }
        };*/
</script>
