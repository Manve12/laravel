<template>
  <div class="fluid-container section" :id="id">
    <div class="line"></div>
    <h1 class="middle-title r-bc">Our Services</h1>
    <div class="line"></div>
    <div class="services-wrapper">
      <div class="service">
        <div class="service-image">
          <img src="/images/custom.png" alt="">
        </div>
        <div class="service-text">
          <div class="service-title r-bc">Custom Build</div>
          <div class="service-description r-bc">Have one of our expects go through your needs and assemble the machine of your dreams.</div>
        </div>
      </div>
      <div class="service">
        <div class="service-image">
          <img src="/images/upgrade.png" alt="">
        </div>
        <div class="service-text">
          <div class="service-title r-bc">Upgrades</div>
          <div class="service-description r-bc">Old and Slow? Upgrading components could help it give the boost it needs.</div>
        </div>
      </div>
      <div class="service">
        <div class="service-image">
          <img src="/images/repair.png" alt="">
        </div>
        <div class="service-text">
          <div class="service-title r-bc">Repairs</div>
          <div class="service-description r-bc">Running Slow? Doesn't turn on? Have a chat with one of the experts online.</div>
        </div>
      </div>
      <div class="service">
        <div class="service-image">
          <img src="/images/maintenance.png" alt="">
        </div>
        <div class="service-text">
          <div class="service-title r-bc">Maintenance</div>
          <div class="service-description r-bc">We can help you maintain your equipment so you don't have to panic when something goes wrong.</div>
        </div>
      </div>

      <div class="services-footer">
        <div class="services-footer-title r-bc">
          Looking for a service not listed?
        </div>
        <div class="services-footer-description r-bc">
          Contact us! We may be able to help you.
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default
  {
    props: ['id'],
  }
</script>
