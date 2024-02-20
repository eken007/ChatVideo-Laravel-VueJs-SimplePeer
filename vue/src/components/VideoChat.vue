<template>
    <div class="chat flex h-screen flex-col">
        <div class="h-full  flex justify-center w-full">
            <div class="content w-full h-full bg-slate-300 overflow-y-auto py-4">
                <div class="w-full flex mt-2" v-for="message in messages" :key="message.id">
                    <div class="w-32 shadow-xl rounded-md p-2" :class="message.name == sms.name ? 'ml-auto bg-green-500' : ' bg-gray-300'
                        ">
                        <div class="flex justify-between items-center">
                            <h1>{{ message.name }}</h1>
                            <img src="../icons/phone.png" class="w-4 cursor-pointer" v-if="message.id != sms.id" @click="initiator = true; call(message)" alt="" />
                        </div>
                        <p class="text-xs">{{ message.message }}</p>
                        <div class="flex">
                            <p class="date text-[0.6rem] text-gray-500 ml-auto">
                                {{ message.date.getDate() }}/{{
                                    message.date.getMonth() + 1
                                }}/{{ message.date.getFullYear() }} à
                                {{ message.date.getHours() }}:{{ message.date.getMinutes() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form class="h-auto" @submit.prevent="sendEvent">
            <div class="input flex items-center relative justify-center w-full">
                <input type="text" v-model="sms.message"
                    class="w-full h-8 md:h-12 outline-none border border-gray-200 focus:border-blue-500 duration-300"
                    placeholder="Ecrive un message" />
                <button class="px-5 h-8 md:h-12 bg-blue-500 w-32 py-1 pointer-events-none" :class="{
                    'pointer-events-auto opacity-100 hover:bg-blue-600 hover:text-white duration-300':
                        sms.message != '',
                    'opacity-50': sms.message == '',
                }">
                    send
                </button>
            </div>
        </form>
        <div v-if="modal && initiator == false"
            class="modal flex justify-center items-center h-screen w-screen absolute inset-0 bg-black bg-opacity-50">
            <div class="close absolute inset-0 h-full w-full" @click="modal = false"></div>
            <div class="w-72 rounded-md bg-white p-6 z-50 flex flex-col gap-2">
                <p>{{ nameOtherUser }} vous appel...</p>
                <div class="btn flex gap-2">
                    <button v-if="emetteur.id != sms.id" @click="repondre" class="bg-blue-500 duration-200 hover:bg-blue-600 text-white px-3 py-1 rounded-md">
                        accepter
                    </button>
                    <button class="bg-red-500 duration-200 hover:bg-red-600 text-white px-3 py-1 rounded-md">
                        refuser
                    </button>
                </div>
            </div>
        </div>
        <div v-if="initiator && valid == false" class="modal flex justify-center items-center h-screen w-screen absolute inset-0 bg-black bg-opacity-50">
            <div class="items-center justify-between">
                <div class="w-full flex justify-center">
                    <svg aria-hidden="true" class="inline w-20 h-20 text-gray-200 animate-spin dark:text-white fill-blue-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>  
                </div>
                
                <p class="text-2xl text-center text-white">Connexion en cour...</p>
            </div>
        </div>
        <div v-if="hidVideo" class="modal flex justify-center items-center h-screen w-screen absolute inset-0 bg-black bg-opacity-50">
            <video src="" id="video" class="w-full h-full" width="480" controls></video>
        </div>
    </div>
</template>
  
<script>
import Peer from "../../node_modules/simple-peer/simplepeer.min.js";
//import { getPermissions } from "../js/helpers";
export default {
    data() {
        return {
            sms: {
                id: "",
                name: "",
                message: "",
            },
            p: "",
            emitte: "",
            modal: false,
            initiator: false,
            nameOtherUser: "",
            hiddenInputName: false,
            messages: [],
            music: "",
            user: "",
            signal:'',
            emetteur:'',
            hidVideo:false,
            valid:false
        };
    },
    async mounted() {
        console.log('hello')
        this.music = new Audio(
            "./music/Mon Audio chat.mp3"
        );
        this.music.loop = true
        await this.axios
            .get("http://192.168.150.98:8000/api/get-user", {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token"),
                },
            })
            .then(({ data }) => {
                console.log(data);
                this.user = data;
                this.sms.name = data.name;
                this.sms.id = data.id
            })
            .catch((e) => console.log(e));
        if (!localStorage.getItem("token")) {
            this.$router.push("auth");
        }
        window.Echo.channel("public").listen("Hello", (e) => {
            console.log(e);
            let sms = e["message"];
            sms.date = new Date();
            this.messages.push(sms);
        });
        console.log(this.user.id)
        window.Echo.private("warning." + this.user.id).listen("warning", (e) => {
            console.log(e.signal)
            this.nameOtherUser = e.name;
            this.emetteur = e.emetteur;
            this.modal = true;
            this.music.play();
            this.signal = e.signal
        });
        window.Echo.private("feedback." + this.user.id).listen("feedback", (e) => {
            this.emitte.signal(JSON.parse(e.signal))
            this.valid = true
        });
    },
    methods: {
        async call(message) {
                navigator.mediaDevices.enumerateDevices().then(function (devices) {
                    devices.forEach(function (device) {
                        console.log(
                            device.kind + ": " + device.label + " id = " + device.deviceId
                        );
                    });
                });

                await navigator.mediaDevices
                .getUserMedia({
                    video: true,
                    audio: true,
                })
                .then((stream) => {
                    this.modal = true;
                    this.emitte = new Peer({
                        initiator: this.initiator,
                        trickle: false,
                        stream,
                    });
                    this.emitte.on("error", (err) => console.log("error", err));
                    this.emitte.on("signal", (data) => {
                        console.log("SIGNAL", JSON.stringify(data));
                        this.axios
                        .post(
                            "http://192.168.150.98:8000/api/warning",
                            { name: this.sms.name, id: message.id, signal: JSON.stringify(data) },
                            {
                                headers: {
                                    Authorization: "Bearer " + localStorage.getItem("token"),
                                },
                            }
                        )
                        .then(() => { 
                            this.hidVideo = true
                            this.modal = false
                        })
                        .catch((e) => console.log(e));
                    });
                    // document.querySelector("form").addEventListener("submit", (ev) => {
                    //     ev.preventDefault();
                    //     this.p.signal(JSON.parse(document.querySelector("#incoming").value));
                    // });
                    this.emitte.on("connect", () => {
                        console.log("CONNECT");
                        this.emitte.send("whatever" + Math.random()); // Or Files
                    });
                    this.emitte.on("data", (data) => {
                        console.log("data: " + data);
                    });
                    this.emitte.on("stream", function (stream) {
                        let video = document.getElementById("video");
                        video.srcObject = stream;
                        video.play();
                    });
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        async repondre() {
                navigator.mediaDevices.enumerateDevices().then(function (devices) {
                    devices.forEach(function (device) {
                        console.log(
                            device.kind + ": " + device.label + " id = " + device.deviceId
                        );
                    });
                });

                await navigator.mediaDevices
                .getUserMedia({
                    video: true,
                    audio: true,
                })
                .then((stream) => {
                    this.hidVideo = true
                    this.modal = false
                    this.music.pause()
                    this.p = new Peer({
                        initiator: this.initiator,
                        trickle: false,
                        stream,
                    });
                    this.p.on("error", (err) => console.log("error", err));
                    this.p.on("signal", (data) => {
                        console.log("SIGNAL", JSON.stringify(data));
                     this.axios
                        .post(
                            "http://192.168.150.98:8000/api/feedback",
                            { emetteur: this.emetteur, signal: JSON.stringify(data) },
                            {
                                headers: {
                                    Authorization: "Bearer " + localStorage.getItem("token"),
                                },
                            }
                        )
                        .then(() => {
                            
                         })
                        .catch((e) => console.log(e));
                    });
                    this.p.signal(JSON.parse(this.signal));
                    this.p.on("connect", () => {
                        console.log("CONNECT");
                        this.p.send("whatever" + Math.random()); // Or Files
                    });
                    this.p.on("data", (data) => {
                        console.log("data: " + data);
                    });
                    this.p.on("stream", function (stream) {
                        let video = document.getElementById("video");
                        video.srcObject = stream;
                        video.play();
                    });
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        sendEvent() {
            this.axios
                .post("http://192.168.150.98:8000/api/" + "broadcast", this.sms)
                .then(() => {
                    this.sms.message = "";
                    this.hiddenInputName = true;
                })
                .catch();
        },
    },
};
</script>
  
<style scoped>
#video-row {
    width: 700px;
    max-width: 90vw;
}

#incoming-call-card {
    border: 1px solid #0acf83;
}

.video-container {
    width: 700px;
    height: 500px;
    max-width: 90vw;
    max-height: 50vh;
    margin: 0 auto;
    border: 1px solid #0acf83;
    position: relative;
    box-shadow: 1px 1px 11px #9e9e9e;
    background-color: #fff;
}

.video-container .user-video {
    width: 30%;
    position: absolute;
    left: 10px;
    bottom: 10px;
    border: 1px solid #fff;
    border-radius: 6px;
    z-index: 2;
}

.video-container .partner-video {
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    z-index: 1;
    margin: 0;
    padding: 0;
}

.video-container .action-btns {
    position: absolute;
    bottom: 20px;
    left: 50%;
    margin-left: -50px;
    z-index: 3;
    display: flex;
    flex-direction: row;
}

/* Mobiel Styles */
@media only screen and (max-width: 768px) {
    .video-container {
        height: 50vh;
    }
}
</style>