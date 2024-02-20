<template>
    <div class="h-screen w-full flex justify-center items-center" id="reserve">
        <div class="w-[80%] flex justify-center items-center h-[80%]">
            <div class="w-1/2 h-full bg-white hidden relative lg:block">
                <div class="absolute w-full h-full bg-black bg-opacity-20">
                    <div class="relative w-full h-full">
                        <p class="absolute h-[20%] w-full bottom-0 text-white px-4 text-xl">
                            Programmer votre voyage en toutes sérénité avec <br> <span class="text-xl font-bold text-sky-600">C</span>odex <span class="text-xl font-bold text-sky-600">T</span>ravel 
                        </p>
                    </div>
                </div>
                <img src="../assets/img/thomas-de-luze-Shxs8PTvN7E-unsplash.jpg" class="w-full h-full object-cover object-center" alt="">
            </div>
            <div class="w-full md:w-3/5 lg:w-1/2 h-full backdrop-blur-sm flex justify-center items-center">
                <div class="w-[95%] h-[95%]">
                    <div class="text-center text-blue-500 h-[25%] lg:h-[30%] text-2xl flex justify-center items-center lg:text-4xl">
                        <div class="w-full h-[40%] flex items-center justify-center text-center font-bold">Information pour la reservation</div>
                    </div>
                    <form action="" class="w-[100%] space-y-3">
                        <p class="w-full h-8 space-x-2 flex items-center">
                            <span class="text-sky-500 font-semibold lg:text-xl">Compagnie:</span>
                            <select name="" id="" v-model="reserve.compagnie" class="w-full h-full rounded-lg text-center text-md lg:text-xl">
                                <option value="camerco">camerco</option>
                            </select>
                        </p>
                        <p class="w-full h-8 space-x-2 flex items-center">
                            <span class="text-sky-500 font-semibold lg:text-xl">Destination:</span>
                            <select name="" id="" v-model="reserve.destination" class="w-full rounded-lg h-full text-center text-md lg:text-xl">
                                <option value="Douala">Douala</option>
                                <option value="Yaoundé">Yaoundé</option>
                            </select>
                        </p>
                        <p class="w-full h-8 space-x-2 flex items-center"><span class="text-sky-500 font-semibold lg:text-xl">Identifiants: </span><input type="text" name="" v-model="reserve.identifiants" class="w-full rounded-lg h-full text-center text-md lg:text-xl" placeholder="nom et prenom" id=""></p>
                        <p class="w-full flex justify-center items-center">
                            <span class="space-x-2 text-white">
                                <span><input type="radio" @click="prixvoyage(1500000)" name="prix" id=""><span>Classe A </span></span>
                                <span><input type="radio" @click="prixvoyage(900000)" name="prix" id=""><span>Classe B </span></span>
                                <span><input type="radio" @click="prixvoyage(750000)" name="prix" id=""><span>Classe C </span></span>
                            </span>
                        </p>
                        <p class="w-full h-8 space-x-2 flex items-center">
                            <span class="text-sky-500 font-semibold lg:text-xl mr-12 lg:mr-[4.35rem]">Prix:</span>
                            <span class="bg-white w-full h-full rounded-lg text-center text-md lg:text-xl">{{ prix }}</span>
                        </p>
                        <p class="w-full h-8 space-x-2 flex items-center">
                            <span class="text-sky-500 font-semibold lg:text-xl mr-[2.7rem] lg:mr-16">Jour:</span>
                            <select name="" id="" v-model="reserve.jour" class="w-full rounded-lg h-full text-center text-md lg:text-xl">
                                <option value="Lundi">Lundi</option>
                                <option value="Mardi">Mardi</option>
                                <option value="Mercredi">Mercredi</option>
                                <option value="Jeudi">Jeudi</option>
                                <option value="Vendredi">Vendredi</option>
                                <option value="Samedi">Samedi</option>
                                <option value="Dimanche">Dimanche</option>
                            </select>
                        </p>
                        <p class="w-full flex justify-center items-center"><button class="text-white ml-8 bg-blue-400 text-xl font-bold text-center w-[60%]  py-1 rounded-lg">Reserver</button></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                prix:'',
                reserve:{
                    compagnie:'',
                    destination:'',
                    identifiants:'',
                    prix:'',
                    jour:''
                }
            }
        },
        methods:{
            prixvoyage(x){
                this.prix = x
                this.reserve.prix = x
            },
        }
    }
</script>
<style>
    #reserve{
        background-image: url(../assets/img/stefan-stefancik-0wMmxNB6Xzc-unsplash.jpg);
        background-size: cover;
        background-position: center;
    }
</style>