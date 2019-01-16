<template>
  <div class="fluid-container section" :id="id">
      <div class="line"></div>
      <div class="middle-title r-bc">About Us</div>
      <div class="line"></div>
        <div class="about-wrapper">
          <div class="about-logo">
            <img src="/images/logo_lg.png" alt="">
            <span class="uppercase r-bc">NETBOOST</span>
          </div>
          <div class="about-description r-bc">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            <br><br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </div>
        </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['id'],
  }
</script>
