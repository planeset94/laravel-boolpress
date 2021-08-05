/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Axios } = require('axios');

require('./bootstrap');

// window.Vue = require('vue');
import Vue from 'vue/dist/vue.js';
// import Vue from 'vue';



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('article-component', require('./components/ArticleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#root',
    data:{
        articles:[], 
        search:''
    },
    methods:{
        filterData(){
            this.articles.forEach(el => {
                if(this.search=='All'){
                    el.visibile=true;
                }else if(el.category_id==this.search){
                    el.visibile=true;
                }else{
                    el.visibile=false;
                }
            });
        }
    },

    mounted(){
        Axios.get('/api/articles').then(resp => {
            // console.log(resp.data.data);
            this.articles=resp.data.data;
            
            this.articles.forEach(el => {
                el.visibile=true;
            });
        
        }).catch(e=>{
            console.error('Sorry!' + e);
        })
    }
});
