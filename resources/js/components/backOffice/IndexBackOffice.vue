<template>
    <div>
        
        <h1>IndexBackOffice</h1>
        <ShopsBackOffice :shop="this.shops"/>
        {{ console.log(this.shops)
         }}
    </div>
</template>

<script>
import { mapState } from 'pinia'
import { useShopStore } from '../../stores/shopStore';
import ShopsBackOffice from './shopsBackOffice.vue'
export default {
 name : 'IndexBackOffice', 
 components : {ShopsBackOffice},
 computed :{
    ...mapState(useShopStore , ['shops']),
 }
}
</script>

<style lang="scss" scoped>

</style>