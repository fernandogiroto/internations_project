<template>
    <div class="modal fade" :id="modal_id" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{title}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeCreateUserModal"></button>
                </div>
                <div class="modal-body">
                    <!-- Create User Form -->
                    <form @submit="formSubmit" class="row g-3">
                        <div class="col-12 col-md-6">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="inputName" v-model="name">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword" v-model="password">
                        </div>
                        <div class="col-12">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="text" class="form-control" id="inputEmail" v-model="email">
                        </div>
                        <button class="btn btn-primary mt-3">Create User</button>
                        <div class="col-12 px-0" :class="output_container">
                            <div class="alert" :class="output">
                                {{output == 'alert-success' ? 'User Created' : 'User not added. Check the fields and try again.'}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'CreateUserComponent',
    props: {title:String,modal_id:String},
    data:()=>({
        name: '',
        email: '',
        password: '',
        output_container: 'd-none',
        output: ''
    }),
    methods: {
        closeModal() {
            document.getElementById('closeCreateUserModal').click();
        },
        reset(){
            this.name = '';
            this.email = '';
            this.password = '';
        },
        async formSubmit(event) {
            event.preventDefault();
            await axios.post('http://localhost:8000/api/users/create', {
                name: this.name,
                email: this.email,
                password: this.password,
            })
            .then(({data})=>{
                this.reset();
                this.output_container = 'd-block';
                this.output = 'alert-success';
                console.log(data);
                setTimeout(() => {
                    this.output_container = 'd-none';
                    this.closeModal();
                }, 2500);  
            })
            .catch((error)=>{
                console.log(error);
                this.output_container = 'd-block';
                this.output = 'alert-danger' 
            });
        }
    }
}
</script>

