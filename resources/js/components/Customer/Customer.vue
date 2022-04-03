<template>
    <div>
        <h3 class="text-center">Edit Customer</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form @submit.prevent="updateCustomer">
                    <div class="form-group">
                        <label for="name">Nama customer</label>
                        <input type="text" id="name" name="name" class="form-control" v-model="customer.name">
                    </div>
                    <div class="form-group">
                        <label for="gender">Customer</label>
                        <select class="form-control" name="gender" id="gender" v-model="customer.gender">>
                            <option disabled>{{ customer.gender }}</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birthdate">Tanggal Lahir</label>
                        <input type="date" id="birthdate" name="birthdate" class="form-control" v-model="customer.birthdate">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input id="address" name="address" max="255" class="form-control" v-model="customer.address"/>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Update Customer</button>
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
                customer: {}
            }
        },
        created() {
            axios
                .get(`http://localhost:8000/api/customers/${this.$route.params.id}`)
                .then((response) => {
                    this.customer = response.data;
                });
        },
        methods: {
            updateCustomer() {
                axios
                    .put(`http://localhost:8000/api/customers/${this.$route.params.id}`, this.customer)
                    .then((response) => {
                        this.$router.push({name: 'customers'});
                    }).catch( function(error) {
                        console.log( error.error.response.data.errors )
                    });
            }
        }
    }
</script>