<template>
  <div>
    <h5 class="r-bc card-header section-header">
      <span>Closed Tickets</span>
      <button class="btn btn-primary ml-auto" type="button" data-toggle="collapse" data-target="#closed-tickets" aria-expanded="false">
        Toggle
      </button>
    </h5>
    <div id="closed-tickets" class="section-restrict collapse">
        <div class="closed-tickets">
          <div v-for="ticket in this.tickets.all_closed">
            <div class="ticket-wrapper">
              <div class="ticket-title r-bc">{{ ticket.title }}</div>
              <div class="ticket-text r-bc">{{ ticket.description }}</div>
              <div class="ticket-text r-bc">Priority: {{ ticket.priority }}</div>
              <div class="ticket-text r-bc">Replies: {{ ticket.replies.length }}</div>
              <a :href="'/tickets/' + ticket.id + '/replies'" class="ml-auto"><button type="button" class="btn r-bc">View Ticket</button></a>
            </div>
          </div>
        </div>
    </div>
  </div>
</template>

<script>
  export default{
    props:['tickets'],
  }
</script>
