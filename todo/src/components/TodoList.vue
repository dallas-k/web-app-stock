<template>
    <section>
        <transition-group name="list" tag="ul">
            <div v-for="(todoItem, index) in propsdata" :key='todoItem' class="shadow">
                <span>{{todoItem.name}}</span>
                <span>{{todoItem.price}}</span>
                <span>{{todoItem.count}}</span>
                <span>{{todoItem.category}}</span>
                <span>{{todoItem.date}}</span>
                <span class="removeBtn" type="button" @click="removeTodo(todoItem, todoItem.id)">
                <i class="far fa-trash-alt" aria-hidden="true"></i>
                </span>
            </div>
        </transition-group>
    </section>
</template>

<script>
export default {
    props : {
        propsdata : Object
    },
    methods : {
        removeTodo(todoItem, id) {
            this.$emit('removeTodo', todoItem, id)
        }
    }
}
</script>

<style scoped>
    div {
        padding-left: 0px;
        margin-top: 0;
        text-align: left;
        display:flex;
    }
    span {
        min-height: 50px;
        height:50px;
        line-height:50px;
        margin:0.5rem 0;
        padding:0 0.9rem;
        background:white;
        border-radius:5px;
        width:18%;
        text-align:center;
    }
    .checkBtn{
        line-height:45px;
        color:#62acde;
        margin-right: 5px;
    }
    .removeBtn{
        margin-right: auto;
        color:#de4343;
        width:10%;
    }
    .list-enter-active, .list-leave-active{
        transition: all 1s;
    }
    .list-enter, .list-leave-to {
        opacity: 0;
        transform: translateY(30px);
    }
</style>