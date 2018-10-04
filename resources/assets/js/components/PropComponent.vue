<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
              <button type="button" @click="update" class="btn btn-success" v-if="!is_refresh" name="button">Refresh</button>
              <span v-if="is_refresh">Обновление...</span>
              <table class="table">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Pre title</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="record in records">
                    <td>{{record.id}}</td>
                    <td>{{record.title}}</td>
                    <td>{{record.pre_title}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data: function() {
          return {
            records: [],
            errors: [],
            is_refresh: false
          }
        },
        mounted() {
            this.update();
        },
        methods: {
          update: function() {
            this.is_refresh = true;
            return axios.get('json/get')
            .then(response => {
              console.log(response)
              this.records = response.data
              this.is_refresh = false
            })
            .catch(e => {
              this.errors.push(e)
              console.log(this.errors);
            });
        }
    }
  }
</script>
