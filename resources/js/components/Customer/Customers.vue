<template>
    <div>
        <h3 class="text-center">Customer List</h3><br/>
        <div class="text-end my-2">
            <router-link :to="{name: 'customer_add'}" class="btn btn-success">Add Customer</router-link>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="customer in customers" :key="customer.id">
                <td>{{ customer.id }}</td>
                <td>{{ customer.name }}</td>
                <td class="text-center">{{ customer.gender }}</td>
                <td class="text-center">{{ customer.birthdate }}</td>
                <td>{{ customer.address}}</td>
                <td>
                    <div class="btn-group text-center" role="group">
                        <router-link :to="{name: 'customer', params: {id: customer.id}}" class="btn btn-primary">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteCustomer(customer.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                customers: []
            }
        },
        created() {
            this.loadData()
        },
        methods: {
            loadData(){
                axios
                    .get('http://localhost:8000/api/customers')
                    .then(response => {
                        this.customers = response.data.data;
                    });
            },
            deleteCustomer(id) {
                axios
                    .delete(`http://localhost:8000/api/customers/${id}`)
                    .then(response => {
                        this.loadData()
                    });
            }
        }
    }
</script>