<template>
  <div id="app">
    <vheader></vheader>
    <vinput v-on:addTodo="addTodo"></vinput>
    <vlist v-bind:propsdata="todoItems" @removeTodo="removeTodo"></vlist>
    <vfooter v-on:removeAll="clearAll"></vfooter>
  </div>
</template>

<script>
import fs from 'fs';
const dataBuffer = fs.readFile('./components/data/room.json')
console.log(dataBuffer);

// const dataJSON = dataBuffer.toString()
// const data = JSON.parse(dataJSON)
// console.log(data);

import header from './components/TodoHeader.vue'
import footer from './components/TodoFooter.vue'
import list from './components/TodoList.vue'
import input from './components/TodoInput.vue'

export default {
  data() {
    return {
      todoItems : json
    }
  },
  methods : {
    addTodo(todoItem) {

    },
    clearAll(){
      localStorage.clear();
      this.todoItems = [];
    },
    removeTodo(todoItem, id){

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
