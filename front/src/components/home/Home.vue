<template>
    <div class="home">
        <PageTitle icon="fa fa-home" main="Dashboard" 
         sub="Informações sobre o acervo" />

         <div class="stats">
            <Stat title="Usuário" :value="stat"
             icon="fa fa-folder" color="#3282cd"/> 
            <Stat title="Item no acervo " :value="stat.items"
             icon="fa fa-folder" color="#3bc480"/> 
            <Stat title="Item emprestados " :value="stat.emprestados"
             icon="fa fa-folder" color="#d54d50"/>             
         </div>
            
    </div>   
</template>

<script>
import PageTitle from '../template/pageTitle'
import Stat from './Stat'
import axios from 'axios'
import { baseApiUrl } from '@/global'

export default {
    name: 'Home',
    components: { PageTitle, Stat },
    data: function(){
        return {
            stat: {}
        }
    },
    methods: {
        getStats(){
            axios.get(`${baseApiUrl}/user`,{crossDomain: false})
            .then((res) => {
                this.stat = res.data.users
                console.log(res.data);
            })
            .catch((error) => {
                console.log(error);
            })
            
        }
    },
    mounted(){
        this.getStats()
    }

}
</script>

<style>

</style>