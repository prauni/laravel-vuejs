<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <router-link to="/" class="navbar-brand" href="#">Vue</router-link>
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav">
                        <router-link exact-active-class="active" to="/" class="nav-item nav-link">Home</router-link>
                        <router-link exact-active-class="active" to="/category" class="nav-item nav-link">Category</router-link>											
						<router-link exact-active-class="active" to="/product" class="nav-item nav-link">
							Product
						</router-link>
						<router-link exact-active-class="active" to="/employee" class="nav-item nav-link">
							Employee
						</router-link>
						<router-link exact-active-class="active" to="/category" class="nav-item nav-link">
							Customer
						</router-link>
						<router-link exact-active-class="active" to="/category" class="nav-item nav-link">
							Supplier
						</router-link>
						<router-link exact-active-class="active" to="/category" class="nav-item nav-link">
							Department
						</router-link>
						<router-link exact-active-class="active" to="/category" class="nav-item nav-link">
							Holiday
						</router-link>
						<router-link exact-active-class="active" to="/category" class="nav-item nav-link">
							Location
						</router-link>
						<router-link exact-active-class="active" to="/category" class="nav-item nav-link">
							Bank Name
						</router-link>
						<router-link exact-active-class="active" to="/category" class="nav-item nav-link">
							Board Member 
						</router-link>
						<router-link exact-active-class="active" to="/category" class="nav-item nav-link">
							Contact US
						</router-link>
						<router-link exact-active-class="active" to="/category" class="nav-item nav-link">
							Enquiry
						</router-link>
						<router-link exact-active-class="active" to="/category" class="nav-item nav-link">
							Complain
						</router-link>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <router-view></router-view>
        </div>
    </main>
</template>
 
<script>
    export default {}
</script>