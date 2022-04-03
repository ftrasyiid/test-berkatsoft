<template>
    <div>
        <h3 class="text-center">Daftar Produk</h3><br/>
        <div class="text-end">
            <router-link :to="{name: 'product_add'}" class="btn btn-success">Add Product</router-link>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Berat</th>
                <th>Karakteristik</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items" :key="item.id">
                <td>{{ item.id }}</td>
                <td>{{ item.name }}</td>
                <td class="text-center">{{ item.price }}</td>
                <td class="text-center">{{ item.weight }}</td>
                <td>{{ item.characteristic }}</td>
                <td>
                    <div class="btn-group text-center" role="group">
                        <router-link :to="{name: 'product', params: {id: item.id}}" class="btn btn-primary">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteItem(item.id)">Delete</button>
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
                items: []
            }
        },
        created() {
            this.loadData()
        },
        methods: {
            loadData(){
                axios
                    .get('http://localhost:8000/api/items')
                    .then(response => {
                        this.items = response.data.data;
                    });
            },
            deleteItem(id) {
                axios
                    .delete(`http://localhost:8000/api/items/${id}`)
                    .then(response => {
                        this.loadData()
                    }).catch( function(error) {
                        console.log( error.error.response.data.errors )
                    });
            }
        }
    }
</script>