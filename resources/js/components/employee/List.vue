<template>
    <div class="row">
		<h3>Modal </h3>
		<div class="col-12">
			<button class="delete-btn" @click="doDelete">Delete Page</button>
			<confirm-dialogue ref="confirmDialogue"></confirm-dialogue>
		</div>	
		<hr />
        <div class="col-12">
			<Testcomponent   v-bind:salary="salary" v-bind:cntst="cntst" v-on:child-method="updateParent" />
		</div>	
        
		<div class="col-12">
            <div class="card">
				<div class="card-header">
                    <h4>
						Employee Listing &nbsp;
						<router-link :to='{name:"employeeAdd"}' class="btn btn-primary text-end">Create Emp.</router-link> &nbsp; &nbsp; &nbsp;
						<span @click="cntup(cntst)" style="cursor:pointer;">
							Click Me :: {{cntst}} :: {{msg}}
						</span>
					</h4>
                </div>
                <div class="card-body">
					<div>
						<span v-for="(salamt,key) in salary">
							INR {{salamt}}, &nbsp;
						</span>
					</div>
                    <div class="table-responsive">						
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
									<th>Photo</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="employees.length > 0">
                                <tr v-for="(employee,key) in employees" :key="key">
                                    <td>{{ key+1 }}</td>
                                    <td>{{ employee.title }}</td>
									<td>
										<div v-if="employee.photo">
											<img :src="'http://localhost:8000/storage/'+ employee.photo " width="100" />
										</div>
									</td>
                                    <td>{{ employee.description }}</td>
                                    <td>
                                        <router-link :to='{name:"employeeEdit",params:{id:employee.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteEmployee(employee.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>									
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="5" align="center">No Employees Found.</td>
                                </tr>
                            </tbody>
                        </table>
						<Emplist v-bind:employees="employees" />
                    </div>
                </div>
            </div>
        </div>
		<div class="col-12 mt-5">
			<Categorycomponent></Categorycomponent>
		</div>    		
    </div>
</template>

<script>
import Categorycomponent from "../category/List.vue";
//Vue.component('Categorycomponent', Categorycomponent);

import Testcomponent from "../Testcomponent.vue";
//Vue.component('Testcomponent', Testcomponent);

import ConfirmDialogue from './ConfirmDialogue.vue'
import Emplist from './Emplist.vue'




export default {
    name:"employees",
	components: {
		Categorycomponent, Testcomponent, ConfirmDialogue, Emplist 
	},
    data(){
		let rand = parseInt(Math.random()*100);
        return {
			cntst:rand,
            msg:'---Parent :: '+rand+' ---',
			employees:[],
			salary:[3500,5000,8000,21000,28000,28000,30000,42000,45000]
        }
    },
    mounted(){
        this.getEmployees()
    },
    methods:{
        async doDelete() {
            const ok = await this.$refs.confirmDialogue.show({
                title: 'Delete Page',
                message: 'Are you sure you want to delete this page? It cannot be undone.',
                okButton: 'Delete Forever',
            })
            // If you throw an error, the method will terminate here unless you surround it wil try/catch
            if (ok) {
                alert('You have successfully delete this page.')
            } else {
                alert('You chose not to delete this page. Doing nothing now.')
            }
        },
		async getEmployees(){
            await this.axios.get('/api/employee').then(response=>{
                this.employees = response.data
            }).catch(error=>{
                console.log(error)
                this.employees = []
            })
        },
        deleteEmployee(id){
            if(confirm("Are you sure to delete this employee ?")){
                this.axios.delete(`/api/employee/${id}`).then(response=>{
                    this.getEmployees()
                }).catch(error=>{
                    console.log(error)
                })
            }
        },
		cntup(cnt){
			cnt += 1;
			this.cntst += 2;
			console.log('----'+cnt+'===='+this.cntst+'------');
		},
		updateParent(value_from_child) {
			this.msg = value_from_child;
		}
    }
}
</script>
<style scoped>
.delete-btn {
    padding: 0.5em 1em;
    background-color: #eccfc9;
    color: #c5391a;
    border: 2px solid #ea3f1b;
    border-radius: 5px;
    font-weight: bold;
    font-size: 16px;
    text-transform: uppercase;
    cursor: pointer;
}
</style>