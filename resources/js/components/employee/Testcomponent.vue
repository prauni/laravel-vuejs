<template>
	<div>
		<h5>This is coming from EMP component</h5>
		<Modal />
	</div>
</template>
<script>
	import Modal from "./Modal.vue";
	
    export default {
		name:"Testcomponent",
		components: {
			Modal
		}
	}
</script>