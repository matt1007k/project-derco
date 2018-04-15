<template>
    <div>
        <form>
            <div class="form-group">
                <input type="text" v-model="nombreActividad" class="form-control" placeholder="Ingresar nombre de actividad">
            </div>
            <p class="alert alert-danger" v-show="error">
                {{error}}
            </p>
            <div class="form-group">
                <button v-if="edit == 1" class="btn btn-primary" @click.prevent="registrarActividad()">Registrar</button> 
                <button v-else-if="edit == 2" class="btn btn-primary" @click.prevent="editarActividad()">Editar</button>               
                
            </div>
        </form>
        <button class="btn btn-danger" @click="cancelar()">Cancelar</button>
    </div>   
    
</template>
<script>
export default {
    props: ['edit', 'area_id', 'edit_activity'],
    data(){
            return{
                id:'',
                nombreActividad: '',
                error: '',
                edit_area_id: ''
            }
    },
    methods: {
        registrarActividad(){
            if (!this.nombreActividad) return this.error = "El nombre es obligatorio";
            axios.post('/activities',{
                nombre: this.nombreActividad,
                area_id: this.area_id
            }).then(response => {
                location.href = '/home';
            }).catch(error => console.log(error))
        },
        editarActividad(){
            if (!this.nombreActividad) return this.error = "El nombre es obligatorio";
            axios.put('/actividad/actualizar',{                
                nombre: this.nombreActividad,
                area_id: this.edit_area_id,
                id: this.id
            }).then(response => {
                console.log(response)
                location.href = '/home';
            }).catch(error => console.log(error))
        },
        cancelar(){
            location.href = "/home"
        }
    },
    mounted(){
        if (this.edit == 2){
            this.nombreActividad = this.edit_activity.nombre;
            this.id = this.edit_activity.id;
            this.edit_area_id = this.edit_activity.area_id;
        }
        
    }
}
</script>
