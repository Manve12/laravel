<template>
  <div class="fluid-container section" :id="id">
    <div class="line"></div>
    <h1 class="middle-title r-bc">Our Benefits</h1>
    <div class="line"></div>
    <div class="benefits-wrapper">
      <div class="benefit">
        <img src="/images/marker.png" alt="marker">
        <div class="benefit-title r-bc">Local Collection</div>
        <div class="benefit-description r-bc">Devices picked up locally so you don't have to leave your house.</div>
      </div>
      <div class="benefit">
        <img src="/images/time.png" alt="time">
        <div class="benefit-title r-bc">7 Day Repair Promise</div>
        <div class="benefit-description r-bc">7 days to make sure the device was repaired successfully.</div>
      </div>
      <div class="benefit">
        <img src="/images/online.png" alt="online">
        <div class="benefit-title r-bc">Online Booking</div>
        <div class="benefit-description r-bc">Skip the visit to the shop and book a collection online.</div>
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
