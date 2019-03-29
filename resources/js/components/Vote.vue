<template>
    <div>
        <button @click.prevent="vote" :disabled="is_voted" class="btn btn-sm btn-danger text-white"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> &nbsp; Vote &nbsp;<span class="badge badge-light"> {{ votes_count }}</span></button>
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
                axios.post('/vote/'+this.post_id)
                .then(res => {
                    console.log(res.data.message)
                })
                this.votes_count++;
                this.is_voted = true;
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
