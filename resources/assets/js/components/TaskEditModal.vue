<template>
  <div class="modal fade show"
    id="modalLRFormDemo"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel"
    style="display: block; overflow-y:auto;"
    aria-modal="true"
    >
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
          <div class="container-fluid">
          <textarea rows="3" class="form-control" style="min-width: 100%" v-model="propObj.editTask.description"></textarea>
          <div v-for="timer in propObj.editTask.timer" :key="propObj.editTask.timer.id">
            <!-- Start and Stop Times -->
            <div class="row" style="margin-top:2em;">
              <div class="col">
                <label>Started At</label>
                <input type="text" v-model="timer.started_at" name="started_at" class="form-control">
              </div>
              <div class="col">
                <label>Stopped At</label>
                <input type="text" v-model="timer.stopped_at" name="stopped_at" class="form-control">
              </div>
            </div>
            <!-- Start and Stop Times -->
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" @click="saveTaskEdit()">Save</button>
          <button type="button" class="btn btn-secondary" @click="$emit('closedTaskEditModal')">Cancel</button>
        </div>

      </div>



    </div>
  </div>
</div>
</template>

<script>
 export default {
   name: 'TaskEditModal',
   props: [
     'propObj',
   ],
   methods: {
     saveTaskEdit() {
       let url = '/api/tasks/' + this.propObj.editTask.id;
       let updateObject = this.propObj.editTask;

       axios.put(url, updateObject)
         .then(response => {
           console.log(response.data);
         })
         .catch(errors => {
           console.log(errors);
         });

      this.$emit('savedTaskEditModal');
     },
   }
 };
 </script>
