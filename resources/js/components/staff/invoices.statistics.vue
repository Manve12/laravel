<template>
  <div>
    <h5 class="r-bc card-header section-header">
      <span>Invoice Statistics</span>
      <button class="btn btn-primary ml-auto" type="button" data-toggle="collapse" data-target="#invoice-statistics" aria-expanded="false">
        Toggle
      </button>
    </h5>
    <div id="invoice-statistics" class="section-restrict collapse">
       <div class="stats">
        <div class="r-bc">Total Amount: £{{ Number((invoices.amount).toFixed(2)) }}</div>
        <div class="r-bc">Invoice Average: £{{ Number((invoices.average).toFixed(2)) }}</div>
        <div class="r-bc">Total Number of Invoices: {{ invoices.total }}</div>
      </div>
      <div class="stats">
       <div class="r-bc">Number of Paid Invoices: {{ invoices.paid.length }}</div>
       <div class="r-bc">Number of Unpaid Invoices: {{ invoices.total - invoices.paid.length }}</div>
     </div>
    </div>
  </div>
</template>

<script>
  export default{
    props:['invoices'],
  }
</script>
