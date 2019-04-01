<template>
    <div>
        <button @click.prevent="vote" :disabled="is_voted" class="btn btn-sm btn-outline-danger pt-3 pb-3 pl-4 pr-4">
            <i class="fa fa-sort-up fa-2x" aria-hidden="true"></i>
            <p class="vote-counter"> {{ votes_count }}</p>
            </button>
    </div>
</template>

<script>
    export default {
        props: ['post'],
        data(){
            return {
                post_id: this.post.id,
                votes_count: this.post.votes_count,
                is_voted: this.post.is_voted
            }
        },
        methods: {
            voteDisabled(){
                return this.is_voted;
            },
            vote(){
                if(!this.is_voted){
                    axios.post('/vote/'+this.post_id)
                    .then(res => {
                        console.log(res.data.message)
                    })
                    this.votes_count++;
                    this.is_voted = true;
                }else{
                    alert('Already voted');
                }
            }
        },
        created(){
            Echo.channel('vote-events-'+this.post_id)
            .listen('VoteAction', function (event) {
                Fire.$emit('VotesCount'+event.data.id,event)
            })
        },
        mounted(){
            Fire.$on('VotesCount'+this.post_id,(data)=>{
                this.votes_count = data.data.votes_count
            });
        }
    }
</script>
