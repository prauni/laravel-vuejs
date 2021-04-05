<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Employee</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" v-model="employee.title">
                                </div>
                            </div>
							<div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Emp. Image</label>
                                    <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" v-model="employee.description">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update</button>
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
    name:"update-employee",
    data(){
        return {
            employee:{
                title:"",
                description:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showEmployee()
    },
    methods:{
        async showEmployee(){
            await this.axios.get(`/api/employee/${this.$route.params.id}`).then(response=>{
                const { title, description } = response.data
                this.employee.title = title
                this.employee.description = description
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            /*await this.axios.post(`/api/employee/${this.$route.params.id}`,this.employee).then(response=>{
                //this.$router.push({name:"employeeList"})
            }).catch(error=>{
                console.log(error)
            });
			*/
			
			
			let formData = new FormData();
			formData.append('_method','patch');
			formData.append('id',`${this.$route.params.id}`);
			formData.append('file', this.file);
			formData.append('title', this.employee.title);
			formData.append('description', this.employee.description);
					
			axios.post( `/api/employee/${this.$route.params.id}`,
				formData,
				{
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}
			).then(function(){
				console.log('SUCCESS!!');
			})
			.catch(function(){
				console.log('FAILURE!!');
			});		
			
			this.$router.push({name:"employeeList"});			
        },
		handleFileUpload(){
			this.file = this.$refs.file.files[0];
		}		
    }
}
</script>