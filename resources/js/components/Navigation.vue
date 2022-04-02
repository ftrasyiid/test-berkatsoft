<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <span class="text-secondary">BerkatSoft - Febri</span>
        </div>
 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link :to="{name: 'home'}" class="nav-item nav-link">Product List</router-link>
                    <router-link :to="{name: 'customers'}" class="nav-item nav-link">Customer List</router-link>
                    <router-link :to="{name: 'sales'}" class="nav-item nav-link">Sales Order</router-link>
                </div>
            </div>
        </nav>
    </div>
</template>
 
<script>
    export default {}
</script>