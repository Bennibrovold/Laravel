<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default ">
                    <div class="card-header">Example Component</div>
                    <div class="block m-4">


                    <div class="form-group">
      <span v-for="user in users">{{ user }}</span>
                    </div>
                    <div class="form-group">
                      <button type="button" @click="update" name="button">Call</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
      data: function () {
        return {
          users: [],
        }
      },
      methods: {
        update: function() {
          return axios.get('https://time100.ru/')
          .then(function (response) {
              console.log(response.data)
          });
        }
      }
    }
</script>
