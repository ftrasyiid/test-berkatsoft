<template>
    <div>
        <h3 class="text-center">Add Customer</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form @submit.prevent="addCustomer">
                    <div class="form-group">
                        <label for="name">Nama customer</label>
                        <input type="text" id="name" name="name" class="form-control" v-model="customer.name">
                    </div>
                    <div class="form-group">
                        <label for="gender">Customer</label>
                        <select class="form-control" name="gender" id="gender" v-model="customer.gender">>
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
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Add Customer</button>
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
        methods: {
            addCustomer() {
                axios
                    .post(`http://localhost:8000/api/customers`, this.customer)
                    .then((response) => {
                        this.$router.push({name: 'customers'});
                    });
            }
        }
    }
</script>