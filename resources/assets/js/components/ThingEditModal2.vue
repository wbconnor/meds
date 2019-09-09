<template>


      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">

          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Edit Message</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" @click="$emit('closedThingEditModal', 0)">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <input type="text" v-model="editThingMessage">
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" @click="$emit('closedThingEditModal', 0)">Cancel</button>
                      <button type="button" class="btn btn-primary" @click="saveEdit()">Save</button>
                  </div>
              </div>
          </div>

          </div>
        </div>
      </transition>

</template>

<script>
 export default {
   name: 'ThingEditModal',
   props: [
     'editThingID',
     'editThingMessage',
     'userID',
     'csrf_token',
   ],
  methods: {
    close() {
      this.$emit('thingEdited');
    },
  },

 };
 </script>
