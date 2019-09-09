<template>
  <div class="modal fade show"
    id="modalLRFormDemo"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel"
    style="display: block;"
    aria-modal="true"
    >
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <textarea rows="6" class="form-control" style="min-width: 100%" v-model="propObj.editThingMessage"></textarea>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" @click="saveThingEdit()">Save</button>
        <button type="button" class="btn btn-secondary" @click="$emit('closedThingEditModal')">Cancel</button>
      </div>

    </div>
  </div>
</div>
</template>

<script>
 export default {
   name: 'ThingEditModal',
   props: [
     'propObj',
   ],
   methods: {
     saveThingEdit() {
       let url = '/api/things/' + this.propObj.editThingID;
       let updateObject = { message:this.propObj.editThingMessage };

       axios.put(url, updateObject)
         .then(response => {
           console.log(response.data);
         })
         .catch(errors => {
           console.log(errors);
         });

      this.$emit('savedThingEditModal');
     },
   }
 };
 </script>
