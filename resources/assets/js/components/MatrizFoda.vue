<template>
    <div>
        <div class="row " >
            <div class="col-md-4 col-xs-12 border-1" style="padding:0;">
                <img src="/img/foda1.jpg" alt="" class="foda-img"/>
            </div>  
            <div class="col-md-4 col-xs-12 border-1" style="border: 1px solid black">
                <h3 class="text-center">Fortalezas</h3>
                <ul class="list-group" >
                    <li class="list-group-item list-group-item-action"  
                        @click="selectActivity()" 
                        v-for="fortaleza in fortalezas" :key="fortaleza.id" 
                        :class="{active:selected}">
                            <span>{{fortaleza.slug}}</span> - {{fortaleza.nombre}}
                    </li>                                    
                </ul>
            </div>
            <div class="col-md-4 col-xs-12 border-1" style="border: 1px solid black">
                <h3 class="text-center">Debilidades</h3>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action" 
                        v-for="debilidad in debilidades" :key="debilidad.id">
                        <span>{{debilidad.slug}}</span> - {{debilidad.nombre}}
                    </li>                                    
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-12 border-1">
                <h3 class="text-center">Oportunidades</h3>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action" 
                        v-for="oportunidad in oportunidades" :key="oportunidad.id">
                        <span>{{oportunidad.slug}}</span> - {{oportunidad.nombre}}
                    </li>                                   
                </ul>
            </div>  
            <div class="col-md-4 col-xs-12 border-1">
                <h3 class="text-center">FO</h3>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action" v-if="selected == true"><i class="fa fa-check"></i>ddddd</li>                                    
                </ul>
            </div>
            <div class="col-md-4 col-xs-12 border-1">
                <h3 class="text-center">DO</h3>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action"><i class="fa fa-check"></i>dddd</li>                                    
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-12 border-1">
                <h3 class="text-center">Amenazas</h3>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action" 
                        v-for="amenaza in amenazas" :key="amenaza.id">
                        <span>{{amenaza.slug}}</span> - {{amenaza.nombre}}
                    </li>                                     
                </ul>
            </div>  
            <div class="col-md-4 col-xs-12 border-1">
                <h3 class="text-center">FA</h3>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action"><i class="fa fa-check"></i>ddddd</li>                                    
                </ul> 
            </div>
            <div class="col-md-4 col-xs-12 border-1">
                <h3 class="text-center">DA</h3>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action"><i class="fa fa-check"></i>dddd</li>                                    
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            selected: false,
            fortalezas: [],
            debilidades: [],
            amenazas: [],
            oportunidades: []
        }
    }, 
    methods:{
        selectActivity(){
            this.selected = !this.selected;
        },
        allFortalezas(){
            axios.get('/fortalezas')
            .then(res => {
                this.fortalezas = res.data;
            })
            .catch(err => console.log(err));
        },
        allDebilidades(){
            axios.get('/debilidades')
            .then(res => {
                this.debilidades = res.data;
            })
            .catch(err => console.log(err));
        },
        allOportunidades(){
            axios.get('/oportunidades')
            .then(res => {
                this.oportunidades = res.data;
            })
            .catch(err => console.log(err));
        },
        allAmenazas(){
            axios.get('/amenazas')
            .then(res => {
                this.amenazas = res.data;
            })
            .catch(err => console.log(err));
        }

    },
    created(){
        this.allFortalezas();
        this.allDebilidades();
        this.allOportunidades();
        this.allAmenazas();
    }

}
</script>

   