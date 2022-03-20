<template>
  <div>
    App.vue {{ message }}
    <div>
      <ul>
        <todo-item v-for="(todo, key) in todos" :key="key" :todo="todo" />
      </ul>
    </div>
    <hr />
    <form @submit.prevent="addTodo">
      <input type="text" v-model="newTodo" autofocus />
      <button type="submit">Add</button>
    </form>
  </div>
</template>

<script>
import TodoItem from "./Todo/TodoItem.vue";

export default {
  name: "App",
  components: {
    TodoItem,
  },
  data() {
    return {
      message: "Hello Vue!",
      newTodo: "",
      todos: [
        { text: "Learn JavaScript", done: true },
        { text: "Learn Vue", done: false },
        { text: "Build something awesome", done: false },
      ],
    };
  },
  methods: {
    addTodo() {
      if (this.newTodo == "") return;
      this.todos.push({
        text: this.newTodo,
        done: false,
      });
      this.newTodo = "";
    },
  },
};
</script>
