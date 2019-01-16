<template>
  <div :id="id" class="fluid-container section">
    <div class="line"></div>
    <div class="middle-title r-bc">Contact Us</div>
    <div class="line"></div>
    <form class="contact-wrapper r-bc">
      <input type="text" name="name" autocomplete="off" placeholder="Name"/>
      <input type="text" name="email" autocomplete="off" placeholder="Email"/>
      <input type="text" name="phonenumber" autocomplete="off" placeholder="Phone number"/>
      <textarea name="message" placeholder="Message"></textarea>
      <button type="submit">Send</button>
    </form>
  </div>
</template>

<script>
  export default {
    props: ['id'],
  }
</script>
