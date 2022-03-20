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
      todos: [],
    };
  },
  methods: {
    addTodo() {
      if (this.newTodo == "") return;
      axios
        .post("todos", {
          text: this.newTodo,
        })
        .then((response) => {
          this.todos.push(response.data);
        });
      this.newTodo = "";
    },
  },
  beforeMount() {
    //  get todos from api with axios
    axios.get("todos").then((response) => {
      this.todos = response.data;
    });
  },
};
</script>
