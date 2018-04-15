<template>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-body" v-if="edit == 0">
                   <input type="text" class="form-control" v-model="nombreActividad" placeholder="Ingrese la actividad" />
                </div>
                <div class="card-body" v-if="edit == 1">
                   <input type="text" class="form-control" v-model="nombreActividad" placeholder="Ingrese la actividad" />
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        props: ['area_id'],
        data(){
            return{
                nombreActividad: '',
                area: {
                    nombre: ''
                }
            }
        },
        methods: {
            registrarActividad(){
                axios.post('/activities',{
                    'nombre': this.nombreActividad,
                    'area_id': this.area_id
                })
                .then(response => {
                    
                }).catch(error => console.log);
            },
            editarActividad(){
                axios.put('/activities',{
                    'nombre': this.nombreActividad,
                    'area_id': this.area_id
                })
                .then(response => {
                    
                }).catch(error => console.log);
            }
        },
        mounted() {
            console.log(this.area.nombre);
        }
    }
</script>
