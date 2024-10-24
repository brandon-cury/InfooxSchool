<template>

    <section class="examensSlider slider">
      <ExamenCard v-for="examen in examens" :examen="examen" />
    </section>


</template>

<script setup>
import {onMounted, ref} from "vue";

import $ from 'jquery';
import ExamenCard from "../components/examen-card.vue";

const examens = ref([]);
let isVisible = ref(false);
onMounted(()=>{
  $.ajax({
    url: '/examen/data',
    method: 'GET',
    success: (response) => {
       examens.value = response;
       setTimeout(()=>{
         $('.examensSlider').slick({
           dots: false,
           infinite: true,
           speed: 300,
           slidesToShow: 6,
           centerMode: true,
           variableWidth: true,
           arrows: true,
           responsive: [
             {
               breakpoint: 993,
               settings: {
                 dots: false,
                 infinite: true,
                 speed: 300,
                 slidesToScroll: 4,
                 centerMode: true,
                 variableWidth: true,
                 arrows: false,
               }
             },
           ]
         });
       }, 100);
    },
    error: (error) => {
      console.error(error);
    }
  });
});

</script>
<style scoped>

/* Tablette */
@media screen and (min-width: 768px) {

}
/* endTablette */
/* Desktops */
@media screen and (min-width: 992px) {

}
/* endDesktops */
</style>