<template>
    <div class="flex justify-center items-center h-screen bg-slate-300">
        <form @submit.prevent="connect" action="" class="bg-white shadow-2xl rounded-lg flex justify-center items-center gap-3 flex-col p-12 w-96 h-96">
            <h1 class="font-bold text-2xl capitalize">Login</h1>
            <div class="input flex relative flex-col gap-1 w-64">
                <label  for="email">email</label>
                <input v-model="form.email" required type="email" name="" id="email" class="w-full focus:border-blue-600 valid:border-blue-600 duration-300 border border-gray-300 px-1 h-10 rounded-md outline-none">
            </div>
            <div class="input flex relative flex-col gap-1 w-64">
                <label for="password">password</label>
                <input v-model="form.password" required type="password" name="" id="password" class="w-full focus:border-blue-600 valid:border-blue-600 duration-300 border border-gray-300 px-1 h-10 rounded-md outline-none">
            </div>
            <button class="bg-blue-500 px-3 py-1 rounded-md capitalize hover:bg-blue-600 duration-300 hover:text-white">envoyer</button>
        </form>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                form:{
                    email:'',
                    password:''
                }
            }
        },
        mounted(){
            if(window.localStorage.getItem("token")){
                this.$router.push('video-chat')
            }
        },
        methods:{
            connect(){
                this.axios.post(this.requestHttp + 'login',this.form)
                .then(({data})=>{
                    localStorage.setItem('token',data.access_token.token)
                    this.$router.push('video-chat')
                }).catch(e=>console.log(e))
            }
        },
        computed:{
            requestHttp(){
                return this.$store.state.api
            },
        }
    }
</script>