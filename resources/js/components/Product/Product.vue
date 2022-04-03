<template>
    <div>
        <h3 class="text-center">Edit Product</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form @submit.prevent="updateProduct">
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" id="name" name="name" class="form-control" v-model="product.name">
                    </div>
                    <div class="form-group">
                        <label>Harga Produk</label>
                        <input type="number" id="price" name="price" class="form-control" v-model="product.price">
                    </div>
                    <div class="form-group">
                        <label for="weight">Berat Produk (gram)</label>
                        <input type="number" id="weight" name="weight" class="form-control" v-model="product.weight">
                    </div>
                    <div class="form-group">
                        <label for="characteristic">Karakteristik</label>
                        <input id="characteristic" name="characteristic" max="255" class="form-control" v-model="product.characteristic"/>
                    </div>
                    <div class="my-2">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                product: {}
            }
        },
        created() {
            axios
                .get(`http://localhost:8000/api/items/${this.$route.params.id}`)
                .then((response) => {
                    this.product = response.data;
                });
        },
        methods: {
            updateProduct() {
                axios
                    .put(`http://localhost:8000/api/items/${this.$route.params.id}`, this.product)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>