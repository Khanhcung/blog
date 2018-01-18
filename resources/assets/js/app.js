


require('./bootstrap');

window.Vue = require('vue');
//ddddddddddddddd

Vue.component('posts', require('./components/posts.vue'));
let url= window.location.href;
let page =url.split('=')[1];
const app = new Vue({
    el: '#app',
    data:{
    	blog:{}
    },
    mounted(){
    	axios.post('/getPosts',{
    		'page' : page
    	})
  		.then(response=>  {
  			this.blog=response.data.data
    		//console.log(response);
  		})
  		.catch(function (error) {
    	console.log(error);
  		});
    }
    
});
