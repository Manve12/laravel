<template>
  <div>
    <h5 class="r-bc card-header section-header">
      <span>Ticket Statistics</span>
      <button class="btn btn-primary ml-auto" type="button" data-toggle="collapse" data-target="#ticket-statistics" aria-expanded="false">
        Toggle
      </button>
    </h5>
    <div id="ticket-statistics" class="section-restrict collapse">
        <div class="stats">
          <div class="r-bc">Open Tickets: {{ tickets.open }}</div>
          <div class="r-bc">Closed Tickets: {{ tickets.closed }}</div>
          <div class="r-bc">Total Tickets: {{ tickets.total }}</div>
        </div>
        <div class="oldest-tickets">
          <div class="oldest-tickets-heading r-bc">Oldest Tickets</div>
          <div v-for="ticket in this.tickets.oldest">
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
