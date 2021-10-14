<template>
    <div class="home">
        <PageTitle icon="fa fa-home" main="Dashboard" 
         sub="Informações sobre o acervo" />

         <div class="stats">
            <Stat title="Usuários " :value="qtdUser"
             icon="fa fa-user" color="#3282cd"/> 
            <Stat title="Itens no acervo " :value="qtdCollection"
             icon="fa fa-address-book" color="#3bc480"/> 
            <Stat title="Itens emprestados " :value="qtdLoans"
             icon="fa fa-address-book-o" color="#d54d50"/>             
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
            qtdUser: {},
            qtdCollection: {},
            qtdLoans: {}
        }
    },
    methods: {
        getStatsUser(){
            axios.get(`${baseApiUrl}/users`).then(res => this.qtdUser = res.data.qtdUser)
        },
        getStatsCollection(){
            axios.get(`${baseApiUrl}/collection`).then(res => this.qtdCollection = res.data.qtdCollection)
        },
        getStatsLoans(){
            axios.get(`${baseApiUrl}/loans`).then(res => this.qtdLoans = res.data.qtdLoans)
        }            
    },
    mounted(){
        this.getStatsUser(),
        this.getStatsCollection(),
        this.getStatsLoans()
    }

}
</script>

<style>
    .stats {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

</style>