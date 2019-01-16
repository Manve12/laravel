<template>
  <div class="fluid-container">
    <div class="row staff">
    <div class="staff-menu">
       <ul class="list-group">
         <li class="list-group-item list-group-item-light">
           <button type="button" class="btn btn-primary float-right" data-toggle="collapse" data-target="#ticket_menu" aria-expanded="false" aria-controls="ticket_menu">Toggle</button>
           <span>Tickets</span>
         </li>
         <div class="collapse" id="ticket_menu">
           <li class="list-group-item list-group-item-dark"><button class="form-control" @click="$data.options.ticketsStatistics = !$data.options.ticketsStatistics; update()">Ticket Statistics</button></li>
           <li class="list-group-item list-group-item-dark"><button class="form-control" @click="$data.options.ticketsOpen = !$data.options.ticketsOpen; update()">Opened Tickets</button></li>
           <li class="list-group-item list-group-item-dark"><button class="form-control" @click="$data.options.ticketsClosed = !$data.options.ticketsClosed; update()">Closed Tickets</button></li>
         </div>
         <li class="list-group-item list-group-item-light">Tasks <button type="button" class="btn btn-primary float-right" data-toggle="collapse" data-target="#task_menu" aria-expanded="false" aria-controls="task_menu">Toggle</button></li>
         <div class="collapse" id="task_menu">
           <li class="list-group-item list-group-item-dark"><button class="form-control" @click="$data.options.tasksStatistics = !$data.options.tasksStatistics; update()">Task Statistics</button></li>
           <li class="list-group-item list-group-item-dark"><button class="form-control" @click="$data.options.tasksOpened = !$data.options.tasksOpened; update()">Opened Tasks</button></li>
           <li class="list-group-item list-group-item-dark"><button class="form-control" @click="$data.options.tasksClosed = !$data.options.tasksClosed; update()">Closed Tasks</button></li>
         </div>
         <li class="list-group-item list-group-item-light">Invoicing <button type="button" class="btn btn-primary float-right" data-toggle="collapse" data-target="#invoice_menu" aria-expanded="false" aria-controls="invoice_menu">Toggle</button></li>
         <div class="collapse" id="invoice_menu">
           <li class="list-group-item list-group-item-dark"><button class="form-control" @click="$data.options.invoiceStatistics = !$data.options.invoiceStatistics; update()">Invoice Statistics</button></li>
           <li class="list-group-item list-group-item-dark"><button class="form-control" @click="$data.options.invoicePaid = !$data.options.invoicePaid; update()">Paid Invoices</button></li>
           <li class="list-group-item list-group-item-dark"><button class="form-control" @click="$data.options.invoiceUnpaid = !$data.options.invoiceUnpaid; update()">Unpaid Invoices</button></li>
           <li class="list-group-item list-group-item-dark"><button class="form-control" @click="$data.options.invoiceCreate = !$data.options.invoiceCreate; update()">Create Invoice</button></li>
         </div>
       </ul>
    </div>
     <div class="staff-body">
        <TicketsStatistics v-if="this.options.ticketsStatistics" :tickets="JSON.parse(this.tickets)"></TicketsStatistics>
        <TicketsOpen v-if="this.options.ticketsOpen" :tickets="JSON.parse(this.tickets)"></TicketsOpen>
        <TicketsClosed v-if="this.options.ticketsClosed" :tickets="JSON.parse(this.tickets)"></TicketsClosed>
        <TasksStatistics v-if="this.options.tasksStatistics" :tasks="JSON.parse(this.tasks)"></TasksStatistics>
        <TasksOpened v-if="this.options.tasksOpened" :tasks="JSON.parse(this.tasks)"></TasksOpened>
        <TasksClosed v-if="this.options.tasksClosed" :tasks="JSON.parse(this.tasks)"></TasksClosed>
        <InvoiceUnpaid v-if="this.options.invoiceUnpaid" :invoices="JSON.parse(this.invoices)"></InvoiceUnpaid>
        <InvoiceStatistics v-if="this.options.invoiceStatistics" :invoices="JSON.parse(this.invoices)"></InvoiceStatistics>
        <InvoicePaid v-if="this.options.invoicePaid" :invoices="JSON.parse(this.invoices)"></InvoicePaid>
        <InvoiceCreate v-if="this.options.invoiceCreate"></InvoiceCreate>
      </div>
    </div>
  </div>
</template>

<script>
  import TicketsStatistics from './tickets.statistics.vue';
  import TicketsOpen from './tickets.open.vue';
  import TicketsClosed from './tickets.closed.vue';

  import TasksStatistics from './tasks.statistics.vue';
  import TasksOpened from './tasks.open.vue';
  import TasksClosed from './tasks.closed.vue';

  import InvoiceStatistics from './invoices.statistics.vue';
  import InvoicePaid from './invoices.paid.vue';
  import InvoiceUnpaid from './invoices.unpaid.vue';
  import InvoiceCreate from './invoices.create.vue';

  export default{
    props:['tickets', 'invoices', 'tasks'],

    components: {
      TicketsStatistics,
      TicketsOpen,
      TicketsClosed,
      TasksStatistics,
      TasksOpened,
      TasksClosed,
      InvoiceStatistics,
      InvoicePaid,
      InvoiceUnpaid,
      InvoiceCreate
    },
    data () {
      return {
        options: {
          'ticketsStatistics': false,
          'ticketsOpen': false,
          'ticketsClosed': false,

          'tasksStatistics': false,
          'tasksOpened': false,
          'tasksClosed': false,

          'invoiceStatistics': false,
          'invoicePaid': false,
          'invoiceUnpaid': false,
          'invoiceCreate': false
        },
      }
    },
    mounted(){
      this.getData();
    },
    methods: {
      getData(){
        //get users settings
        axios.get('/api/staff')
        .then(function (response){
          this.$data.options = response.data;
        }.bind(this));
      },
      update()
      {
        //set users settings
        var t = axios.post('/api/staff/update', this.$data.options).then(function (response) { console.dir (response); });
      }
    }
  }
</script>
