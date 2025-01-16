<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';

let invoices = ref([]);
let searchInvoices = ref([]);

onMounted(async () => {
    getInvoices();
})

const getInvoices = async () => {
    let response = await axios.get('/api/get_invoices');
    invoices.value = response.data;
}

const search = async () => {
    let response = await axios.get('/api/search_invoice?s=' + searchInvoices.value);
    invoices.value = response.data;
}   
</script>

<template>
    <h1>index</h1>
    <router-link to="/show">Second Page</router-link>
    <br>

    <input type="text" v-model="searchInvoices" @keyup="search()">

    <table>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Transaction</th>
            <th>Action</th>
        </tr>
        
        <tr v-for="item in invoices" v-if="invoices.length > 0">
            <td>{{ item.key }}</td>
            <td>{{ item.prefix}}</td>
            <td>{{ item.value }}</td>
            <td>#</td>
        </tr>

        <p v-else > Invoice Not Found</p>
    </table>

</template>