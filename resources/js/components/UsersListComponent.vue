<template>
    <h5 class="fw-bold mt-3">Users List</h5>
      <div class="card">
        <!-- Table User List -->
        <table class="table table-striped table-hover mb-0">
          <thead>
            <tr>
              <th scope="col">#ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users" :key="user">
              <th scope="row">{{user.id}}</th>
              <td>{{user.name}}</td>
              <td>{{user.email}}</td>
              <td>
                <button @click="deleteUser(user.id)" class="btn btn-danger btn-sm" v-if="authenticated_user != user.id">Delete <i class="bi bi-trash3"></i></button>
              </td>
            </tr>
          </tbody>  
        </table>
      </div>
</template>

<script>
export default {
  name: 'UserListComponent',
  props: {authenticated_user:String},
  data:()=>({ users:[], user_auth:String}),
  mounted(){ 
    this.getUserList();
    this.userAuth();
    },
  methods: {
    async getUserList(){
      await axios.get('http://localhost:8000/api/users')
      .then(({data})=>{
        console.log(data);
        this.users = data
      });
    },
    async deleteUser(id){
      await axios.delete(`http://localhost:8000/api/users/delete/${id}`)
      .then(({data})=>{
        console.log(data);
        this.users = data.users;
      });
    }
  }
}
</script>
