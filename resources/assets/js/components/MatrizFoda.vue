<template>
    <div>
        <div class="row " >
            <div class="col-md-4 col-xs-12 border-1" style="padding:0;">
                <img src="/img/foda1.jpg" alt="" class="foda-img"/>
            </div>  
            <div class="col-md-4 col-xs-12 border-1" style="border: 1px solid black">
                <h3 class="text-center">Fortalezas</h3>
                <ul class="list-group padding-bottom-small" >
                    <li class="list-group-item d-flex align-items-center" 
                        v-for="fortaleza in fortalezas" :key="fortaleza.id">  
                        <span> {{fortaleza.slug}} - {{ fortaleza.nombre}} </span>  
                    </li>                                    
                </ul>
            </div>
            <div class="col-md-4 col-xs-12 border-1" style="border: 1px solid black">
                <h3 class="text-center">Debilidades</h3>
                <ul class="list-group padding-bottom-small">
                    <li class="list-group-item d-flex align-items-center" 
                        v-for="debilidad in debilidades" :key="debilidad.id">
                        <span>{{debilidad.slug}} - {{debilidad.nombre}}</span>
                    </li>                                    
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-12 border-1">
                <h3 class="text-center">Oportunidades</h3>
                <ul class="list-group padding-bottom-small">
                    <li class="list-group-item d-flex align-items-center" 
                        v-for="oportunidad in oportunidades" :key="oportunidad.id">
                        <span>{{oportunidad.slug}} - {{oportunidad.nombre}}</span>
                    </li>                                   
                </ul>
            </div>  
            <div class="col-md-4 col-xs-12 border-1">
                <div class="d-flex align-items-center justify-content-between">
                    <div style="width: 100%">
                        <h3 class="text-center">FO</h3>  
                    </div>              
                </div>            
                <ul class="list-group padding-bottom-small">
                    <template>
                        <li class="list-group-item d-flex align-items-start"
                            v-for="estra_fo in estrategia_fo" :key="estra_fo.id">
                                <div style="width: auto; margin-rigth:3px">
                                    <span class="badge badge-success" style="max-width:100%">
                                        {{estra_fo.foda}}
                                    </span>                                    
                                </div>
                                <table>
                                    <tr> 
                                        <td style="width: 100%;">
                                            <p style="padding:5px"> {{estra_fo.nombre}}</p>
                                        </td>
                                    </tr>   
                                </table>
                        </li> 
                    </template>                                    
                </ul>
            </div>
            <div class="col-md-4 col-xs-12 border-1">
                <div class="d-flex align-items-center justify-content-between">
                    <div style="width: 100%">
                        <h3 class="text-center">DO</h3>  
                    </div>             
                </div>            
                <ul class="list-group padding-bottom-small">
                    <template>
                        <li class="list-group-item d-flex align-items-start"
                            v-for="estra_do in estrategia_do" :key="estra_do.id">
                                <div style="width: auto; margin-rigth:3px">
                                    <span class="badge badge-success" style="max-width:100%">
                                        {{estra_do.foda}}
                                    </span>                                    
                                </div>
                                <table>
                                    <tr> 
                                        <td style="width: 100%;">
                                            <p style="padding:5px"> {{estra_do.nombre}}</p>
                                        </td>
                                    </tr>   
                                </table>
                        </li> 
                    </template>                                    
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-12 border-1">
                <h3 class="text-center">Amenazas</h3>
                <ul class="list-group padding-bottom-small">
                    <li class="list-group-item d-flex align-items-center" 
                        v-for="amenaza in amenazas" :key="amenaza.id">
                        <span>{{amenaza.slug}} - {{amenaza.nombre}}</span>
                    </li>  
                                                       
                </ul>
            </div>  
            <div class="col-md-4 col-xs-12 border-1">
                <div class="d-flex align-items-center justify-content-between">
                    <div style="width: 100%">
                        <h3 class="text-center">FA</h3>  
                    </div>             
                </div>
                <ul class="list-group padding-bottom-small" >                    
                    <template>
                        <li class="list-group-item d-flex align-items-start "
                            v-for="estra_fa in estrategia_fa" :key="estra_fa.id">
                                <div style="width: auto; margin-rigth:3px">
                                    <span class="badge badge-success" style="max-width:100%">
                                        {{estra_fa.foda}}
                                    </span>                                    
                                </div>
                                <table>
                                    <tr> 
                                        <td style="width: 100%;">
                                            <p style="padding:5px"> {{estra_fa.nombre}}</p>
                                        </td>
                                    </tr>   
                                </table> 
                        </li> 
                    </template>
                                                 
                </ul> 
            </div>
            <div class="col-md-4 col-xs-12 border-1">
                <div class="d-flex align-items-center justify-content-between">
                    <div style="width: 100%">
                        <h3 class="text-center">DA</h3>  
                    </div>
                                 
                </div>            
                <ul class="list-group padding-bottom-small">                    
                    <template>
                        <li class="list-group-item d-flex align-items-start"
                             v-for="estra_da in estrategia_da" :key="estra_da.id">
                                <div style="width: auto; margin-rigth:3px">
                                    <span class="badge badge-success" style="max-width:100%">
                                        {{estra_da.foda}}
                                    </span><br>                                    
                                </div>
                                <table>
                                    <tr> 
                                        <td style="width: 100%;">
                                            <p style="padding:5px"> {{estra_da.nombre}}</p>
                                        </td>                                       
                                        
                                    </tr>   
                                </table>  
                        </li> 
                    </template>                                    
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
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
    methods:{           
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
        },
        estrategiaFa(){
            axios.get('/estrategia-all/fa')
            .then(res => {                
                this.estrategia_fa = res.data;
            })
            .catch(err => console.log(err));
        },
        estrategiaFo(){
            axios.get('/estrategia-all/fo')
            .then(res => {                
                this.estrategia_fo = res.data;
            })
            .catch(err => console.log(err));
        },
        estrategiaDo(){
            axios.get('/estrategia-all/do')
            .then(res => {                
                this.estrategia_do = res.data;
            })
            .catch(err => console.log(err));
        },
        estrategiaDa(){
            axios.get('/estrategia-all/da')
            .then(res => {                
                this.estrategia_da = res.data;
            })
            .catch(err => console.log(err));
        }
        

    },
    created(){
        this.allFortalezas();
        this.allDebilidades();
        this.allOportunidades();
        this.allAmenazas();
        this.estrategiaFa();
        this.estrategiaFo();
        this.estrategiaDa();
        this.estrategiaDo();
        
    }

}
</script>



   