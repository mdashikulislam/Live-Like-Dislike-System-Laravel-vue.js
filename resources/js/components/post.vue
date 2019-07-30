<template>
    <div class="main" >
        <div class="title">
            <h2>{{title}}</h2>
        </div>
        <div class="subtitle">
            <p>{{subtitle}}</p>
        </div>
        <div class="body">
            <p>{{body}}</p>
        </div>
        <div class="btmln">
            <p>
                Posted By <a href="">{{posted_by}}</a> {{created_at}}
                <a href="" @click.prevent="likeit">
                    <small>{{likeCount}}</small>
                    <i class="fa fa-thumbs-up"></i>
                </a>
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
            'title','subtitle','body','posted_by','created_at','login','postid','likes'
        ],
        data(){
            return {
                likeCount :0
            }
        },
        created(){
            this.likeCount = this.likes
        },
        methods:{
            likeit(){
                if (this.login){
                    axios.post('/savelike',{
                        id : this.postid
                    })
                        .then(response => {
                            this.likeCount +=1;
                            console.log(response)
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }else{
                    window.location = 'login'
                }
            }
        }
    }
</script>

<style scoped>

</style>
