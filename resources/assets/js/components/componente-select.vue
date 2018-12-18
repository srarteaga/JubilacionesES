<style>
.entes-menu{
    overflow: auto;
    max-height: 256px;
    min-height: 50px;
}
</style>

<template>

    <div class="col-md-12">
        <div class="col-md-12">
            <a v-on:click="getLista" class="btn btn-primary" v-if="!lists.length">Cargar entes</a>
            <div div v-else>
                <select class="custom-select custom-select-lg col-md-5" id="categoria_ente" v-model="categoria_ente">
                    <option disabled value="">Seleccione una categoria</option>
                    <option v-for="elmento in categorias" :value="elmento.categoria">{{ elmento.categoria }}</option>
                </select>
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" v-show="categoria_ente">
                    Entes <span class="caret"></span>
                </button>
                <ul class="dropdown-menu entes-menu">
                    <li class="lista" v-for="item in searchList">
                        <a class="dropdown-item" href="#">{{ item.nombre_ente }}</a>
                    </li>
                </ul>
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
                valor:'',

            }
        },
        methods: {
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

        },
        computed:{
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
