<template>
	<div>
		<h5>This is coming from component : Components : {{firstname}} :: Clicked : {{cntst}} : {{ counter }} times</h5>
		

		<ul>
			<span v-for="(empName,key) in empList" :key="key" @click="cntup(counter)" style="cursor:pointer;">
				{{empName}} &nbsp;
			</span>
			<hr>
			<span v-for="(salamt,key) in salary" v-on:click="counter += 1">
				INR {{salamt}}, &nbsp;
			</span>	
			<hr>
			<span></span>
		</ul>
	</div>
</template>
<script>
	export default {
		name:"Testcomponent",
		props: ['salary','cntst'],
		data(){
			return {
				counter: this.cntst,
				firstname :"Prasenjit Al",
				birthyear : "11-10-1982",
				empList : ["Esolz","Karmick","WDC","Sasta Sundar","Techknowledge","Red Apple","DDR HC","Sketch","Kus","Velocis","Nimbus","Ubinium"]
			}
		},
		methods:{
			cntup(cnt){
				cnt += 1;
				this.counter += 2;
				this.$emit('child-method', this.counter)
				console.log('----'+cnt+'===='+this.counter+'------');
			},
			childMethod: function() {
				this.$emit('child-method', '---Child : '+this.counter+' ---')
			}
		}
	}
</script>
<style>
h5{
	color:#0F0;
}
</style>