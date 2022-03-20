<template>
  <li>
    <label>
      <input type="checkbox" v-model="todo.done" />
      {{ todo.text }}
    </label>
  </li>
</template>

<script>
export default {
  props: ["todo"],
};
</script>
