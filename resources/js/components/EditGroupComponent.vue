
<template>
    <div class="modal fade" :id="modal_id" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{title}} / {{group.name}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeEditGroupModal"></button>
                </div>
                <div class="modal-body">
                    <form @submit="removeUserToGroup">
                        <strong>Which user do you want to remove:</strong>
                        <select class="form-control form-control-sm" @change="getSelectedGroup($event)">
                            <option selected disabled>Chose one user</option>
                             <option v-for="user in users" :key="user" :value="user.name">{{user}}</option>
                        </select>
                        <button class="btn btn-danger my-3">Delete user from group</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'EditGroupComponent',
    data:()=>({
       users:[],
       user_name:''
    }),
    props: { title:String, modal_id:String, group:Object },
    mounted(){ this.getGroupUsersList(this.group.id) },
    methods: {
        getSelectedGroup(e){
            console.log(e.target.value);
            this.user_name = e.target.value;
        },
        async getGroupUsersList(group_id){
        await axios.get(`http://localhost:8000/api/groups/users/${group_id}`)
            .then(({data})=>{
                this.users = data       
            });
        },
        async removeUserToGroup(){
            await axios.put('http://localhost:8000/api/groups/edit_users', {
                group_id: this.group.id,
                user_name: this.user_name
            }).then(({data})=>{
                console.log(data);
            });
        }
    }
}
</script>