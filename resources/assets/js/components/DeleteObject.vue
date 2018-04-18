<template>
  <span>
      <a class="btn btn-danger btn-sm" @click="deleteModel()" >Eliminar</a>
  </span>
</template>
<script>
export default {
    props: ['modelo','modelo_id'],
  data(){
      return{
          id: ''
      }
  },
  methods:{
      deleteModel(){
          swal({
            title: 'Estás seguro eliminarlo?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar',
            cancelButtonText: 'No, cancelar!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
            }).then((result) => {
                if (result.value) {                    
                    const id = this.modelo_id;
                    const row_id = document.getElementById(`fila${id}`);
                    axios.delete(`/${this.modelo}/`+ id)
                    .then(response =>{
                    
                        row_id.remove();
                        swal(
                        'Eliminado!',
                        'El registro se han eliminado correctamente.',
                        'success'
                        )
                    }).catch(error => console.log(error));
                    
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                    'Cancelado',
                    'Adios!!!',
                    'error'
                    )
                }
            })
      }
  }
}
</script>
