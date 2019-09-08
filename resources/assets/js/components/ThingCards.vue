<template>
  <div>
    <div v-for="thing in filteredThings" :key="thing.id" class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                  <div class="d-flex justify-content-center">

                    <div class="col-8 align-items-center">
                      <h3 class="card-title my-auto">
                          {{thing.message}}
                      </h3>
                    </div>

                  </div> <!-- d-flex -->
                </div> <!-- card body -->
            </div> <!-- card -->
        </div> <!-- col-md-8 -->
    </div> <!-- v-for -->
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
  },
  computed: {

  },
};
</script>
