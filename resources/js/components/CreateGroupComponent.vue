<template>
    <div class="modal fade" :id="modal_id" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{title}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeCreateGroupModal"></button>
                </div>
                <div class="modal-body">
                    <form @submit="formSubmit">
                        <strong>Group Name:</strong>
                        <input type="text" class="form-control" v-model="name">
                        <button class="btn btn-primary my-3">Create Group</button>
                    </form>
                    <div :class="output_container">
                        <div class="alert" :class="output">
                            {{output == 'alert-success' ? 'Group Created' : 'Group not created. Check the fields and try again.'}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'CreateGroupComponent',
    props: { title: String, modal_id: String },
    data:()=>({
            name: '',
            output_container: 'd-none',
            output: ''
    }),
    methods: {
        closeModal() {
        document.getElementById('closeCreateGroupModal').click();
        },
        resetForm(){
        this.name = '';
        },
        async formSubmit(event) {
            event.preventDefault();
            await axios.post('http://localhost:8000/api/groups/create', {
                name: this.name,
            })
            .then(({data})=>{
                this.resetForm();
                this.output_container = 'd-block';
                this.output = 'alert-success';
                console.log(data);
                setTimeout(() => {
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

