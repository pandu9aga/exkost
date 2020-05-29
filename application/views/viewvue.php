<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Vue</title>
    <script src="<?php echo base_url('assets/vue/vue.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vue/axios.min.js'); ?>"></script>
  </head>
  <body>
    <div id="app">
      <ul v-for="user in data">
        <li>
          <span>{{user.id}}</span>
          <span>{{user.nama}}</span>
        </li>
      </ul>
    </div>

    <script>
      new Vue({
        el: '#app',
        data () {
          return {
            data: []
          }
        },
        mounted () {
          axios
            .get('http://localhost/exkost/api_login/data_api')
            .then(response => (this.data = response.data))
        }
      })
    </script>
  </body>
</html>
