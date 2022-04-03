<template>
    <div>
        <h3 class="text-center">Add Sale Order</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form @submit.prevent="addSale">
                    <div class="form-group">
                        <label for="name">Sale Date</label>
                        <input type="date" id="name" name="name" class="form-control" v-model="sale.sale_date">
                    </div>
                    <div class="form-group">
                        <label for="customerId">Customer</label>
                        <select class="form-control" name="customer_id" id="customerId" v-model="sale.customer_id">>
                            <option v-for="customer in customers" :key="customer.id" :value="customer.id">{{ customer.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productId">Produk</label>
                        <select class="form-control" name="product_id" id="productId" v-model="sale.product_id">
                            <option v-for="product in products" :key="product.id" :value="product.id">{{ product.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Jumlah</label>
                        <input type="number" id="quantity" name="quantity" min="0" step="1" class="form-control" v-model="sale.quantity"/>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Add Sale Order</button>
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
                sale: {},
                customers: [],
                products: []
            }
        },
        created() {
            axios
                .get('http://localhost:8000/api/items')
                .then(response => {
                    this.products = response.data.data;
                });
            axios
                .get('http://localhost:8000/api/customers')
                .then(response => {
                    this.customers = response.data.data;
                });
        },
        methods: {
            addSale() {
                axios
                    .post(`http://localhost:8000/api/sales`, this.sale)
                    .then((response) => {
                        this.$router.push({name: 'sales'});
                    })
                    .catch((error) => console.log( error.response.data.errors ) )
                    .finally(() => this.loading = false );
            }
        }
    }
</script>