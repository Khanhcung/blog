<template>
    <div class="post-preview">
            <a :href="slug">
                <h2 class="post-title">
                    {{ title }}
                </h2>
                <h3 class="post-subtitle">
                    {{ subtitle }}
                </h3>
            </a>
            <p class="post-meta">Posted by <a href="#">Admin</a> on{{ created_at }}
                <a href="" @click.prevent="likeIt">
                <small>{{ likeCount }}</small>
                <i class="fa fa-thumbs-up" style="color: red;" v-if="check == 'check'" aria-hidden="true"></i>
                <i class="fa fa-thumbs-up"  v-if="check == 'not check'" aria-hidden="true"></i>
                <i class="fa fa-thumbs-up"  v-if="check == ''" aria-hidden="true"></i>
                </a>
            </p>

    </div>
</template>

<script>
    export default {
        data(){
            return{
                likeCount:0,
                check:""
                
            }
        },
        props:[
         'title','subtitle','created_at','slug','postId','login','likes'
        ],
        created(){
            this.likeCount = this.likes
        },
        mounted(){
                if (this.login) {
                     axios.post('/liked',{
                    id :this.postId
                    })
                    .then(response=>  {
                        if (response.data == 'liked' ){
                            this.check = "check"
                        }
                        else{
                            if (response.data == 'not like') {
                                this.check = "not check"
                            }
                            
                        }
                    //this.blog=response.data.data
                    //console.log(response);
                    })
                    .catch(function (error) {
                    console.log(error);
                    });
                }
        },
        methods:{
            likeIt(){
                if (this.login) {
                     axios.post('/savelike',{
                    id :this.postId
                    })
                    .then(response=>  {
                        if (response.data == 'deleted' ){
                            this.likeCount -=1
                        }
                        else{
                            this.likeCount+=1
                        }
                    //this.blog=response.data.data
                    //console.log(response);
                    })
                    .catch(function (error) {
                    console.log(error);
                    });

                     axios.post('/liked',{
                    id :this.postId
                    })
                    .then(response=>  {
                        if (response.data == 'liked' ){
                            this.check = "check"
                        }
                        else{
                            if (response.data == 'not like') {
                                this.check = "not check"
                            }
                            
                        }
                    //this.blog=response.data.data
                    //console.log(response);
                    })
                    .catch(function (error) {
                    console.log(error);
                    });
                }
                else{
                    window.location = 'http://localhost:8000/login'
                }
            }
        }
    }

</script>
