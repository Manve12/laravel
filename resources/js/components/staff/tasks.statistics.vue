<template>
  <div>
    <h5 class="r-bc card-header section-header">
      <span>Task Statistics</span>
      <button class="btn btn-primary ml-auto" type="button" data-toggle="collapse" data-target="#task-statistics" aria-expanded="false">
        Toggle
      </button>
    </h5>
    <div id="task-statistics" class="section-restrict collapse">
        <div class="stats">
          <div class="r-bc">Open Tasks: {{ tasks.open }}</div>
          <div class="r-bc">Closed Tasks: {{ tasks.closed }}</div>
          <div class="r-bc">Total Tasks: {{ tasks.total }}</div>
        </div>
        <div class="stats">
          <div class="r-bc">Your Open Tasks: {{ tasks.personal_open }}</div>
          <div class="r-bc">Your Closed Tasks: {{ tasks.personal_closed }}</div>
        </div>
        <div class="oldest">
          <div class="oldest-heading r-bc">Oldest Tasks</div>
          <div v-for="task in this.tasks.oldest">
            <div class="task-wrapper">
              <div class="task-title r-bc">{{ task.title }}</div>
              <div class="task-text r-bc">{{ task.description }}</div>
              <div class="task-text r-bc">Priority: {{ task.priority }}</div>
              <a :href="'/tasks/' + task.id" class="ml-auto"><button type="button" class="btn r-bc">View Task</button></a>
            </div>
          </div>
        </div>
    </div>
  </div>
</template>

<script>
  export default{
    props:['tasks'],
  }
</script>
