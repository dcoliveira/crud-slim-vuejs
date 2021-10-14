import Vue from 'vue'
import Toasted from 'vue-toasted'

Vue.use(Toasted, {
    iconPack: 'fontawesome',
    duration: 3000
})

Vue.toasted.register(
    'defaltSuccess',
    payload => !payload.msg ? 'Operação realizada com sucesso!' : payload.msg, 
    { type: 'success', icon: 'check' }
)

Vue.toasted.register(
    'defaltError',
    payload => !payload.msg ? 'Operação não realizada!': payload.msg,
    {type: 'error', icon: 'times'}
)