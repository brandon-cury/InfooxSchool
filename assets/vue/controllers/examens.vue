<template>

    <section class="examensSlider slider">
      <ExamenCard v-for="examen in examens" :examen="examen" />

    </section>


</template>

<script setup>
import {computed, onMounted, ref, nextTick} from "vue";

import $ from 'jquery';
import ExamenCard from "../components/examen-card.vue";

const tab = ref(['jetaime', 'ddd', 'dxc']);
const examens = ref([]);
let isVisible = ref(false);
onMounted(()=>{
  $.ajax({
    url: '/examen/data',
    method: 'GET',
    success: (response) => {
       examens.value = response;
       isVisible.value = true;
       setTimeout(()=>{
         $('.examensSlider').slick({
           dots: false,
           infinite: true,
           speed: 300,
           slidesToShow: 1,
           centerMode: true,
           variableWidth: true,
           arrows: false,
         });
       }, 100);

      /*$('.examensSlider').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true,
        arrows: false,
      });*/
      //isVisible.value = true;
      //activeSlider();
    },
    error: (error) => {
      console.error(error);
    }
  });
});
const activeSlider = ()=>{
  alert('dddAA');
  $('.examensSlider').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    centerMode: true,
    variableWidth: true,
    arrows: false,
  });
  if(isVisible.value == true){
    $(document).on('ready', function() {

    });
  }
};




</script>
<style scoped>

* {
  box-sizing: border-box;
}
.slider {
  bottom: 50px;
  width: 100%;
}

.slick-slide {
  margin: 0px 20px;
}

.slick-slide img {
  width: 100%;
}

.slick-prev:before,
.slick-next:before {
  color: black;
}

.slick-slide {
  transition: all ease-in-out .3s;
  opacity: .2;
}

.slick-active {
  opacity: .5;
}

.slick-current {
  opacity: 1;
}
.card{
  width: 250px !important;
  text-decoration: none;
  margin-left: 30px;
}
.card .imgInfoox{
  position: relative;
  width: 80%;
  height: 150px;
  overflow: hidden;
  margin: 10px auto;
}
.card .imgInfoox img{
  width:  100%;
  height: auto;
  max-height: 150px;
}
.card .card-body .card-title{
  color:#E31524;
}
/* Tablette */
@media screen and (min-width: 768px) {

}
/* endTablette */
/* Desktops */
@media screen and (min-width: 992px) {

}
/* endDesktops */
</style>