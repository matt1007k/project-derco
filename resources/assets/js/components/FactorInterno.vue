<template>
    <form>
        <h4>Importancia de éxito</h4>
        <div class="form-group row">
            <label for="alta" class="col-2 col-form-label">Alta (3)</label>
            <div class="col-10">
                <input class="form-control" type="number" v-model="activity.alta"/>
            </div>
        </div>
        <div class="form-group row">
            <label for="media" class="col-2 col-form-label">Media (2)</label>
            <div class="col-10">
                <input class="form-control" type="number" v-model="activity.media"  />
            </div>
        </div>
        <div class="form-group row">
            <label for="baja" class="col-2 col-form-label">Baja (1)</label>
            <div class="col-10">
                <input class="form-control" type="number" v-model="activity.baja" />
            </div>
        </div>
        <h4>Desempeño de la empresa</h4>
        <div class="form-group row">
            <label for="muy_bueno" class="col-2 col-form-label">Muy bueno (2)</label>
            <div class="col-10">
                <input class="form-control" type="number" v-model="activity.muy_bueno" />
            </div>
        </div>
        <div class="form-group row">
            <label for="bueno" class="col-2 col-form-label">Bueno (1)</label>
            <div class="col-10">
                <input class="form-control" type="number" v-model="activity.bueno"  />
            </div>
        </div>
        <div class="form-group row">
            <label for="deficiente" class="col-2 col-form-label">Deficiente (-1)</label>
            <div class="col-10">
                <input class="form-control" type="number" v-model="activity.deficiente"  />
            </div>
        </div>
        <div class="form-group row">
            <label for="muy_deficiente" class="col-2 col-form-label">Muy Deficiente (-2)</label>
            <div class="col-10">
                <input class="form-control" type="number" v-model="activity.muy_deficiente" />
            </div>
        </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" @click="updateAct()">Registrar</button> 
        <a @click="cancelar()" class="btn btn-danger pull-rigth">Cancelar</a>               
        
    </div>
</form>
</template>
<script>
export default {
    props: ['actividad', 'aid', 'url'],
    data(){
        return{
            activity: {
                alta: 0,
                media: 0,
                baja: 0,
                muy_bueno: 0,
                bueno: 0,
                deficiente: 0,
                muy_deficiente: 0
            },
            id: ''
        }
    },
    methods:{
        updateAct(){
            axios.put('/actividad-interno/',{
            actividad: this.activity,
            id: this.id               
            }).then(response => {
                console.log(response);
                //location.href = 'factores-internos';
                
            }).catch(error => console.error(error));
        },
        cancelar(){
            location.href = this.url;
        }
    },
    mounted(){
        this.aid = this.id;
        this.actividad = this.activity;
    }
}
</script>

