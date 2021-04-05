<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"categoryAdd"}' class="btn btn-primary">Create</router-link>
        </div>		
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Category</h4>
                </div>				                
				<div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>                                    
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="categories.length > 0">
                                <tr v-for="(product,key) in categories" :key="key">
                                    <td>{{ product.id }}</td>
                                    <td>{{ product.title }}</td>                                    
                                    <td>{{ product.description }}</td>
                                    <td>
                                        <router-link :to='{name:"categoryEdit",params:{id:product.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteCategory(product.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No Categories Found.</td>
                                </tr>
                            </tbody>
                        </table>
						<br /><br />
                    </div>
                </div>				
            </div>
        </div>
		<div class="col-12 mb-2 text-end mt-5">
            <router-link :to='{name:"productAdd"}' class="btn btn-primary">Create Product</router-link>
        </div>
		<div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Product</h4>
                </div>				
                <div class="card-body">
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
                            <tbody v-if="products.length > 0">
                                <tr v-for="(product,key) in products" :key="key">
                                    <td>{{ key+1 }}</td>
                                    <td>{{ product.title }}</td>
									<td>
										<div v-if="product.photo">
											<img :src="'http://localhost:8000/storage/'+ product.photo " width="200" />
										</div>
									</td>
                                    <td>{{ product.description }}</td>
                                    <td>
                                        <router-link :to='{name:"productEdit",params:{id:product.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteProduct(product.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No Products Found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>								
            </div>
        </div>						
    </div>
</template>

<script>
export default {
    name:"products",
    data(){
        return {
            products:[],
			categories:[]
        }
    },
    mounted(){
        this.getProduct(),
		this.getCategories()
    },
    methods:{
        async getProduct(){
            await this.axios.get('/api/product').then(response=>{
                this.products = response.data
            }).catch(error=>{
                console.log(error)
                this.products = []
            })
        },
        deleteProduct(id){
            if(confirm("Are you sure to delete this product ?")){
                this.axios.delete(`/api/product/${id}`).then(response=>{
                    this.getProduct()
                }).catch(error=>{
                    console.log(error)
                })
            }
        },		
		async getCategories(){
            await this.axios.get('/api/category').then(response=>{
                this.categories = response.data
            }).catch(error=>{
                console.log(error)
                this.categories = []
            })
        },
        deleteCategory(id){
            if(confirm("Are you sure to delete this category ?")){
                this.axios.delete(`/api/category/${id}`).then(response=>{
                    this.getCategories()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }		
    }
}
</script>