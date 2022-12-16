<template>
  <div id="app">
    <vheader></vheader>
    <vinput v-on:addTodo="addTodo"></vinput>
    <vlist v-bind:propsdata="todoItems" @removeTodo="removeTodo"></vlist>
    <vfooter v-on:removeAll="clearAll"></vfooter>
  </div>
</template>

<script>
import header from './components/TodoHeader.vue'
import footer from './components/TodoFooter.vue'
import list from './components/TodoList.vue'
import input from './components/TodoInput.vue'
import json from './components/data/room.json'

export default {
  data() {
    return {
      todoItems : json
    }
  },
  // created() {
  //       if (localStorage.length > 0) {
  //           for(let i = 0; i < localStorage.length; i++){
  //             let item = JSON.parse(localStorage.key(i));
  //             this.todoItems.push(item);
  //           }
  //       }
  //   },
  methods : {
    addTodo(todoItem) {
      localStorage.setItem(todoItem, todoItem);
    },
    clearAll(){
      localStorage.clear();
      this.todoItems = [];
    },
    removeTodo(todoItem, index){
      localStorage.removeItem(todoItem);
      this.todoItems.splice(index, 1);
    }
  },
  components : {
    'vheader' : header,
    'vfooter' : footer,
    'vlist' : list,
    'vinput' : input
  }
}
</script>

<style>
    body {
        text-align : center;
        background-color : #ddddeb;
    }
    input {
        margin:0;
        padding:0;
        border-style:groove;
    }
    button {
        border-style:groove;
    }
    .shadow {
        box-shadow: 5px 10px 10px rgba(0, 0, 0, 0.03);
    }
</style>
