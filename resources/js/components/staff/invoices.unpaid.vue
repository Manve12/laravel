<template>
  <div>
    <h5 class="r-bc card-header section-header">
      <span>Unpaid Invoices</span>
      <button class="btn btn-primary ml-auto" type="button" data-toggle="collapse" data-target="#unpaid-invoice" aria-expanded="false">
        Toggle
      </button>
    </h5>
    <div id="unpaid-invoice" class="section-restrict collapse">
      <div class="stats">
       <div class="r-bc">Number of Unpaid Invoices: {{ invoices.paid.length }}</div>
     </div>
     <div v-for="invoice in this.invoices.unpaid">
       <div class="invoice-wrapper">
         <div class="invoice-title r-bc">{{ invoice.title }}</div>
         <div class="invoice-text r-bc">{{ invoice.description }}</div>
         <div class="invoice-text r-bc">Amount: £{{ invoice.amount }}</div>
         <a :href="'/invoices/' + invoice.id" class="ml-auto"><button type="button" class="btn r-bc">View Invoice</button></a>
       </div>
     </div>
    </div>
  </div>
</template>

<script>
  export default{
    props:['invoices'],
  }
</script>
