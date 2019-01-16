<template>
  <div class="fluid-container">
    <slick
      ref="slick"
      :options="slickOptions"
    >
      <div class="image-carousel">
        <img src="/images/carousel/custom.jpg" alt="">
        <div class="overlay">
            <span class="overlay-title r-bc">Build Your Dream Machine</span>
            <span class="overlay-description r-bc">Experience endless memories</span>
            <a href="#contact" class="overlay-button r-bc">
                Get In Touch
            </a>
        </div>
      </div>
      <div class="image-carousel">
        <img src="/images/carousel/repair.jpg" alt="">
        <div class="overlay">
            <span class="overlay-title r-bc">Stopped Working? Running Slow?</span>
            <span class="overlay-description r-bc">Don't trash it! We can repair it.</span>
            <a href="#contact" class="overlay-button r-bc">
                Get In Touch
            </a>
        </div>
      </div>
      <div class="image-carousel">
        <img src="/images/carousel/maintenance.jpg" alt="">
        <div class="overlay">
            <span class="overlay-title r-bc">Need A Constant Boost?</span>
            <span class="overlay-description r-bc">Let us maintain your equipment for you.</span>
            <a href="#contact" class="overlay-button r-bc">
                Get In Touch
            </a>
        </div>
      </div>
      <div class="image-carousel">
        <img src="/images/carousel/upgrade.jpg" alt="">
        <div class="overlay">
            <span class="overlay-title r-bc">Want Better Performance?</span>
            <span class="overlay-description r-bc">Let's upgrade it!</span>
            <a href="#contact" class="overlay-button r-bc">
                Get In Touch
            </a>
        </div>
      </div>
    </slick>
  </div>
</template>
<script>
import Slick from 'vue-slick';

export default {
    components: { Slick },

    data() {
        return {
            slickOptions: {
              slidesToShow: 1,
              slidesToScroll: 1,
              autoplay: true,
              autoplaySpeed: 5000,
              arrows:false
            },
        };
    },

    methods: {
        next() {
            this.$refs.slick.next();
        },

        prev() {
            this.$refs.slick.prev();
        }
    }
}
</script>
