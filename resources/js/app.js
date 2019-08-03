
require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('post', require('./components/post.vue').default);



const app = new Vue({
    el: '#app',
    data:{
        blog:{},

    },
    mounted(){
        axios.post('/getPost')
            .then(response => {
                this.blog = response.data
            })
            .catch(error => {
                console.log(error);
            });
    }
});
