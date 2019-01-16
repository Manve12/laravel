<template>
  <div>
    <h5 class="r-bc card-header section-header">
      <span>Create Invoice</span>
      <button class="btn btn-primary ml-auto" type="button" data-toggle="collapse" data-target="#create-invoice" aria-expanded="false">
        Toggle
      </button>
    </h5>
    <div id="create-invoice" class="section-restrict collapse">
       <div class="create-invoice-wrapper">
         <form class="form-group" action="/invoices" method="post">
           <input type="hidden" name="_token" :value="csrf">
           <input class="form-control r-bc" type="text" name="title" placeholder="Title..." autocomplete="off" required>
           <textarea class="form-control r-bc" name="description" rows="8" placeholder="Description..." required></textarea>
           <input class="form-control r-bc" type="number" step="0.01" name="amount" placeholder="Amount..." autocomplete="off" required>
           <button class="form-control r-bc" type="submit" name="button">Submit</button>
         </form>
       </div>
     </div>
  </div>
</template>

<script>
  export default{
    data: () => ({
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          }),
  }
</script>
