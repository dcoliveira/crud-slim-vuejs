<template>
    <div class="admin-page">
        <PageTitle icon="fa fa-cogs" main="Administração do sistema" 
         sub="Cadastros" />
         <div class="admin-pages-tabs">
             <b-card no-body>
                 <b-tabs card>
                     <b-tab title="Usuários" active>
                         <UserAdmin />
                     </b-tab>
                     <b-tab title="Acervo">
                         <h1>Acervo</h1>
                     </b-tab>
                     <b-tab title="Emprétimos">
                         <h1>Emprétimos</h1>
                     </b-tab>                                           
                 </b-tabs>
             </b-card>
         </div>
    </div>
    
</template>

<script>
import PageTitle from '../template/pageTitle'
import UserAdmin from './UserAdmin.vue'
export default {
    name: 'AdminPages',
    components: { PageTitle, UserAdmin }

    
}
</script>

<style>

</style>