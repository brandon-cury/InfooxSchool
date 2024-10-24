<template>
  <div class="col col-6 col-lg-4">
    <a href="#">
      <img src="/filieres/image.png" style="width: 100%;" :alt="filiere.title">
      <h2>{{ filiere.title }}</h2>
    </a>
  </div>
</template>
<script setup>
defineProps(["filiere"]);
</script>
<style scoped>

</style>