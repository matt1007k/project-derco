<template>
    <div>
        <div class="row " >
            <div class="col-md-4 col-xs-12 border-1" style="padding:0;">
                <img src="/img/foda1.jpg" alt="" class="foda-img"/>
            </div>  
            <div class="col-md-4 col-xs-12 border-1" style="border: 1px solid black">
                <h3 class="text-center">Fortalezas</h3>
                <ul class="list-group" >
                    <li class="list-group-item d-flex align-items-center" 
                        v-for="fortaleza in fortalezas" :key="fortaleza.id">                        
                        <span class="badge badge-primary mt-foda" @click="selectActivity()" >FO</span>     
                        <span class="badge badge-success mt-foda" @click="selectFa(fortaleza)">FA</span>
                        <span> {{fortaleza.slug}} - {{ fortaleza.nombre}} </span>  
                    </li>                                    
                </ul>
            </div>
            <div class="col-md-4 col-xs-12 border-1" style="border: 1px solid black">
                <h3 class="text-center">Debilidades</h3>
                <ul class="list-group">
                    <li class="list-group-item d-flex align-items-center" 
                        v-for="debilidad in debilidades" :key="debilidad.id">
                        <span class="badge badge-primary mt-foda">DO</span>     
                        <span class="badge badge-success mt-foda">DA</span>
                        <span>{{debilidad.slug}} - {{debilidad.nombre}}</span>
                    </li>                                    
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-12 border-1">
                <h3 class="text-center">Oportunidades</h3>
                <ul class="list-group">
                    <li class="list-group-item d-flex align-items-center" 
                        v-for="oportunidad in oportunidades" :key="oportunidad.id">
                        <span class="badge badge-primary mt-foda" @click="selectFo(oportunidad)">FO</span>  
                        <span class="badge badge-success mt-foda">DO</span>
                        <span>{{oportunidad.slug}} - {{oportunidad.nombre}}</span>
                    </li>                                   
                </ul>
            </div>  
            <div class="col-md-4 col-xs-12 border-1">
                <h3 class="text-center">FO</h3>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action" v-if="fo == true"><i class="fa fa-check"></i>F1</li>                                    
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
                    <li class="list-group-item d-flex align-items-center" 
                        v-for="amenaza in amenazas" :key="amenaza.id">
                        <span class="badge badge-primary mt-foda " @click="selectFa(amenaza, selected = true)" 
                        >FA</span>    
                        <span class="badge badge-success mt-foda">DA</span>
                        <span>{{amenaza.slug}} - {{amenaza.nombre}}</span>
                    </li>  
                                                       
                </ul>
            </div>  
            <div class="col-md-4 col-xs-12 border-1">
                <div>
                    <h3 class="text-center">FA</h3>
                    <button class="btn btn-primary btn-sm">
                        <i class="fa fa-add" @click="addFa()"></i>
                    </button>
                </div>
                <ul class="list-group">
                    <li class="list-group-item d-flex align-items-center" v-if="fa == true">
                        <div style="width: 80px;">
                            <span class="badge badge-success mt-foda" style="max-width:100%"
                                v-for="slug in slug_fa" :key="slug.faId" 
                                @click="unSelectFa(slug)">
                                {{slug.slug}}
                            </span>      

                        </div>
                        <div>
                            <textarea class="form-control full-width"  rows="2" style="margin-rigth: 2px;"></textarea>
                        </div>   
                        <div>
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil mt-foda" @click="registrarEstrategia()"></i>
                            </button><br>
                            <button class="btn btn-danger btn-sm" @click="cancel()">
                                <i class="fa fa-remove mt-foda"></i>
                            </button>
                        </div>  
                    </li>
                                                      
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
            fa: false,
            fo: false,
            slug_fa: [],
            slug_fo: [],
            slug_da: [],
            slug_do: [],
            fortalezas: [],
            debilidades: [],
            amenazas: [],
            oportunidades: [],
            estrategia_fa: [],
            estrategia_fo: [],
            estrategia_da: [],
            estrategia_do: []
        }
    },
    computed: {
    },
    methods:{
        cancel(){
            this.slug_fa = [];
            this.fa = false;
        },
        selectActivity(){
            //this.selected = !this.selected;
        },
        selectFa(fa,selected){
            this.slug_fa.push({faId: fa.id, slug: fa.slug, tipo: fa.tipo});
            const fa_item = this.fortalezas.find((fortaleza) => {
                return fortaleza.registered = true;
            });            
            this.fa = true;
           
        },
        selectFo(fo){

        },
        unSelectFa(fa){
            if(fa.tipo == "fortaleza"){
                const fa_item = this.fortalezas.find((res) => {
                    return res.id == fa.foId;
                });   
                           
            }else if(fa.tipo == "amenaza"){
                const fa_item = this.amenazas.find((res) => {
                    return res.id == fa.foId;
                });                
            }
            //fa_item.registered = false;
            
            this.slug_fa.splice(this.slug_fa.indexOf(fa), 1);

            if (this.slug_fa.length == 0){
                this.fa = false;
            } 
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

   