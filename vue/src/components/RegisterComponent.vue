<template>
    <div  class="flex justify-center items-center h-screen bg-slate-300">
        <form action="" class="bg-white shadow-2xl rounded-lg flex justify-center items-center gap-3 flex-col p-12 w-96 h-96">
            <h1 class="font-bold text-2xl capitalize">Singin</h1>
            <div class="input flex relative flex-col gap-1 w-64">
                <label  for="nom">nom</label>
                <input v-model="form.name" required type="text" name="" id="nom" class="w-full focus:border-blue-600 valid:border-blue-600 duration-300 border border-gray-300 px-1 h-10 rounded-md outline-none">
            </div>
            <div class="input flex relative flex-col gap-1 w-64">
                <label  for="email">email</label>
                <input v-model="form.email" @keyup="testemail" required type="email" name="" id="email" class="w-full focus:border-blue-600 valid:border-blue-600 duration-300 border border-gray-300 px-1 h-10 rounded-md outline-none">
            </div>
            <div class="input flex relative flex-col gap-1 w-64">
                <label for="password">password</label>
                <input v-model="form.password" required type="password" name="" id="password" class="w-full focus:border-blue-600 valid:border-blue-600 duration-300 border border-gray-300 px-1 h-10 rounded-md outline-none">
            </div>
            <button type="button" class="bg-blue-500 px-3 py-1 rounded-md capitalize hover:bg-blue-600 duration-300 hover:text-white" :id="(form.name != '' && form.password != '' && email == true) ? 'payButton':''" @click="yo">envoyer</button>
        </form>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                succes:false,
                token:'',
                email:false,
                form:{
                    email:'',
                    password:'',
                    name:'',
                }
            }
        },
        mounted(){
            this.campay()
            if(window.localStorage.getItem("token")){
                this.$router.push('video-chat')
            }
        },
        methods:{
            yo(e){
                this.campay()
                e.target.click()
            },
            testemail(){
                const mail = /^\S+@\S+\.\S+$/i
                if(this.form.email.match(mail)){
                    this.email = true
                }else{
                    this.email = false
                }
            },
            campay() {
            window.campay.options({
                payButtonId: "payButton",
                description: "test de payment",
                amount: "2",
                currency: "XAF",
                externalReference: "",
                redirectUrl: "",
            });

            window.campay.onSuccess = async ()=> {
                await this.axios.post(this.requestHttp + 'register',this.form)
                .then(({data})=> {localStorage.setItem('token',data.access_token.token)})
                .catch(e => console.log(e))
                document.querySelector('#myCamPayModal').remove()
                this.$router.push('video-chat')

            }
            
            window.campay.onFail = async (data)=> {
                alert('Status: ' + data.status + '\n reference: ' + data.reference)
            }
        }
           
        },
        computed:{
            requestHttp(){
                return this.$store.state.api
            },
        }
    }
</script>