<template>
    <div>
        <h3 class="text-center">Daftar Produk</h3><br/>
        <div class="text-end my-2">
            <router-link :to="{name: 'sale_add'}" class="btn btn-success">Add Sale Order</router-link>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th rowspan="2">ID</th>
                    <th rowspan="2">Sale Date</th>
                    <th rowspan="2">Nama Customer</th>
                    <th colspan="4" class="text-center">Barang</th>
                    <th rowspan="2" class="text-center">Aksi</th>
                </tr>
                <tr>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
            <tr v-for="sale in sales" :key="sale.id">
                <td>{{ sale.id }}</td>
                <td>{{ sale.sale_date }}</td>
                <td>{{ sale.customer }}</td>
                <td class="text-center">{{ sale.product }}</td>
                <td class="text-center">{{ sale.price }}</td>
                <td class="text-center">{{ sale.quantity }}</td>
                <td class="text-center">{{ sale.price * sale.quantity }}</td>
                <td>
                    <div class="btn-group text-center" role="group">
                        <router-link :to="{name: 'sale', params: {id: sale.id}}" class="btn btn-primary">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteSale(sale.id)">Delete</button>
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
                sales: []
            }
        },
        created() {
            this.loadData()
        },
        methods: {
            loadData() {
                axios
                    .get('http://localhost:8000/api/sales')
                    .then(response => {
                        this.sales = response.data.data;
                    });
            },
            deleteSale(id) {
                axios
                    .delete(`http://localhost:8000/api/sales/${id}`)
                    .then(response => {
                        this.loadData()
                    });
            }
        }
    }
</script>