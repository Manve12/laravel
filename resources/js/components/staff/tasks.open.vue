<template>
  <div>
    <h5 class="r-bc card-header section-header">
      <span>Open Tasks</span>
      <button class="btn btn-primary ml-auto" type="button" data-toggle="collapse" data-target="#opened-tasks" aria-expanded="false">
        Toggle
      </button>
    </h5>
    <div id="opened-tasks" class="section-restrict collapse">
        <div class="text-center" v-if="this.tasks.all_open.length == 0">Currently no tasks available</div>
        <div v-else class="open-task">
          <div v-for="task in this.tasks.all_open">
            <div class="task-wrapper">
              <div class="task-title r-bc">{{ task.title }}</div>
              <div class="task-text r-bc">{{ task.description }}</div>
              <div class="task-text r-bc">Priority: {{ task.priority }}</div>
              <a :href="'/task/' + task.id" class="ml-auto"><button type="button" class="btn r-bc">View Task</button></a>
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
