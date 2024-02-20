<template>
    <div>
        <div class="w-full h-screen relative m-0">
            <div class="absolute h-screen  w-full">
            <div class="h-[5%]"></div>
            <div class="h-[95%] flex justify-center items-center">
                <div class="w-[80%] relative h-[80%] bg-cover bg-center flex" id="espacesign">
                    <div class="w-[60%] h-full bg-transparent hidden  lg:flex justify-center items-center">
                        <div class="w-[80%] h-[72%] space-y-10">
                            <div>
                                <p class="text-white text-4xl font-semibold ">
                                    Codehal
                                </p>
                            </div>
                            <div class="w-[75%]  text-center  text-white ">
                                <p class=" text-4xl font-semibold ">
                                    Welcome!
                                </p>
                                <p class="text-2xl font-semibold" id="text_cible">
                                    To Our Nem Website
                                </p>
                                <p class="text-[12px] transform translate-y-5 mx-auto" id="cible">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Tempore repudiandae illo omnis et nihil nesciunt nostrum magni rerum iusto numquam. 
                                    Eius laborum laudantium sed asperiores! Dolores facere perferendis sequi corporis!
                                </p>
                            </div>
                            <div class="w-[75%] space-x-3 items-center justify-center  flex">
                                <a href="#">
                                    <div><img src="../assets/img/facebook_32px.png" alt="" class="w-7 h-7"></div>
                                </a>
                                <a href="#">
                                    <div><img src="../assets/img/instagram_32px.png" alt="" class="w-[26px] h-[26px]"></div>
                                </a>
                                <a href="#">
                                    <div><img src="../assets/img/github_32px.png" alt="" class="w-6 h-6"></div>
                                </a>
                                <a href="#">
                                    <div><img src="../assets/img/whatsapp_32px.png" alt="" class="w-6 h-6"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-[100%] lg:w-[40%] h-full flex overflow-hidden items-center overflow-y-auto" style="backdrop-filter: blur(6px);">
                        <div  id="sign" :class="tourne ? '-translate-x-[100%]':'-translate-x-[0%]'" class="w-full  h-full flex-shrink-0 flex transform transition-all duration-1000  items-center justify-center ">
                            <div  class="w-[92%] h-[60%]  text-white">
                                <p class="font-semibold text-center text-3xl mb-8">
                                    Sign In
                                </p>
                                <div class="w-full space-y-8">
                                    <div class="w-full relative">
                                        <p :class="monte ? '-translate-y-7':'-translate-y-0'" class=" duration-1000 absolute transform">Email</p>
                                    <div class="relative justify-end flex items-center">
                                        <div class="absolute backdrop:blur-sm  z-50"><img src="../assets/img/mail_50px.png" class="w-5 h-5 cursor-pointer  " alt=""></div>
                                        <input type="text" v-model="sign.email" name="" class="w-full bg-transparent outline-none border-b border-white  z-10 text-white transition-all duration-1000" @focus="mailmonte" @blur="maildescend" id="email">
                                    </div>
                                </div>
                                    <div class="w-full relative">
                                            <p id="pass" :class="montepass ? '-translate-y-7':'-translate-y-0'" class=" duration-1000 absolute transform">Password</p>
                                        <div class="relative justify-end flex items-center">
                                            <div class="absolute backdrop:blur-sm  z-50">
                                                <img src="../assets/img/lock_30px.png" class="w-5 h-5 cursor-pointer" @click="montrepass = !montrepass" alt="">
                                            </div>
                                            <input :type="montrepass ?'password':'text'" v-model="sign.password" name="" class="w-full bg-inherit outline-none border-b border-white  z-10 text-white transition-all duration-1000" @focus="passmonte" @blur="passdescend">
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <input type="checkbox" name="" class="rounded-lg border" id=""><span>Remember me</span>
                                        </div>
                                        <div>
                                            <p><a href="#">Forgt Password?</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-4">
                                    <button class="w-full text-center py-1 text-xl rounded-md hover:bg-pink-600 bg-pink-800">
                                        Sign In
                                    </button>
                                </div>
                                <div class="mt-3">
                                    <p class="text-center text-[15px]">Don't have an account?<a href="#" id="register"><span class="font-semibold" @click="tourne = !tourne">Register</span></a></p>
                                </div>
                            </div>
                        </div>
                        <div id="log" :class="tourne ? '-translate-x-[100%]':'-translate-x-[0%]'" class="w-full h-full  flex-shrink-0 flex transform transition-all duration-1000  justify-center items-center">
                            <div class="w-[92%]  text-white">
                                <p class="font-semibold text-center text-3xl mb-8">
                                    Log In
                                </p>
                                <div class="space-y-6">
                                    <div class="w-full relative">
                                        <p :class="emaillogmonte ? '-translate-y-7':'-translate-y-0'" class=" duration-1000 absolute transform">Email</p>
                                        <div class="relative justify-end flex items-center">
                                            <div class="absolute backdrop:blur-sm  z-50"><img src="../assets/img/mail_50px.png" class="w-5 h-5 cursor-pointer  " alt=""></div>
                                            <input type="text" name="" v-model="login.mail" class="w-full bg-transparent outline-none border-b border-white  z-10 text-white transition-all duration-1000" @focus="maillogmonte" @blur="maillogdescend">
                                        </div>
                                    </div>
                                    <div class="w-full relative">
                                        <p :class="nommonte ? '-translate-y-7':'-translate-y-0'" class=" duration-1000 absolute transform">Nom</p>
                                        <div class="relative justify-end flex items-center">
                                            <div class="absolute backdrop:blur-sm  z-50"><img src="../assets/img/male_user_32px.png" class="w-5 h-5 ùcursor-pointer  " alt=""></div>
                                            <input type="text" name="" v-model="login.nom" class="w-full bg-transparent outline-none border-b border-white  z-10 text-white transition-all duration-1000"  @focus="nomlogmonte" @blur="nomlogdescend" id="nom">
                                        </div>
                                    </div>
                                    <div class="w-full relative">
                                        <p :class="prenommonte ? '-translate-y-7':'-translate-y-0'" class=" duration-1000 absolute transform">Prenom</p>
                                        <div class="relative justify-end flex items-center">
                                            <div class="absolute backdrop:blur-sm  z-50"><img src="../assets/img/male_user_32px.png" class="w-5 h-5 cursor-pointer" alt=""></div>
                                            <input type="text" name="" v-model="login.prenom" class="w-full bg-transparent outline-none border-b border-white  z-10 text-white transition-all duration-1000" @focus="prenomlogmonte" @blur="prenomlogdescend" id="">
                                        </div>
                                    </div>
                                    <div class="w-full relative">
                                            <p id="logpas" :class="logpassmonte ? '-translate-y-7':'-translate-y-0'" class=" duration-1000 absolute transform">Password</p>
                                        <div class="relative justify-end flex items-center">
                                            <div class="absolute backdrop:blur-sm  z-50"><img src="../assets/img/lock_30px.png" @click="logpass = !logpass" id="psslock" class="w-5 h-5 cursor-pointer  " alt=""></div>
                                            <input :type="logpass ? 'password':'text'"  v-model="login.password" name="" class="w-full bg-transparent outline-none border-b border-white  z-10 text-white transition-all duration-1000" @focus="passlogmonte" @blur="passlogdescend" id="lgpass">
                                        </div>
                                    </div>
                                    <div class="w-full relative">
                                        <p :class="logpassconfirmmonte ? '-translate-y-7':'-translate-y-0'" class=" duration-1000 absolute transform">Password confirm</p>
                                        <div class="relative justify-end flex items-center">
                                            <div class="absolute backdrop:blur-sm  z-50"><img src="../assets/img/lock_30px.png" @click="logpassconfirm = !logpassconfirm" id="" class="w-5 h-5 cursor-pointer  " alt=""></div>
                                            <input :type="logpassconfirm ? 'password':'text'" v-model="login.passwordconfirm" name="" class="w-full bg-transparent outline-none border-b border-white z-10 text-white transition-all duration-1000" @focus="passconfirmmonte" @blur="passconfirmdescend" id="config">
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-4">
                                    <button class="w-full text-center py-1 text-xl rounded-md hover:bg-pink-600 bg-pink-800">
                                        Register
                                    </button>
                                </div>
                                <div class="mt-3">
                                    <p class="text-center text-[15px]">You have account?<a href="#"><span id="sign_up" class="font-semibold" @click="tourne = !tourne">Sign Up</span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="../assets/img/stefan-stefancik-0wMmxNB6Xzc-unsplash.jpg" alt="" class="h-screen w-full object-cover object-center">
    </div>
    </div>
