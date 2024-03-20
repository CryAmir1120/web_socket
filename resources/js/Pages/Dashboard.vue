<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import axios from 'axios'

onMounted(() => {

    let mail = usePage().props.auth.user.email;
    if(mail == 'admin@gmail.com') {
        Echo.channel('home').listen('NewMessage', (e) => {
            alert(1)
            console.log(e);
        })
        Echo.channel('newchannel').listen('NewEvent', (e) => {
            console.log(e);
            let div = document.getElementById('append');
            let p = document.createElement('p')
            p.textContent = `Added_${e.msg}`;
            div.appendChild(p)
            div.scrollTop = div.scrollHeight
        })
    }
})
const handleEvent = async () => {
    await axios.post(route('event.test')).then((res) => {
        console.log('new event start');
        
    });
}
const handleMsg = async () => {
    await axios.post(route('msg.test')).then((res) => {
        console.log('message event start');
    });
}
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                    <button @click="handleEvent">Handle Event</button>
                    <button @click="handleMsg">Handle Messag</button>
                </div>
                <div id="append" class="overflow-auto h-screen"></div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
