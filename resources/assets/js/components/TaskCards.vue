<style scoped>
.editTask {
  position:absolute;
  bottom:.37em;
  right:.37em;
}

.btn-timer {
  margin-top: 2em;
}
.task-title {
  margin-bottom: 1em;
}
</style>

<template>
  <div>
    <!-- show all the tasks -->
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div v-for="task in tasks" :key="task.id" class="card mb-6 shadow-sm"  style="margin-top:2em; background-color:#e8f4f8;">
                <div class="card-body">

                  <!-- centered message content-->
                  <div class="d-flex justify-content-center">

                    <div class="col-8 align-items-center">

                      <h4 class="card-title task-title">
                        <div class="row">
                          <div class="col">
                            {{task.project.name}}
                          </div>
                          <div class="col">
                            <span style="float:right">Company Name</span>
                          </div>
                        </div>
                      </h4>
                      <h2 class="card-title my-auto">
                          {{task.description}}
                      </h2>
                      <!-- If task is not active, show start button -->
                      <button v-if="!isActive(task)"
                        @click="startTask(task)"
                        class="btn btn-sm btn-primary btn-timer">
                          Start Timer
                        </button>
                      <!-- If task is active, show stop button -->
                      <button v-else
                        @click="stopTask(task)"
                        class="btn btn-sm btn-danger btn-timer">
                          Stop Timer
                        </button>
                        <!-- Allow user to edit task -->
                        <button
                          @click="editTask(task)"
                          class="btn btn-info btn-sm btn-timer">
                            Edit Task
                        </button>
                    </div>

                  </div>
                  <!-- centered message content-->


                </div>
            </div>
        </div>
    </div>
    <!-- done showing all the tasks -->

    <!-- show edit modal if appropriate -->
      <task-edit-modal
        v-if="showEditModal"
        :propObj = "taskObject"
        @closedTaskEditModal="showEditModal = false"
        @savedTaskEditModal="savedTask()">
      </task-edit-modal>

  </div>
</template>

<script>
export default {
  // Name: 'tasks',
  Name: 'task-cards',
  mounted() {
    this.getTasks();
  },

  props: [
    'user',
    'csrf_token'
  ],
  data() {
    return {
      tasks: [],
      taskActive: false,
      showEditModal: false,

      taskObject: {
        editTask: null,
        userID: this.user.id,
        csrf_token: this.csrf_token,
      },

    };
  },
  methods: {
    getTasks(url = '/api/tasks') {
      axios.get(url)
        .then(response => {
          console.log(response.data);
          this.tasks = response.data;
        })
        .catch(errors => {
          console.log(errors);
        });
    },
    editTask(task) {
      this.showEditModal = true;
      this.taskObject.editTask = task;
    },
    savedTask() {
      this.showEditModal = false;
      this.getTasks();
    },
    startTask(task) {
      let url = "api/taskUser";

      axios.post(url, task)
        .then(response => {
          console.log(response.data);
        })
        .catch(errors => {
          console.log(errors);
        });

        this.getTasks();
    },
    stopTask(task) {
      let timerId;

      if(task.timer) {
        if(task.timer.length > 0) {
          if(task.timer[task.timer.length - 1].stopped_at == null) {
            timerId = task.timer[task.timer.length - 1].id;
          }
        }
      }

      let url = "api/taskUser/" + timerId;

      axios.put(url, task, timerId)
        .then(response => {
          console.log(response.data);
        })
        .catch(errors => {
          console.log(errors);
        });

        this.getTasks();
    },
    isActive(task) {
      if(task.timer) {
        if(task.timer.length > 0) {
          if(task.timer[task.timer.length - 1].stopped_at == null) {
            return true;
          }
        }
      }
      return false;
    }
  },
  computed: {

  },
};
</script>
