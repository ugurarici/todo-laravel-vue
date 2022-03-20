<template>
  <li>
    <span v-if="editing">
      <form @submit.prevent="updateText">
        <input type="text" v-model="text" />
        <button type="submit">Save</button>
        <button type="button" @click="editing = false">Cancel</button>
      </form>
    </span>
    <span v-else>
      <label>
        <input type="checkbox" v-model="done" />
        {{ text }}
      </label>
      <button @click="editing = true">Edit</button>
    </span>
  </li>
</template>

<script>
export default {
  props: ["todo"],
  data() {
    return {
      editing: false,
      done: this.todo.done,
      text: this.todo.text,
    };
  },
  methods: {
    updateText() {
      axios
        .put("todos/" + this.todo.id, {
          text: this.text,
        })
        .then((response) => {
          this.todo.text = this.text;
          this.editing = false;
        });
    },
  },
  watch: {
    done() {
      axios
        .put("todos/" + this.todo.id, {
          done: this.done,
        })
        .then((response) => {
          this.todo.done = this.done;
          this.todo.completed_at = response.data.completed_at;
        });
    },
  },
};
</script>
