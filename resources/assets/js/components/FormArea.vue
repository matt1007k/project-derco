<template>
    <div>
        <form>
            <div class="form-group">
                <input type="text" v-model="nombreArea" class="form-control" placeholder="Ingresar nombre de actividad">
            </div>
            <p class="alert alert-danger" v-show="error">
                {{error}}
            </p>
            <div class="form-group">
                <button v-if="edit == 1" class="btn btn-primary" @click="registrarArea()">Registrar</button> 
                <button v-else-if="edit == 2" class="btn btn-primary" @click="editarArea()">Editar</button>               
                
            </div>
        </form>
        <button class="btn btn-danger" @click="cancelar()">Cancelar</button>
    </div>   
    
</template>
<script>
export default {
    props: ['edit'],
    data(){
            return{
                nombreArea: '',
                error: '',
            }
    },
    methods: {
        registrarArea(){
            if (!this.nombreArea) return this.error = "El nombre es obligatorio";
            axios.post('/areas',{
                nombre: this.nombreArea
            }).then(response => {
                location.href = '/home';
            }).catch(error => console.log(error))
        },
        editarArea(){

        },
        cancelar(){
            location.href = "/home"
        }
    }
}
</script>

