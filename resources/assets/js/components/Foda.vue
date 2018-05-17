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
                    <button class="btn btn-success btn-sm" @click="addFo()">
                        <i class="fa fa-plus-square" ></i>
                    </button>              
                </div>            
                <ul class="list-group padding-bottom-small">
                    <!-- Formulario -->
                    <transition name="form-fa" enter-active-class="animated fadeInDown" leave-active-class="animated fadeOut">
                        <li class="list-group-item d-flex align-items-center no-padding" v-if="form_fo == true">
                            <div style="width: 100px;">      
                                <textarea class="form-control" v-model="foda" cols="3" placeholder="FO"  rows="3" style="margin-rigth: 2px;width: 70px;"></textarea>  
                            </div>
                            <table>
                                <tr> 
                                    <td style="width: 100%;">
                                        <textarea class="form-control" v-model="nombre" cols="40" placeholder="Estrategia de FO" rows="3" style="margin-rigth: 2px;"></textarea>
                            
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm text-center" @click="registrarEstrategia(tipo = 'fo')">
                                            <i class="fa fa-pencil mt-foda"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm text-center" @click="cancel()">
                                            <i class="fa fa-remove mt-foda"></i>
                                        </button>
                                    </td>
                                </tr>   
                            </table>
                             
                        </li>
                    </transition>  
                    <!-- EndFormulario -->
                    <template>
                        <li class="list-group-item d-flex align-items-start no-padding">
                            <li class="list-group-item d-flex no-padding" v-for="estra_fo in estrategia_fo" :key="estra_fo.id">
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
                                        
                                        <td>
                                            <button class="btn btn-danger btn-sm text-center" @click="eliminarEstrategia(estra_fo.id)">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                        </td>
                                    </tr>   
                                </table>  
                            </li>
                        </li> 
                    </template>                                    
                </ul>
            </div>
            <div class="col-md-4 col-xs-12 border-1">
                <div class="d-flex align-items-center justify-content-between">
                    <div style="width: 100%">
                        <h3 class="text-center">DO</h3>  
                    </div>  
                    <button class="btn btn-success btn-sm" @click="addDo()">
                        <i class="fa fa-plus-square" ></i>
                    </button>              
                </div>            
                <ul class="list-group padding-bottom-small">
                    <!-- Formulario -->
                    <transition name="form-fa" enter-active-class="animated fadeInDown" leave-active-class="animated fadeOut">
                        <li class="list-group-item d-flex align-items-center no-padding" v-if="form_do == true">
                            <div style="width: 100px;">      
                                <textarea class="form-control" v-model="foda" cols="3" placeholder="DO"  rows="3" style="margin-rigth: 2px;width: 70px;"></textarea>  
                            </div>
                            <table>
                                <tr> 
                                    <td style="width: 100%;">
                                        <textarea class="form-control" v-model="nombre" cols="40" placeholder="Estrategia de DO" rows="3" style="margin-rigth: 2px;"></textarea>
                            
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm text-center" @click="registrarEstrategia(tipo = 'do')">
                                            <i class="fa fa-pencil mt-foda"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm text-center" @click="cancel()">
                                            <i class="fa fa-remove mt-foda"></i>
                                        </button>
                                    </td>
                                </tr>   
                            </table>
                             
                        </li>
                    </transition>  
                    <!-- EndFormulario -->
                    <template>
                        <li class="list-group-item d-flex align-items-start no-padding">
                            <li class="list-group-item d-flex no-padding" v-for="estra_do in estrategia_do" :key="estra_do.id">
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
                                        
                                        <td>
                                            <button class="btn btn-danger btn-sm text-center" @click="eliminarEstrategia(estra_do.id)">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                        </td>
                                    </tr>   
                                </table>  
                            </li>
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
                    <button class="btn btn-success btn-sm" @click="addFa()">
                        <i class="fa fa-plus-square" ></i>
                    </button>              
                </div>
                <ul class="list-group padding-bottom-small" >
                    <!-- Formulario -->
                    <transition name="form-fa" enter-active-class="animated fadeInDown" leave-active-class="animated fadeOut">
                        <li class="list-group-item d-flex align-items-center no-padding" v-if="form_fa == true">
                            <div style="width: 100px;">      
                                <textarea class="form-control" v-model="foda" cols="3" placeholder="FA"  rows="3" style="margin-rigth: 2px;width: 70px;"></textarea>  
                            </div>
                            <table>
                                <tr> 
                                    <td style="width: 100%;">
                                        <textarea class="form-control" v-model="nombre" cols="40" placeholder="Estrategia de FA" rows="3" style="margin-rigth: 2px;"></textarea>
                            
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm text-center" @click="registrarEstrategia(tipo = 'fa')">
                                            <i class="fa fa-pencil mt-foda" ></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm text-center" @click="cancel()">
                                            <i class="fa fa-remove mt-foda"></i>
                                        </button>
                                    </td>
                                </tr>   
                            </table>
                             
                        </li>
                    </transition>  
                    <!-- EndFormulario -->
                    <template>
                        <li class="list-group-item d-flex align-items-start no-padding">
                            <li class="list-group-item d-flex no-padding" v-for="estra_fa in estrategia_fa" :key="estra_fa.id">
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
                                        
                                        <td>
                                            <!-- Formulario 
                                            <button class="btn btn-primary btn-sm text-center">
                                                <i class="fa fa-pencil" @click="editingEstrategia()"></i>
                                            </button>
                                            -->
                                            <button class="btn btn-danger btn-sm text-center" @click="eliminarEstrategia(estra_fa.id)">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                        </td>
                                    </tr>   
                                </table>  
                            </li>
                        </li> 
                    </template>
                    <!--
                    <template >
                        <li class="list-group-item d-flex align-items-center no-padding">
                            <li class="list-group-item d-flex align-items-center no-padding">
                                <div style="width: 100px;">      
                                    <textarea class="form-control" cols="3" placeholder="FA"  rows="3" style="margin-rigth: 2px;width: 70px;">F1,A1,A2
                                    </textarea>  
                                </div>
                                <table>
                                    <tr> 
                                        <td style="width: 100%;">
                                            <textarea class="form-control" cols="40" placeholder="Estrategia"  rows="3">Monitorear los procesos de la empresa Monitorear los procesos de la empresa
                                            </textarea>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm text-center">
                                                <i class="fa fa-check" @click="actualizarEstrategiaFa()"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm text-center" @click="cancel()">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                        </td>
                                    </tr>   
                                </table> 
                            </li>
                        </li>
                    </template>
                    -->                               
                </ul> 
            </div>
            <div class="col-md-4 col-xs-12 border-1">
                <div class="d-flex align-items-center justify-content-between">
                    <div style="width: 100%">
                        <h3 class="text-center">DA</h3>  
                    </div>  
                    <button class="btn btn-success btn-sm" @click="addDa()">
                        <i class="fa fa-plus-square" ></i>
                    </button>              
                </div>            
                <ul class="list-group padding-bottom-small">
                    <!-- Formulario -->
                    <transition name="form-fa" enter-active-class="animated fadeInDown" leave-active-class="animated fadeOut">
                        <li class="list-group-item d-flex align-items-center no-padding" v-if="form_da == true">
                            <div style="width: 100px;">      
                                <textarea class="form-control" v-model="foda" cols="3" placeholder="DA"  rows="3" style="margin-rigth: 2px;width: 70px;"></textarea>  
                            </div>
                            <table>
                                <tr> 
                                    <td style="width: 100%;">
                                        <textarea class="form-control" v-model="nombre" cols="40" placeholder="Estrategia de DA" rows="3" style="margin-rigth: 2px;"></textarea>
                            
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm text-center" @click="registrarEstrategia(tipo = 'da')">
                                            <i class="fa fa-pencil mt-foda"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm text-center" @click="cancel()">
                                            <i class="fa fa-remove mt-foda"></i>
                                        </button>
                                    </td>
                                </tr>   
                            </table>
                             
                        </li>
                    </transition>  
                    <!-- EndFormulario -->
                    <template>
                        <li class="list-group-item d-flex align-items-start no-padding">
                            <li class="list-group-item d-flex no-padding" v-for="estra_da in estrategia_da" :key="estra_da.id">
                                <div style="width: auto; margin-rigth:3px">
                                    <span class="badge badge-success" style="max-width:100%">
                                        {{estra_da.foda}}
                                    </span>                                    
                                </div>
                                <table>
                                    <tr> 
                                        <td style="width: 100%;">
                                            <p style="padding:5px"> {{estra_da.nombre}}</p>
                                        </td>
                                        
                                        <td>
                                            <button class="btn btn-danger btn-sm text-center" @click="eliminarEstrategia(estra_da.id)">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                        </td>
                                    </tr>   
                                </table>  
                            </li>
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
            editing: false,
            form_fa: false,
            form_fo: false,
            form_da: false,
            form_do: false,
            nombre: '',
            foda: '',
            tipo: '',
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
        cancel(){
            this.form_fa = false;
            this.form_fo = false;
            this.form_da = false;
            this.form_do = false;
            this.foda = '';
            this.nombre= '';
        },
        addFa(){
            this.form_fo = false;
            this.form_da = false;
            this.form_do = false;
            this.form_fa = !this.form_fa;
            this.foda = '';
            this.nombre= '';
        }, 
        addFo(){
            this.form_fa = false;
            this.form_da = false;
            this.form_do = false;
            this.form_fo = !this.form_fo;
            this.foda = '';
            this.nombre= '';
        },
        addDa(){
            this.form_fa = false;
            this.form_fo = false;
            this.form_do = false;
            this.form_da = !this.form_da;
            this.foda = '';
            this.nombre= '';
        },
        addDo(){
            this.form_fa = false;
            this.form_fo = false;
            this.form_da = false;
            this.form_do = !this.form_do;
            this.foda = '';
            this.nombre= '';
        },
        editingEstrategia(){
            this.editing = true;
        },
        registrarEstrategia(tipo){
            axios.post('/estrategias',{
                foda: this.foda,
                nombre: this.nombre,
                tipo: tipo,
            }).then(res => {
                console.log(res.data);
                window.location.href = 'foda';
                this.foda = '';
                this.nombre= '';
                this.form_fa = false;
            }).catch(error => console.log(error));
        },  
        eliminarEstrategia(id){
            axios.delete('/estrategias/'+id).then(res => {
                console.log(res.data);
                window.location.href = 'foda';
            }).catch(error => console.log(error));
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



   