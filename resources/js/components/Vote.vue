<template>
    <div>
        <a class="btn btn-sm btn-danger"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> &nbsp; Vote &nbsp;<span class="badge badge-light"> {{ votes_count }}</span></a>
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
            }
        }
    }
</script>
