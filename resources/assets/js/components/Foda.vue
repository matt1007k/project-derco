<template>
  
</template>

<script>
import {mapState} from 'vuex';
export default {
    computed: {
        activities(){
            $store.state.activities;
        }
    }, 
    created(){
        this.$store.dispatch("getActivities");
    }
}
</script>