</template>
<script>

    export default{
        data(){
            return{
                tourne:false,
                monte:false,
                montepass:false,
                montrepass:true,
                logpass:true,
                logpassconfirm:true,
                logpassconfirmmonte:false,
                logpassmonte:false,
                prenommonte:false,
                nommonte:false,
                emaillogmonte:false,
                sign:{
                    email:'',
                    password:'',
                },
                login:{
                    mail:'',
                    password:'',
                    passwordconfirm:'',
                    nom:'',
                    prenom:'',
                },
            }
        },
        methods: {
            mailmonte(){
                this.monte = true
            },
            maildescend(){
                if (this.sign.email.length==0) {
                    this.monte = false
                }
            },
            passmonte(){
                this.montepass = true
            },
            passdescend(){
                if (this.sign.password.length==0) {
                    this.montepass = false
                }
            },
            passconfirmmonte(){
                this.logpassconfirmmonte = true
            },
            passconfirmdescend(){
                if (this.login.passwordconfirm.length==0) {
                    this.logpassconfirmmonte = false
                }
            },
            passlogmonte(){
                this.logpassmonte = true
            },
            passlogdescend(){
                if (this.login.password.length==0) {
                    this.logpassmonte = false
                }
            },
            prenomlogmonte(){
                this.prenommonte = true
            },
            prenomlogdescend(){
                if (this.login.prenom.length==0) {
                    this.prenommonte = false
                }
            },
            nomlogmonte(){
                this.nommonte = true
            },
            nomlogdescend(){
                if (this.login.nom.length==0) {
                    this.nommonte = false
                }
            },
            maillogmonte(){
                this.emaillogmonte = true
            },
            maillogdescend(){
                if (this.login.mail.length==0) {
                    this.emaillogmonte = false
                }
            },
        }
    }
</script>
<style>
#espacesign{
    background-image: url(../assets/img/stefan-stefancik-0wMmxNB6Xzc-unsplash.jpg);
    background-size: cover;
    background-position: center;
}
</style>