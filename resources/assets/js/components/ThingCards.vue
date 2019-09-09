<style scoped>
.editThing {
  position:absolute;
  bottom:.37em;
  right:.37em;
}
</style>

<template>
  <div>
    <!-- show all the things -->
    <div v-for="thing in things" :key="thing.id" class="d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">

                  <!-- centered message content-->
                  <div class="d-flex justify-content-center">

                    <div class="col-8 align-items-center">
                      <h3 class="card-title my-auto">
                          {{thing.message}}
                      </h3>
                    </div>

                  </div>
                  <!-- centered message content-->

                  <div v-if="user.id" class="edit-thing-button">
                    <button @click="editThing(thing.id, thing.message)" class="editThing btn btn-info btn-sm">
                        edit
                    </button>
                  </div>


                </div>
            </div>
        </div>
    </div>
    <!-- done showing all the things -->

    <!-- show edit modal if appropriate -->
      <thing-edit-modal
        v-if="showEditModal"
        :propObj = "thingObject"
        @closedThingEditModal="showEditModal = false"
        @savedThingEditModal="savedThing()">
      </thing-edit-modal>

  </div>
</template>

<script>
export default {
  // Name: 'things',
  Name: 'thing-cards',
  mounted() {
    this.getThings();
  },

  props: [
    'user',
    'csrf_token'
  ],
  data() {
    return {
      things: [],
      showEditModal: false,
      thingObject: {
        editThingID: null,
        editThingMessage: '',
        userID: this.user.id,
        csrf_token: this.csrf_token,
      },
    };
  },
  methods: {
    getThings(url = '/api/things') {
      axios.get(url, {params: this.tableData})
        .then(response => {
          console.log(response.data);
          this.things = response.data.data;
        })
        .catch(errors => {
          console.log(errors);
        });
    },
    editThing(thingID, thingMessage) {
      this.showEditModal = true;
      this.thingObject.editThingID = thingID;
      this.thingObject.editThingMessage = thingMessage;
    },
    savedThing() {
      this.showEditModal = false;
      this.getThings();
    }
  },
  computed: {

  },
};
</script>
